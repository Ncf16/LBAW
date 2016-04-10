DROP TABLE  IF EXISTS Person CASCADE; 
DROP TABLE  IF EXISTS Course CASCADE; 
DROP TABLE  IF EXISTS Request CASCADE;
DROP TABLE  IF EXISTS Syllabus CASCADE;
DROP TABLE  IF EXISTS CurricularUnit CASCADE;
DROP TABLE  IF EXISTS CurricularUnitOccurrence CASCADE;
DROP TABLE  IF EXISTS Class CASCADE;
DROP TABLE  IF EXISTS CurricularEnrollment CASCADE;
DROP TABLE  IF EXISTS CourseEnrollment CASCADE;
DROP TABLE  IF EXISTS Evaluation CASCADE;
DROP TABLE  IF EXISTS Grade CASCADE;
DROP TABLE  IF EXISTS Attendance;
DROP TABLE  IF EXISTS Exam;
DROP TABLE  IF EXISTS Test;
DROP TABLE  IF EXISTS GroupWork;
DROP TABLE  IF EXISTS Room;
DROP TABLE  IF EXISTS Area;

DROP TYPE  IF EXISTS  PersonType;
DROP TYPE  IF EXISTS  LanguageType;
DROP TYPE  IF EXISTS  EvaluationType;
DROP TYPE  IF EXISTS  CourseType;

CREATE TYPE CourseType AS ENUM('Bachelor', 'Masters', 'PhD');
CREATE TYPE PersonType AS ENUM('Teacher', 'Student', 'Admin');
CREATE TYPE Language AS ENUM('Portuguese', 'Russian', 'English');
CREATE TYPE EvaluationType AS ENUM('GroupWork','Test','Exam');

CREATE TABLE IF NOT EXISTS Person(
academicCode SERIAL PRIMARY KEY,
personType PersonType,
name CHAR(40) NOT NULL,
address CHAR(256),
birthdate DATE,
nationality CHAR(20),
nif CHAR(9) UNIQUE,
phoneNumber CHAR(12)
);

CREATE TABLE IF NOT EXISTS Course(
code SERIAL PRIMARY KEY,
directorCode INTEGER REFERENCES Person(academicCode) CHECK (directorCode ='Teacher'),
courseType CourseType,
name CHAR(128) NOT NULL UNIQUE,
creationDate DATE NOT NULL DEFAULT CURRENT_DATE,
currentCalendarYear INTEGER NOT NULL,
description CHAR(1000) NOT NULL
);

CREATE TABLE IF NOT EXISTS Person(
academicCode SERIAL PRIMARY KEY,
personType PersonType,
name CHAR(40) NOT NULL,
address CHAR(256),
birthdate DATE,
nationality CHAR(20),
nif CHAR(9) UNIQUE,
phoneNumber CHAR(12)
);

CREATE TABLE IF NOT EXISTS Course(
code SERIAL PRIMARY KEY,
directorCode INTEGER REFERENCES Person(academicCode),
courseType CourseType,
name CHAR(128) NOT NULL UNIQUE,
creationDate DATE NOT NULL DEFAULT CURRENT_DATE,
currentCalendarYear INTEGER NOT NULL,
description CHAR(1000) NOT NULL
);

CREATE TABLE IF NOT EXISTS Request(
requestID SERIAL PRIMARY KEY,
studentCode INTEGER REFERENCES Person(academicCode),
adminCode INTEGER REFERENCES Person(academicCode),
newCourse_Code INTEGER REFERENCES Course(code),
approved BOOLEAN,
reasonForChange CHAR(256)
);

CREATE TABLE IF NOT EXISTS Syllabus(
syllabusID SERIAL PRIMARY KEY,
courseCode INTEGER REFERENCES Course(code),
calendarYear INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS Area(
areaID SERIAL PRIMARY KEY,
area CHAR(64) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Room(
roomID SERIAL PRIMARY KEY,
room CHAR(6) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS CurricularUnit(
curricularID SERIAL PRIMARY KEY,
name CHAR(64) NOT NULL UNIQUE,
areaID INTEGER REFERENCES Area(areaID),
credits INTEGER NOT NULL 
);

CREATE TABLE IF NOT EXISTS CurricularUnitOccurrence(
cuOccurrenceID SERIAL PRIMARY KEY,
syllabusID INTEGER REFERENCES Syllabus(syllabusID),
curricularUnitID INTEGER REFERENCES CurricularUnit(curricularID),
regentCode INTEGER REFERENCES Person(academicCode),
​bibliography CHAR(256) NOT NULL,
competences CHAR(2048) NOT NULL,
​curricularSemester INTEGER NOT NULL,
curricularYear INTEGER NOT NULL,
evaluation CHAR(1024) NOT NULL,
externalPage CHAR(128) NOT NULL,
language Language,
programme CHAR(2048) NOT NULL,
requirements CHAR(2048) NOT NULL 
);

CREATE TABLE IF NOT EXISTS Class(
classID SERIAL PRIMARY KEY,
occurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID), 
duration INTEGER NOT NULL, 
roomID INTEGER REFERENCES Room(roomID),
classDate TIMESTAMP NOT NULL, 
summary CHAR(512) 
);

CREATE TABLE IF NOT EXISTS Attendance(
studentCode INTEGER REFERENCES Person(academicCode), 
classID INTEGER REFERENCES Class(classID), 
attended BOOLEAN NOT NULL,
PRIMARY KEY(studentCode,classID)
);

CREATE TABLE IF NOT EXISTS Evaluation(
evaluationID SERIAL PRIMARY KEY,
cuOccurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID),
evaluationDate TIMESTAMP NOT NULL, 
weight INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS Grade(
studentCode INTEGER REFERENCES Person(academicCode),
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
grade REAL,
PRIMARY KEY(studentCode, evaluationID)
);

CREATE TABLE IF NOT EXISTS GroupWork( 
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
maxElements INTEGER NOT NULL, 
minElements INTEGER NOT NULL
);
 
 
CREATE TABLE IF NOT EXISTS Test(
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
duration INTEGER NOT NULL
);
 
CREATE TABLE IF NOT EXISTS Exam(
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
duration INTEGER NOT NULL
);
 
CREATE TABLE IF NOT EXISTS CourseEnrollment(
courseID INTEGER REFERENCES Course(code),
studentCode INTEGER REFERENCES Person(academicCode),
startYear DATE NOT NULL DEFAULT CURRENT_DATE,
finishYear DATE,
curricularYear INTEGER NOT NULL,
courseGrade REAL,
PRIMARY KEY(courseID,studentCode)
);
 
CREATE TABLE IF NOT EXISTS CurricularEnrollment(
cuOccurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID),
studentCode INTEGER REFERENCES Person(academicCode),
finalGrade INTEGER DEFAULT 0,
PRIMARY KEY(cuOccurrenceID,studentCode)
)