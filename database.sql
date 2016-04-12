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
DROP TRIGGER  IF EXISTS checkDiretorType ON Course CASCADE;
DROP TRIGGER  IF EXISTS checkRegentType  ON CurricularUnitOccurrence CASCADE;

/*Trigger Ideas:
Check if only 1 exam
Check Data de aula PHP
Check if Class and Room if no overlaps
Request,Attendance,Grade,CourseEnrollment,CurricularEnrollment -> checkStudent
*/
DROP TYPE  IF EXISTS  PersonType CASCADE;
DROP TYPE  IF EXISTS  Language CASCADE;
DROP TYPE  IF EXISTS  EvaluationType CASCADE;
DROP TYPE  IF EXISTS  CourseType CASCADE;

CREATE TYPE CourseType AS ENUM('Bachelor', 'Masters', 'PhD');
CREATE TYPE PersonType AS ENUM('Teacher', 'Student', 'Admin');
CREATE TYPE Language AS ENUM('Portuguese', 'Russian', 'English');
CREATE TYPE EvaluationType AS ENUM('GroupWork','Test','Exam');

CREATE TABLE IF NOT EXISTS Person(
academicCode SERIAL PRIMARY KEY,
personType PersonType,
name VARCHAR(40) NOT NULL,
address VARCHAR(256),
birthdate DATE,
nationality VARCHAR(30),
nif CHAR(9) UNIQUE,
phoneNumber VARCHAR(12)
);

CREATE TABLE IF NOT EXISTS Course(
code SERIAL PRIMARY KEY,
directorCode INTEGER REFERENCES Person(academicCode),
courseType CourseType,
name VARCHAR(128) NOT NULL UNIQUE,
creationDate DATE NOT NULL DEFAULT CURRENT_DATE,
currentCalendarYear INTEGER NOT NULL,
description VARCHAR(1000) NOT NULL,
CHECK (EXTRACT(YEAR FROM creationDate) <= currentCalendarYear AND currentCalendarYear >= 1990)
);

CREATE TABLE IF NOT EXISTS Request(
requestID SERIAL PRIMARY KEY,
studentCode INTEGER REFERENCES Person(academicCode),
adminCode INTEGER REFERENCES Person(academicCode),
newCourse_Code INTEGER REFERENCES Course(code),
approved BOOLEAN,
reasonForChange VARCHAR(256) NOT NULL,
CHECK(reasonForChange <> '')
);

CREATE TABLE IF NOT EXISTS Syllabus(
syllabusID SERIAL PRIMARY KEY,
courseCode INTEGER REFERENCES Course(code),
calendarYear INTEGER NOT NULL,
CHECK (calendarYear >= 1990)
);

