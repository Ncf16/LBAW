CREATE OR REPLACE FUNCTION getPersonType(id INTEGER) 
RETURNS  PersonType AS  $$
DECLARE
result PersonType;
BEGIN
  SELECT PERSON.personType INTO result
  FROM PERSON 
  WHERE academicCode = id AND visible=1;
return  result; 
END 
$$ LANGUAGE 'plpgsql';
 


CREATE OR REPLACE FUNCTION isPersonTeacher()
RETURNS trigger AS  $$
DECLARE
  type PersonType;
BEGIN
type:=getPersonType(NEW.teacherCode);
  IF (type =  'Teacher' )
  THEN 
    RETURN NEW;
    ELSE
   RETURN NULL;-- RAISE EXCEPTION 'User is not a Teacher';
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
   RETURN NULL; -- RAISE EXCEPTION 'User is not a Student';
  END IF;
END 
$$  LANGUAGE 'plpgsql'; 
  
  CREATE OR REPLACE FUNCTION isPersonAdmin()
RETURNS trigger AS  $$
DECLARE
  type PersonType;
BEGIN
type:=getPersonType(NEW.adminCode);
  IF (type =  'Admin' )
  THEN 
    RETURN NEW;
    ELSE
   RETURN NULL;--  RAISE EXCEPTION 'User is not an Admin';
  END IF;
END 
$$  LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION isClassDateValid()
RETURNS trigger AS $$
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
  ELSE RETURN NULL;
 END IF; 
END
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION isRoomAvailable()
RETURNS trigger AS $$
DECLARE
count INTEGER;
BEGIN
SELECT COUNT(class.classid) INTO count
FROM Class
WHERE Class.roomid = NEW.roomid AND Class.visible=1 
AND (NEW.classDate, interval '1' minute * NEW.duration) OVERLAPS
(Class.classDate, interval '1' minute * class.duration);

IF (count = 0)
THEN RETURN NEW;
ELSE RETURN NULL;
END IF;
END
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION isCourseAvailable()
RETURNS trigger AS $$
DECLARE
creation DATE;
BEGIN
SELECT 
  course.creationdate INTO creation
FROM 
  course
WHERE 
  course.code = NEW.courseid;

IF (NEW.startYear >= creation)
THEN RETURN NEW;
ELSE RETURN NULL;
END IF;
END
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION isPersonAdmin() RETURNS trigger AS  $$
DECLARE
  type PersonType;
BEGIN
type:=getPersonType(NEW.adminCode);
  IF (type =  'Admin' )
  THEN 
    RETURN NEW;
    ELSE
   RETURN NULL;--  RAISE EXCEPTION 'User is not an Admin';
  END IF;
END 
$$  LANGUAGE 'plpgsql';  

CREATE OR REPLACE FUNCTION examsPerOccurrence(occurrenceID INTEGER) RETURNS SETOF INTEGER AS $$
 BEGIN
 RETURN QUERY SELECT *
    FROM Evaluation,Exam 
      WHERE Exam.visible=1 AND Evaluation.visible=1 AND Evaluation.evaluationID = Exam.evaluationID AND Evaluation.cuOccurrenceID=occurrenceID ;
  END
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION onlyOneExam() RETURNS trigger AS $$
  DECLARE
  numberOfExams INTEGER;
BEGIN
  SELECT COUNT(*) INTO numberOfExams FROM examsPerOccurrence(NEW.occurrenceID);
  IF(numberOfExams >= 1)
    THEN
      RETURN NULL; --RAISE EXCEPTION 'Only 1 exam per Occurrence is allowed';
    ELSE
      RETURN NEW;
END  $$ LANGUAGE 'plpgsql';
 

 
CREATE TRIGGER oneExamPerUC
BEFORE INSERT ON Exam
FOR EACH ROW
EXECUTE PROCEDURE onlyOneExam();

--check if good idea, or should make a more specific trigger ( to be called on each update might be overkill)
CREATE TRIGGER checkDiretorType
BEFORE INSERT OR UPDATE ON Course
FOR EACH ROW
EXECUTE PROCEDURE isPersonTeacher();

CREATE TRIGGER checkStudentType
BEFORE INSERT OR UPDATE ON Request 
FOR EACH ROW
EXECUTE PROCEDURE isPersonStudent();

CREATE TRIGGER checkAdminType
BEFORE INSERT OR UPDATE ON Request
FOR EACH ROW
EXECUTE PROCEDURE isPersonAdmin();
 
CREATE TRIGGER checkRegentType
BEFORE INSERT OR UPDATE ON CurricularUnitOccurrence 
FOR EACH ROW
EXECUTE PROCEDURE  isPersonTeacher(); 

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
 

CREATE TRIGGER checkClassDate
BEFORE INSERT OR UPDATE ON Class
FOR EACH ROW
EXECUTE PROCEDURE isClassDateValid();

CREATE TRIGGER checkClassRoom
BEFORE INSERT OR UPDATE ON Class
FOR EACH ROW
EXECUTE PROCEDURE isRoomAvailable();
 
CREATE TRIGGER checkCourseDate
BEFORE INSERT OR UPDATE ON CourseEnrollment
FOR EACH ROW
EXECUTE PROCEDURE isCourseAvailable();

CREATE FUNCTION person_search_trigger() RETURNS trigger AS $$
begin
  new.tsv := to_tsvector(coalesce(new.name,''));
  return new;
end
$$ LANGUAGE 'plpgsql';

 
CREATE FUNCTION person_course_trigger() RETURNS trigger AS $$
begin
  new.tsv :=
    setweight(to_tsvector(coalesce(new.meta->>'title','')), 'A') ||
    setweight(to_tsvector(coalesce(new.text,'')), 'D');
  return new;
end
$$ LANGUAGE 'plpgsql';

CREATE FUNCTION person_cu_trigger() RETURNS trigger AS $$
begin
  new.tsv :=
    setweight(to_tsvector(coalesce(new.meta->>'title','')), 'A') ||
    setweight(to_tsvector(coalesce(new.text,'')), 'D');
  return new;
end
$$ LANGUAGE 'plpgsql';
 */
 
/* 
CREATE FUNCTION person_search_trigger() RETURNS trigger AS $$
begin
  new.tsv := to_tsvector(coalesce(new.name,''));
  return new;
end
$$ LANGUAGE 'plpgsql';
 

 
CREATE FUNCTION person_course_trigger() RETURNS trigger AS $$
begin
  new.tsv :=
    setweight(to_tsvector(coalesce(new.meta->>'title','')), 'A') ||
    setweight(to_tsvector(coalesce(new.text,'')), 'D');
  return new;
end
$$ LANGUAGE 'plpgsql';

CREATE FUNCTION person_cu_trigger() RETURNS trigger AS $$
begin
  new.tsv :=
    setweight(to_tsvector(coalesce(new.meta->>'title','')), 'A') ||
    setweight(to_tsvector(coalesce(new.text,'')), 'D');
  return new;
end
$$ LANGUAGE 'plpgsql';
*/

/* 
CREATE TRIGGER tsvectorPersonUpdate BEFORE INSERT OR UPDATE
ON data_rows FOR EACH ROW EXECUTE PROCEDURE person_search_trigger();
*/
/*
CREATE TRIGGER tsvectorCourseUpdate BEFORE INSERT OR UPDATE
ON data_rows FOR EACH ROW EXECUTE PROCEDURE course_search_trigger();

CREATE TRIGGER tsvectorCuUpdate BEFORE INSERT OR UPDATE
ON data_rows FOR EACH ROW EXECUTE PROCEDURE cu_search_trigger();
*/
