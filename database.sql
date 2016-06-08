
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



-- TRIGGERS

 SET SCHEMA 'final';
 
DROP TRIGGER IF EXISTS checkDiretorType ON Course CASCADE;
DROP TRIGGER IF EXISTS checkRegentType ON CurricularUnitOccurrence CASCADE;
DROP TRIGGER IF EXISTS checkTeacherType ON Class CASCADE;
DROP TRIGGER IF EXISTS checkAdminType ON Request CASCADE;
DROP TRIGGER IF EXISTS createGrade ON Evaluation CASCADE;
DROP TRIGGER IF EXISTS checkStudentType ON Request CASCADE;
DROP TRIGGER IF EXISTS checkStudentType ON Attendance CASCADE;
DROP TRIGGER IF EXISTS createAttendances ON Attendances CASCADE;
DROP TRIGGER IF EXISTS checkStudentType ON Grade CASCADE;
DROP TRIGGER IF EXISTS checkStudentType ON CurricularEnrollment CASCADE;
DROP TRIGGER IF EXISTS checkStudentType ON CourseEnrollment CASCADE;
DROP TRIGGER IF EXISTS oneExamPerUC ON Exam CASCADE;
DROP TRIGGER IF EXISTS checkClassDate ON Class CASCADE;
DROP TRIGGER IF EXISTS checkClassRoom ON Class CASCADE;
DROP TRIGGER IF EXISTS checkCourseDate ON CourseEnrollment CASCADE;
DROP TRIGGER IF EXISTS setUsername ON Person CASCADE;
DROP TRIGGER IF EXISTS tsvectorPersonUpdate ON Person;
DROP TRIGGER IF EXISTS tsvectorCourseUpdate ON Course;
DROP TRIGGER IF EXISTS tsvectorCuInsertUpdate ON CurricularUnit;
DROP TRIGGER IF EXISTS tsvectorCuUpdate ON CurricularUnit;
DROP TRIGGER IF EXISTS tsvectorCUOccurrenceUpdate ON CurricularUnitOccurrence;
DROP TRIGGER IF EXISTS tsvectorAreaUpdate ON Area;
DROP TRIGGER IF EXISTS checkStudentEnrolledInCorrectCourse ON CurricularEnrollment CASCADE;

DROP FUNCTION IF EXISTS getStudentCurrentCourse(integer) CASCADE;
DROP FUNCTION IF EXISTS person_search_trigger() CASCADE;
DROP FUNCTION IF EXISTS course_search_trigger() CASCADE;
DROP FUNCTION IF EXISTS cu_search_trigger() CASCADE;
DROP FUNCTION IF EXISTS cu_update_trigger() CASCADE;
DROP FUNCTION IF EXISTS cuOccurrence_search_trigger() CASCADE;
DROP FUNCTION IF EXISTS area_search_trigger() CASCADE; 

-----------------------------------------

--Functions
CREATE OR REPLACE FUNCTION getPersonType(id INTEGER) RETURNS PersonType AS $$
DECLARE
result PersonType;
BEGIN
 SELECT PERSON.personType INTO result
 FROM PERSON 
 WHERE academicCode = id AND visible=1;
return result; 
END 
$$ LANGUAGE 'plpgsql';

 -----------------------------------------

CREATE OR REPLACE FUNCTION isPersonStudent() RETURNS trigger AS $$
DECLARE
 type PersonType;
BEGIN
type:=getPersonType(NEW.studentCode);
 IF (type = 'Student' )
 THEN 
 RETURN NEW;
 ELSE
 RETURN NULL;    --RAISE EXCEPTION 'User is not a Student';
 END IF;
END 
$$ LANGUAGE 'plpgsql'; 

CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON Request 
FOR EACH ROW
EXECUTE PROCEDURE isPersonStudent();

CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON Attendance 
FOR EACH ROW
EXECUTE PROCEDURE isPersonStudent();

CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON Grade 
FOR EACH ROW
EXECUTE PROCEDURE isPersonStudent(); 

CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON CurricularEnrollment 
FOR EACH ROW
EXECUTE PROCEDURE isPersonStudent();

CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON CourseEnrollment 
FOR EACH ROW
EXECUTE PROCEDURE isPersonStudent();

-----------------------------------------

CREATE OR REPLACE FUNCTION isPersonTeacher() RETURNS trigger AS $$
DECLARE
 type PersonType;