CREATE TABLE IF NOT EXISTS Area(
areaID SERIAL PRIMARY KEY,
area VARCHAR(64) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Room(
roomID SERIAL PRIMARY KEY,
room CHAR(4) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS CurricularUnit(
curricularID SERIAL PRIMARY KEY,
name VARCHAR(64) NOT NULL UNIQUE,
areaID INTEGER REFERENCES Area(areaID),
credits INTEGER NOT NULL,
CHECK(credits > 0)
);

CREATE TABLE IF NOT EXISTS CurricularUnitOccurrence(
cuOccurrenceID SERIAL PRIMARY KEY,
syllabusID INTEGER REFERENCES Syllabus(syllabusID),
curricularUnitID INTEGER REFERENCES CurricularUnit(curricularID),
regentCode INTEGER REFERENCES Person(academicCode),
​bibliography VARCHAR(256) NOT NULL,
competences VARCHAR(2048) NOT NULL,
​curricularSemester INTEGER NOT NULL,
curricularYear INTEGER NOT NULL,
evaluation VARCHAR(1024) NOT NULL,
externalPage VARCHAR(128) NOT NULL,
language Language,
programme VARCHAR(2048) NOT NULL,
requirements VARCHAR(2048) NOT NULL,
CHECK(​curricularSemester =1 OR ​curricularSemester = 2),
CHECK(curricularYear > 0 AND curricularYear < 8)
);

CREATE TABLE IF NOT EXISTS Class(
classID SERIAL PRIMARY KEY,
occurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID), 
duration INTEGER NOT NULL, 
roomID INTEGER REFERENCES Room(roomID),
classDate TIMESTAMP NOT NULL, 
summary VARCHAR(512),
CHECK(duration > 0)
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
weight INTEGER NOT NULL,
CHECK(weight>0 AND weight<=100)
);

CREATE TABLE IF NOT EXISTS Grade(
studentCode INTEGER REFERENCES Person(academicCode),
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
grade REAL,
CHECK(grade>=0 AND grade<=20),
PRIMARY KEY(studentCode, evaluationID)
);

CREATE TABLE IF NOT EXISTS GroupWork( 
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
maxElements INTEGER NOT NULL, 
minElements INTEGER NOT NULL,
CHECK(minElements<=maxElements AND minElements>=2)
);
 
 
CREATE TABLE IF NOT EXISTS Test(
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
duration INTEGER NOT NULL,
CHECK(duration>0)
);
 
CREATE TABLE IF NOT EXISTS Exam(
evaluationID INTEGER REFERENCES Evaluation(evaluationID),
duration INTEGER NOT NULL,
CHECK(duration>0)
);
 
CREATE TABLE IF NOT EXISTS CourseEnrollment(
courseID INTEGER REFERENCES Course(code),
studentCode INTEGER REFERENCES Person(academicCode),
startYear DATE NOT NULL DEFAULT CURRENT_DATE,
finishYear DATE,
curricularYear INTEGER NOT NULL,
courseGrade REAL,
CHECK ( finishYear IS NULL OR finishYear > startYear),
CHECK(curricularYear > 0 AND curricularYear < 8),
PRIMARY KEY(courseID,studentCode)
);
  
CREATE TABLE IF NOT EXISTS CurricularEnrollment(
cuOccurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID),
studentCode INTEGER REFERENCES Person(academicCode),
finalGrade INTEGER DEFAULT 0,
CHECK(finalGrade >= 0 AND finalGrade <= 20),
PRIMARY KEY(cuOccurrenceID,studentCode)
);

--Functions
CREATE OR REPLACE FUNCTION getPersonType(id INTEGER) 
RETURNS  PersonType AS  $$
DECLARE
result PersonType;
BEGIN
  SELECT PERSON.personType INTO result
  FROM PERSON 
  WHERE academicCode = id;
return  result; 
END 
$$ LANGUAGE 'plpgsql';
 
 --TRIGGERS--

CREATE OR REPLACE FUNCTION isPersonTeacher()
RETURNS trigger AS  $$
DECLARE
  type PersonType;
BEGIN
type:=getPersonType(NEW.directorCode);
  IF (type =  'Teacher' )
  THEN 
    RETURN NEW;
    ELSE
    RETURN NULL;
  END IF;
END 
$$  LANGUAGE 'plpgsql'; 

 CREATE OR REPLACE FUNCTION isPersonStudent()
RETURNS trigger AS  $$
DECLARE
  type PersonType;
BEGIN
type:=getPersonType(NEW.studentCode);
  IF (type =  'Student' )
  THEN 
    RETURN NEW;
    ELSE
    RETURN NULL;
  END IF;
END 
$$  LANGUAGE 'plpgsql'; 
 /*
  CREATE OR REPLACE FUNCTION isPersonAdmin()
RETURNS trigger AS  $$
DECLARE
  type PersonType;
BEGIN
type:=getPersonType(NEW.directorCode);
  IF (type =  'Admin' )
  THEN 
    RETURN NEW;
    ELSE
    RETURN NULL;
  END IF;
END 
$$  LANGUAGE 'plpgsql'; */

 
--check if good idea, or should make a more specific trigger ( to be called on each update might be overkill)
CREATE TRIGGER checkDiretorType
BEFORE INSERT OR UPDATE ON Course
FOR EACH ROW
EXECUTE PROCEDURE  isPersonTeacher(); 
 
CREATE TRIGGER checkRegentType
BEFORE INSERT OR UPDATE ON CurricularUnitOccurrence 
FOR EACH ROW
EXECUTE PROCEDURE  isPersonTeacher(); 

CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON Request 
FOR EACH ROW
EXECUTE PROCEDURE  isPersonStudent(); 
CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON Attendance 
FOR EACH ROW
EXECUTE PROCEDURE  isPersonStudent(); 
CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON Grade 
FOR EACH ROW
EXECUTE PROCEDURE  isPersonStudent(); 
CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON CurricularEnrollment 
FOR EACH ROW
EXECUTE PROCEDURE  isPersonStudent();

CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON CourseEnrollment 
FOR EACH ROW
EXECUTE PROCEDURE  isPersonStudent();

   