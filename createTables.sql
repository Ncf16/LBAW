DROP SCHEMA IF EXISTS 'final';
CREATE SCHEMA 'final';
SET SCHEMA 'final';

DROP TABLE IF EXISTS Person CASCADE; 
DROP TABLE IF EXISTS Course CASCADE; 
DROP TABLE IF EXISTS Request CASCADE;
DROP TABLE IF EXISTS Syllabus CASCADE;
DROP TABLE IF EXISTS CurricularUnit CASCADE;
DROP TABLE IF EXISTS CurricularUnitOccurrence CASCADE;
DROP TABLE IF EXISTS Class CASCADE;
DROP TABLE IF EXISTS CurricularEnrollment CASCADE;
DROP TABLE IF EXISTS CourseEnrollment CASCADE;
DROP TABLE IF EXISTS Evaluation CASCADE;
DROP TABLE IF EXISTS Grade CASCADE;
DROP TABLE IF EXISTS Attendance;
DROP TABLE IF EXISTS Exam;
DROP TABLE IF EXISTS Test;
DROP TABLE IF EXISTS GroupWork;
DROP TABLE IF EXISTS Room;
DROP TABLE IF EXISTS Area;
DROP TABLE IF EXISTS Calendar;
DROP TABLE IF EXISTS CurricularUploads;

DROP TYPE IF EXISTS PersonType CASCADE;
DROP TYPE IF EXISTS Language CASCADE;
DROP TYPE IF EXISTS EvaluationType CASCADE;
DROP TYPE IF EXISTS CourseType CASCADE;


CREATE TYPE CourseType AS ENUM('Bachelor', 'Masters', 'PhD');
CREATE TYPE PersonType AS ENUM('Teacher', 'Student', 'Admin');
CREATE TYPE Language AS ENUM('PT','EN','ES');
CREATE TYPE EvaluationType AS ENUM('GroupWork','Test','Exam');

CREATE TABLE IF NOT EXISTS Person(
academicCode SERIAL PRIMARY KEY,
personType PersonType,
name VARCHAR(120) NOT NULL,
username VARCHAR(15),
address VARCHAR(256),
birthdate DATE,
nationality VARCHAR(30),
nif CHAR(9) UNIQUE NOT NULL,
password VARCHAR(256) NOT NULL,
phoneNumber VARCHAR(12),
imageURL VARCHAR(256),
visible INTEGER DEFAULT 1,
tsv tsvector,
privateDate BOOLEAN  DEFAULT FALSE NOT NULL,
privatePhone BOOLEAN  DEFAULT FALSE NOT NULL,
privateNat BOOLEAN  DEFAULT FALSE NOT NULL,
privateAddr BOOLEAN  DEFAULT FALSE NOT NULL,
privateName BOOLEAN  DEFAULT FALSE NOT NULL
);

CREATE TABLE IF NOT EXISTS Course(
code SERIAL PRIMARY KEY,
abbreviation VARCHAR(5),
teacherCode INTEGER REFERENCES Person(academicCode),
courseType CourseType,
name VARCHAR(128) NOT NULL UNIQUE,
creationDate DATE NOT NULL DEFAULT CURRENT_DATE,
currentCalendarYear INTEGER NOT NULL,
description TEXT,
visible INTEGER DEFAULT 1,
tsv tsvector,
CHECK (EXTRACT(YEAR FROM creationDate) <= currentCalendarYear AND currentCalendarYear >= 1990)
);

CREATE TABLE IF NOT EXISTS Request(
requestID SERIAL PRIMARY KEY,
studentCode INTEGER REFERENCES Person(academicCode),
adminCode INTEGER REFERENCES Person(academicCode),
closed BOOLEAN NOT NULL DEFAULT false,
approved BOOLEAN,
title TEXT NOT NULL,
description TEXT NOT NULL,
submitionDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
visible INTEGER DEFAULT 1,
CHECK(description <> '')
);

CREATE TABLE IF NOT EXISTS Syllabus(
syllabusID SERIAL PRIMARY KEY,
courseCode INTEGER REFERENCES Course(code),
calendarYear INTEGER NOT NULL,
visible INTEGER DEFAULT 1,
CHECK (calendarYear >= 1990)
);

CREATE TABLE IF NOT EXISTS Area(
areaID SERIAL PRIMARY KEY,
area VARCHAR(64) NOT NULL UNIQUE,
visible INTEGER DEFAULT 1
);

CREATE TABLE IF NOT EXISTS Room(
roomID SERIAL PRIMARY KEY,
room CHAR(4) NOT NULL UNIQUE,
visible INTEGER DEFAULT 1
);