BEGIN
type:=getPersonType(NEW.teacherCode);
 IF (type = 'Teacher' )
 THEN 
 RETURN NEW;
 ELSE
RETURN NULL;--RAISE EXCEPTION 'User is not a Teacher';
 END IF;
END 
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER checkTeacherType
BEFORE INSERT OR UPDATE ON Class
FOR EACH ROW
EXECUTE PROCEDURE isPersonTeacher();

CREATE TRIGGER checkDiretorType
BEFORE INSERT OR UPDATE ON Course
FOR EACH ROW
EXECUTE PROCEDURE isPersonTeacher();

CREATE TRIGGER checkRegentType
BEFORE INSERT OR UPDATE ON CurricularUnitOccurrence 
FOR EACH ROW
EXECUTE PROCEDURE isPersonTeacher(); 

-----------------------------------------

CREATE OR REPLACE FUNCTION isPersonAdmin() RETURNS trigger AS $$
DECLARE
 type persontype;
BEGIN
type:=getPersonType(NEW.adminCode);
 IF (type = 'Admin' OR NEW.adminCode IS NULL)
 THEN 
 RETURN NEW;
 ELSE
 RETURN NULL;--RAISE EXCEPTION 'User is not an Admin';
 END IF;
END 
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER checkAdminType
BEFORE INSERT OR UPDATE ON Request
FOR EACH ROW
EXECUTE PROCEDURE isPersonAdmin();

-----------------------------------------
 
CREATE OR REPLACE FUNCTION getEvaluationCurricularOccurrenceID(id INTEGER) 
RETURNS INTEGER AS $$
DECLARE
result INTEGER;
BEGIN
 SELECT Evaluation.cuOccurrenceID INTO result
 FROM Evaluation
 WHERE Evaluation.evaluationID = id AND
 Evaluation.visible = 1;
return result;
END 
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION onlyOneExam() RETURNS trigger AS $$
 DECLARE
 numberOfExams INTEGER;
 curricular INTEGER;
BEGIN
 curricular:=getEvaluationCurricularOccurrenceID(NEW.evaluationID);
 SELECT COUNT(*) INTO numberOfExams
 FROM Evaluation
 WHERE Evaluation.cuOccurrenceID = curricular AND
 Evaluation.evaluationtype = 'Exam' AND
 Evaluation.visible = 1;
 IF(numberOfExams > 1)
 THEN
 RAISE EXCEPTION 'Only 1 exam per Occurrence is allowed';
 ELSE
  RETURN NEW;
  END IF;
END $$ LANGUAGE 'plpgsql';

CREATE TRIGGER oneExamPerUC
BEFORE INSERT ON Exam
FOR EACH ROW
EXECUTE PROCEDURE onlyOneExam();
-----------------------------------------
CREATE OR REPLACE FUNCTION createEvaluationGrades() RETURNS trigger AS $$
DECLARE
student INTEGER;
BEGIN
FOR student IN SELECT studentcode FROM CurricularEnrollment
WHERE cuoccurrenceid=NEW.cuoccurrenceid LOOP
INSERT INTO Grade(studentcode,evaluationid)
VALUES(student,NEW.evaluationid);
END LOOP;
RETURN NEW;
END
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER createGrades
AFTER INSERT ON Evaluation
FOR EACH ROW
EXECUTE PROCEDURE createEvaluationGrades();
-----------------------------------------
 
 CREATE OR REPLACE FUNCTION getStudentCurrentCourse(studentCodeToGetCourse INTEGER) RETURNS SETOF INTEGER AS $$
 BEGIN RETURN QUERY 
 SELECT courseID 
  FROM CourseEnrollment 
  WHERE CourseEnrollment.visible=1 AND CourseEnrollment.studentCode = studentCodeToGetCourse
   ORDER BY startYear DESC 
   LIMIT 1;
  END $$ LANGUAGE 'plpgsql';


 CREATE OR REPLACE FUNCTION curricularUnitBelongsToStudentCourse(cuOccurrenceIDToCheck INTEGER,studentCourseID INTEGER) RETURNS SETOF INTEGER AS $$
 BEGIN RETURN QUERY 
 SELECT CurricularUnitOccurrence.cuOccurrenceID
 FROM CurricularUnitOccurrence,Syllabus
  WHERE CurricularUnitOccurrence.cuOccurrenceID = cuOccurrenceIDToCheck AND CurricularUnitOccurrence.visible=1 AND CurricularUnitOccurrence.syllabusID = Syllabus.syllabusID 
    AND Syllabus.visible=1 AND Syllabus.courseCode = studentCourseID; 
 END $$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION curicularUnitEnrollmentCheck() RETURNS trigger AS $$
 DECLARE
 studentCourseID INTEGER;
 sameCourse INTEGER;
 BEGIN 
 SELECT * INTO studentCourseID FROM getStudentCurrentCourse(NEW.studentCode);
  IF (studentCourseID IS NOT NULL)
    THEN
    SELECT COUNT(*) INTO sameCourse FROM curricularUnitBelongsToStudentCourse(NEW.cuOccurrenceID,studentCourseID);
    IF(sameCourse >0)
    THEN
     RETURN NEW;
     END IF;
  END IF;
 RETURN NULL;
