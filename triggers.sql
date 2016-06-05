 SET SCHEMA 'proto';
DROP TRIGGER IF EXISTS checkDiretorType ON Course CASCADE;
DROP TRIGGER IF EXISTS checkRegentType ON CurricularUnitOccurrence CASCADE;
DROP TRIGGER IF EXISTS checkTeacherType ON Class CASCADE;
DROP TRIGGER IF EXISTS checkAdminType ON Request CASCADE;
DROP TRIGGER IF EXISTS checkStudentType ON Request CASCADE;
DROP TRIGGER IF EXISTS checkStudentType ON Attendance CASCADE;
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
 type PersonType;
BEGIN
type:=getPersonType(NEW.adminCode);
 IF (type = 'Admin' OR NEW.adminCode IS NULL )
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
 
CREATE OR REPLACE FUNCTION getExamsCurricularOccurrenceID(id INTEGER) 
RETURNS INTEGER AS $$
DECLARE
result INTEGER;
BEGIN
 SELECT Evaluation.cuOccurrenceID INTO result
 FROM Evaluation,CurricularUnitOccurrence,Exam
 WHERE  CurricularUnitOccurrence.cuOccurrenceID = id AND Evaluation.cuOccurrenceID = id AND Exam.evaluationID = Evaluation.evaluationID AND
 Evaluation.visible = 1 AND CurricularUnitOccurrence.visible=1 AND  Exam.visible=1;
return result;
END 
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION onlyOneExam() RETURNS trigger AS $$
 DECLARE
 numberOfExams INTEGER;
 curricular INTEGER;
BEGIN
 curricular:=getExamsCurricularOccurrenceID(NEW.cuOccurrenceID);
 SELECT COUNT(*) INTO numberOfExams
 FROM Evaluation
 WHERE Evaluation.cuOccurrenceID = curricular AND
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

/*
CREATE OR REPLACE FUNCTION createClassAttendances() RETURNS trigger AS $$
DECLARE
student INTEGER;
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

CREATE TRIGGER createAttendances
BEFORE INSERT ON Class
FOR EACH ROW
EXECUTE PROCEDURE createClassAttendances();
*/

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