CREATE TABLE IF NOT EXISTS CurricularUnit(
curricularID SERIAL PRIMARY KEY,
name VARCHAR(64) NOT NULL UNIQUE,
areaID INTEGER REFERENCES Area(areaID),
credits INTEGER NOT NULL,
visible INTEGER DEFAULT 1,
tsv tsvector,
CHECK(credits > 0)
);

CREATE TABLE IF NOT EXISTS CurricularUnitOccurrence(
cuOccurrenceID SERIAL PRIMARY KEY,
syllabusID INTEGER REFERENCES Syllabus(syllabusID),
curricularUnitID INTEGER REFERENCES CurricularUnit(curricularID),
teacherCode INTEGER REFERENCES Person(academicCode),
bibliography TEXT NOT NULL,
competences TEXT NOT NULL,
curricularSemester INTEGER NOT NULL,
curricularYear INTEGER NOT NULL,
evaluation TEXT NOT NULL,
externalPage VARCHAR(128) NOT NULL,
language Language,
programme TEXT NOT NULL,
requirements TEXT NOT NULL,
visible INTEGER DEFAULT 1,
CHECK(curricularSemester = 1 OR curricularSemester = 2),
CHECK(curricularYear > 0 AND curricularYear <=  8)
);

CREATE TABLE IF NOT EXISTS CurricularUploads(
	uploadID SERIAL PRIMARY KEY,
	cuOccurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID),
	filePath TEXT NOT NULL,
	filePresentationName TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Class(
classID SERIAL PRIMARY KEY,
occurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID), 
teacherCode INTEGER REFERENCES Person(academicCode),
duration INTEGER NOT NULL, 
roomID INTEGER REFERENCES Room(roomID),
classDate TIMESTAMP NOT NULL, 
summary TEXT,
visible INTEGER DEFAULT 1,
CHECK(duration > 0)
);

CREATE TABLE IF NOT EXISTS Attendance(
studentCode INTEGER REFERENCES Person(academicCode), 
classID INTEGER REFERENCES Class(classID), 
attended BOOLEAN NOT NULL,
visible INTEGER DEFAULT 1,
PRIMARY KEY(studentCode,classID)
);

CREATE TABLE IF NOT EXISTS Evaluation(
evaluationID SERIAL PRIMARY KEY,
cuOccurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID),
evaluationDate TIMESTAMP NOT NULL, 
weight INTEGER NOT NULL,
evaluationType EvaluationType,
visible INTEGER DEFAULT 1,
CHECK(weight>0 AND weight<=100)
);

CREATE TABLE IF NOT EXISTS Grade(
studentCode INTEGER REFERENCES Person(academicCode),
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
grade REAL,
visible INTEGER DEFAULT 1,
CHECK(grade>=0 AND grade<=20),
PRIMARY KEY(studentCode, evaluationID)
);

CREATE TABLE IF NOT EXISTS GroupWork( 
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
maxElements INTEGER NOT NULL, 
minElements INTEGER NOT NULL,
visible INTEGER DEFAULT 1,
CHECK(minElements<=maxElements AND minElements>=2),
PRIMARY KEY(evaluationID)
);
 
 
CREATE TABLE IF NOT EXISTS Test(
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
duration INTEGER NOT NULL,
visible INTEGER DEFAULT 1,
CHECK(duration>0),
PRIMARY KEY(evaluationID)
);
 
CREATE TABLE IF NOT EXISTS Exam(
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
duration INTEGER NOT NULL,
visible INTEGER DEFAULT 1,
CHECK(duration>0),
PRIMARY KEY(evaluationID)
);
 
CREATE TABLE IF NOT EXISTS CourseEnrollment(
courseID INTEGER REFERENCES Course(code),
studentCode INTEGER REFERENCES Person(academicCode),
startYear INTEGER NOT NULL DEFAULT EXTRACT(YEAR FROM CURRENT_DATE),
finishYear INTEGER,
curricularYear INTEGER NOT NULL,
courseGrade REAL,
visible INTEGER DEFAULT 1,
CHECK ( finishYear IS NULL OR finishYear > startYear),
CHECK(curricularYear > 0 AND curricularYear <= 8),
PRIMARY KEY(courseID,studentCode)
);
 
CREATE TABLE IF NOT EXISTS CurricularEnrollment(
cuOccurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID),
studentCode INTEGER REFERENCES Person(academicCode),
finalGrade INTEGER,
visible INTEGER DEFAULT 1,
CHECK(finalGrade >= 0 AND finalGrade <= 20),
PRIMARY KEY(cuOccurrenceID,studentCode)
);

CREATE TABLE IF NOT EXISTS Calendar(
year INTEGER,
semester INTEGER,
beginDate DATE NOT NULL,
endDate DATE NOT NULL,
visible INTEGER DEFAULT 1,
PRIMARY KEY(year, semester),
CHECK(beginDate < endDate)
);