END $$ LANGUAGE 'plpgsql';

CREATE TRIGGER checkStudentEnrolledInCorrectCourse
BEFORE INSERT OR UPDATE ON CurricularEnrollment
FOR EACH ROW
EXECUTE PROCEDURE curicularUnitEnrollmentCheck();

-----------------------------------------

CREATE OR REPLACE FUNCTION isClassDateValid() RETURNS trigger AS $$
DECLARE
 beginDate DATE;
 endDate DATE;
BEGIN
SELECT calendar.begindate, calendar.enddate INTO beginDate, endDate
FROM syllabus, curricularunitoccurrence, calendar
WHERE 
 curricularunitoccurrence.visible=1 AND calendar.visible=1 AND syllabus.visible=1 AND 
 NEW.occurrenceid = curricularunitoccurrence.cuoccurrenceid AND
 syllabus.calendaryear = calendar.year AND
 curricularunitoccurrence.syllabusid = syllabus.syllabusid AND
 curricularunitoccurrence.curricularsemester = calendar.semester;

 IF (NEW.classDate::date BETWEEN beginDate AND endDate)
 THEN RETURN NEW;
 ELSE RETURN NULL;--RAISE EXCEPTION 'Class Date is not valid';
 END IF; 
END
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER checkClassDate
BEFORE INSERT OR UPDATE ON Class
FOR EACH ROW
EXECUTE PROCEDURE isClassDateValid();
 
 -----------------------------------------
 
CREATE OR REPLACE FUNCTION isRoomAvailable() RETURNS trigger AS $$
DECLARE
count INTEGER;
BEGIN
SELECT COUNT(class.classid) INTO count
FROM Class
WHERE Class.visible=1 AND Class.roomid = NEW.roomid 
AND NEW.classid <> Class.classid
AND (NEW.classDate, interval '1' minute * NEW.duration) OVERLAPS
(Class.classDate, interval '1' minute * class.duration);

IF (count = 0)
THEN RETURN NEW;
ELSE RETURN NULL;--RAISE EXCEPTION 'Room is not available at the specified time';
END IF;
END
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER checkClassRoom
BEFORE INSERT OR UPDATE ON Class
FOR EACH ROW
EXECUTE PROCEDURE isRoomAvailable();

-----------------------------------------

CREATE OR REPLACE FUNCTION isCourseAvailable() RETURNS trigger AS $$
DECLARE
creationYear INTEGER;
BEGIN
SELECT 
 EXTRACT(YEAR FROM course.creationdate) INTO creationYear
FROM 
 course
WHERE 
 course.code = NEW.courseid;

IF (NEW.startYear >= creationYear)
THEN RETURN NEW;
ELSE RETURN NULL;
END IF;
END
$$ LANGUAGE 'plpgsql';
 
CREATE TRIGGER checkCourseDate
BEFORE INSERT OR UPDATE ON CourseEnrollment
FOR EACH ROW
EXECUTE PROCEDURE isCourseAvailable();

-----------------------------------------

CREATE OR REPLACE FUNCTION createUsername()
RETURNS trigger AS $$
BEGIN
NEW.username = EXTRACT(YEAR FROM NOW())::text || NEW.academicCode::text;
RETURN NEW;
END 
$$ LANGUAGE 'plpgsql'; 

CREATE TRIGGER setUsername
BEFORE INSERT OR UPDATE ON Person
FOR EACH ROW
EXECUTE PROCEDURE createUsername();

-----------------------------------------

CREATE OR REPLACE FUNCTION createClassAttendances() RETURNS trigger AS $$
DECLARE
student INTEGER;
BEGIN
FOR student IN SELECT studentcode FROM CurricularEnrollment
WHERE cuoccurrenceid=NEW.occurrenceid LOOP
INSERT INTO Attendance(studentcode,classid,attended)
VALUES(student,NEW.classid,FALSE);
END LOOP;
RETURN NEW;
END
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER createAttendances
AFTER INSERT ON Class
FOR EACH ROW
EXECUTE PROCEDURE createClassAttendances();

-----------------------------------------
-- FULL TEXT TRIGGERS--

 -- PERSON
CREATE FUNCTION person_search_trigger() RETURNS trigger AS $$
begin
 new.tsv := to_tsvector(coalesce(new.name,''));
 return new;
end
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER tsvectorPersonUpdate BEFORE INSERT OR UPDATE
ON Person FOR EACH ROW EXECUTE PROCEDURE person_search_trigger();

 -- COURSE
CREATE FUNCTION course_search_trigger() RETURNS trigger AS $$
DECLARE
names text;
areas text;
begin


names = (SELECT test
              FROM
                (SELECT array_to_string(array_agg(CurricularUnit.name), ' ') AS test
                FROM  Course, Syllabus, CurricularUnitOccurrence, CurricularUnit
                WHERE Course.code = new.code AND Course.code = Syllabus.courseCode AND Syllabus.syllabusID = CurricularUnitOccurrence.syllabusID 
                AND CurricularUnitOccurrence.curricularUnitID = CurricularUnit.curricularID) AS CUs_names);


areas = (SELECT test
              FROM
                (SELECT array_to_string(array_agg(Area.area), ' ') AS test
                FROM  Course, Syllabus, CurricularUnitOccurrence, CurricularUnit, Area
                WHERE Course.code = new.code AND Course.code = Syllabus.courseCode AND Syllabus.syllabusID = CurricularUnitOccurrence.syllabusID 
                AND CurricularUnitOccurrence.curricularUnitID = CurricularUnit.curricularID
                AND CurricularUnit.areaID = area.areaID) AS CUs_names);


 new.tsv =
  setweight(to_tsvector(coalesce(new.name,'')), 'A') ||
  setweight(to_tsvector(coalesce(new.description,'')), 'D');
  
  IF TG_OP = 'UPDATE' THEN
    new.tsv = new.tsv || 
              setweight(to_tsvector(names),'B') ||
              setweight(to_tsvector(areas),'C');

  END IF;
 return new;
end
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER tsvectorCourseUpdate BEFORE UPDATE OR INSERT
ON Course FOR EACH ROW EXECUTE PROCEDURE course_search_trigger();

 -- CURRICULAR UNIT INSERT
CREATE FUNCTION cu_search_trigger() RETURNS trigger AS $$
DECLARE
temp text;
begin
    
    temp = (SELECT area FROM Area WHERE Area.areaID = new.AreaID);

    -- Update own Curricular Unit TSV
    new.tsv = setweight(to_tsvector(coalesce(new.name,'')), 'B') ||
    setweight(to_tsvector(coalesce(temp)), 'C');

    return new;

end
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER tsvectorCuInsertUpdate BEFORE INSERT OR UPDATE
ON CurricularUnit FOR EACH ROW EXECUTE PROCEDURE cu_search_trigger();


 -- CURRICULAR UNIT UPDATE
CREATE FUNCTION cu_update_trigger() RETURNS trigger AS $$
DECLARE
temp text;
begin
    
    UPDATE Course
    SET code = code      -- cu_search
    WHERE Course.code IN
    (SELECT Course.code
     FROM  Course, Syllabus, CurricularUnitOccurrence, CurricularUnit
     WHERE Course.code = Syllabus.courseCode AND Syllabus.syllabusID = CurricularUnitOccurrence.syllabusID
     AND CurricularUnitOccurrence.curricularUnitID = CurricularUnit.curricularID 
     AND CurricularUnit.curricularID = new.curricularID);

    return new;

end
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER tsvectorCuUpdate AFTER UPDATE
ON CurricularUnit FOR EACH ROW EXECUTE PROCEDURE cu_update_trigger();



-- CURRICULAR UNIT OCCURRENCE - adding one occurrence, if the first, means adding a CU to course

CREATE FUNCTION cuOccurrence_search_trigger() RETURNS trigger AS $$
DECLARE

begin

-- Update Course TSV
    UPDATE Course
    SET code = code      -- cuOccurrence
    WHERE Course.code IN
   (SELECT Course.code
     FROM  Course, Syllabus, CurricularUnitOccurrence, CurricularUnit
     WHERE Course.code = Syllabus.courseCode AND Syllabus.syllabusID = CurricularUnitOccurrence.syllabusID
     AND CurricularUnitOccurrence.curricularUnitID = CurricularUnit.curricularID 
     AND CurricularUnit.curricularID = new.curricularUnitID);

  return new;

end
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER tsvectorCUOccurrenceUpdate AFTER INSERT
ON CurricularUnitOccurrence FOR EACH ROW EXECUTE PROCEDURE cuOccurrence_search_trigger();



 -- AREA   -- When a area name is updated, update it on Curricular Unit tsv
CREATE FUNCTION area_search_trigger() RETURNS trigger AS $$
begin
    -- Update Curricular Unit TSV
    IF TG_OP = 'UPDATE' THEN
      UPDATE CurricularUnit
      SET tsv = setweight(to_tsvector(CurricularUnit.name), 'B') || 
      setweight(to_tsvector(new.area), 'C')     
      
      WHERE CurricularUnit.curricularID
      IN(SELECT curricularID
        FROM  CurricularUnit
        WHERE CurricularUnit.areaID = new.areaID ); -- curricular units whose area we are updating
        

      return new;
    END IF;

    IF TG_OP = 'DELETE' THEN
      UPDATE CurricularUnit
      SET tsv = setweight(to_tsvector(CurricularUnit.name), 'B')
      WHERE CurricularUnit.curricularID
      IN(SELECT curricularID
        FROM  CurricularUnit
        WHERE CurricularUnit.areaID = old.areaID); -- curricular units whose area we are deleting
      return new;
    END IF;
end
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER tsvectorAreaUpdate BEFORE UPDATE OR DELETE
ON Area FOR EACH ROW EXECUTE PROCEDURE area_search_trigger();


-- INDEXES

SET SCHEMA 'final'
;
 -- FULL TEXT INDEXES

CREATE INDEX tsv_person_idx ON Person USING gin(tsv);
CREATE INDEX tsv_course_idx ON Course USING gin(tsv);
CREATE INDEX tsv_curricularUnit_idx ON CurricularUnit USING gin(tsv);

-- INDEXES


CREATE INDEX username_idx ON Person USING hash(username);
CREATE INDEX request_student_idx ON Request USING hash(studentCode);
CREATE INDEX request_admin_idx ON Request USING hash(adminCode);


CREATE INDEX syllabus_course_idx ON Syllabus USING btree(courseCode);                -- Used in IN comparisons
CREATE INDEX cuEnroll_student_idx ON CurricularEnrollment USING btree(studentCode);  -- Used in IN comparisons
CREATE INDEX grade_eval_idx ON Grade USING btree(evaluationID);
CREATE INDEX occurrence_curricular_idx ON CurricularUnitOccurrence USING btree(curricularUnitID, cuOccurrenceID);
CREATE INDEX occurrence_syllabus_idx ON CurricularUnitOccurrence USING btree(syllabusID, cuOccurrenceID);
CREATE INDEX occurrence_evaluation_idx ON Evaluation USING btree(cuOccurrenceID,evaluationID);
CREATE INDEX evaluation_weight_idx ON Evaluation USING btree(weight);
CREATE INDEX grade_student_eval_idx ON Grade USING btree(studentCode, evaluationID);
CREATE INDEX grade_grade_idx ON Grade USING btree(grade);
CREATE INDEX group_elements_idx ON GroupWork USING btree(maxElements, minElements);
CREATE INDEX test_duration_idx ON Test USING btree(duration);
CREATE INDEX exam_duration_idx ON Exam USING btree(duration);


CREATE INDEX class_cuOccurrenceID_idx ON Class USING btree(occurrenceID);
ALTER TABLE Class CLUSTER ON class_cuOccurrenceID_idx;

CREATE INDEX courEnroll_currYear_idx ON CourseEnrollment USING btree(curricularYear);
ALTER TABLE CourseEnrollment CLUSTER ON courEnroll_currYear_idx;

CREATE INDEX cuEnroll_finalGra_idx ON CurricularEnrollment USING btree(finalGrade);
ALTER TABLE CurricularEnrollment CLUSTER ON cuEnroll_finalGra_idx;

CREATE INDEX cu_credits_idx ON CurricularUnit USING btree(credits);
ALTER TABLE CurricularUnit CLUSTER ON cu_credits_idx;



 