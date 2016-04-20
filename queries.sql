--Select a syllabus given the name of a course
--e.g. course:Chemistry
SELECT 
  curricularunit.name, 
  curricularunitoccurrence.curricularyear, 
  curricularunitoccurrence.curricularsemester
FROM 
  syllabus, 
  course, 
  curricularunitoccurrence, 
  curricularunit
WHERE 
  syllabus.syllabusid = curricularunitoccurrence.syllabusid AND
  course.code = syllabus.coursecode AND
  course.currentcalendaryear = syllabus.calendaryear AND
  curricularunitoccurrence.curricularunitid = curricularunit.curricularid AND
  course.name = 'Chemistry';

--List Evaluations of a student
 SELECT Evaluation.*,CurricularUnit.name 
  FROM Evaluation,CurricularEnrollment,CurricularUnit,Person,CurricularUnitOccurrence
    WHERE
     CurricularUnitOccurrence.cuOccurrenceID=CurricularEnrollment.cuOccurrenceID AND
      Evaluation.cuOccurrenceID = CurricularEnrollment.cuOccurrenceID  AND CurricularEnrollment.studentCode= 437 AND 
         CurricularUnit.curricularID=CurricularUnitOccurrence.curricularUnitID AND 
             Person.academiccode = 437 AND  Person.visible=1 AND Evaluation.evaluationDate >= now()
      ORDER BY Evaluation.evaluationDate;
     

--Classes of a certain CurricularUnitOccurence
    SELECT Class.classDate,Room.room,CurricularUnit.name FROM Class,CurricularUnitOccurrence,CurricularUnit,Room
     WHERE  CurricularUnitOccurrence.cuOccurrenceID=34 AND CurricularUnit.curricularID=CurricularUnitOccurrence.curricularUnitID AND 
     Class.occurrenceID = CurricularUnitOccurrence.cuOccurrenceID AND Class.classDate >= now() AND Class.roomID = Room.roomID
     ORDER BY Class.classDate;

--Get CurricularUnit info
SELECT * FROM CurricularUnit WHERE CurricularUnit.curricularID= 1;

--List of courses
SELECT 
  course.name,course.description,course.creationDate,person.name,COUNT(courseenrollment.studentcode),course.courseType
FROM 
  courseenrollment, 
  course,
  person
WHERE 
  courseenrollment.courseid = course.code AND
  courseenrollment.finishyear IS NULL AND
  course.teachercode = person.academiccode
GROUP BY course.code,person.name;


--List of curricular units done with grade
--e.g. student:1
SELECT 
  curricularunit.name, 
  curricularenrollment.finalgrade
FROM 
  curricularenrollment, 
  curricularunitoccurrence, 
  person, 
  curricularunit, 
  syllabus
WHERE
  person.academiccode = 1 AND
  curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid AND
  person.academiccode = curricularenrollment.studentcode AND
  curricularunit.curricularid = curricularunitoccurrence.curricularunitid AND
  syllabus.syllabusid = curricularunitoccurrence.syllabusid AND
  curricularenrollment.finalGrade >= 10;

 --Weight of evaluations per curricular unit occurrence of syllabus
 --e.g. syllabusId:2
 SELECT 
  curricularunit.name, 
  sum(evaluation.weight)
FROM 
  curricularunitoccurrence, 
  curricularunit, 
  evaluation,
  syllabus
WHERE 
  curricularunit.curricularid = curricularunitoccurrence.curricularunitid AND
  evaluation.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid AND
  syllabus.syllabusid = curricularunitoccurrence.syllabusid
  AND syllabus.syllabusid = 2
  GROUP BY curricularunitoccurrence.cuOccurrenceID, curricularunit.name;

--Login Query
--e.g. username:20163
SELECT password
FROM Person
WHERE Person.username='20163';


SELECT * FROM Person WHERE tsv @@ plainto_tsquery('texto a procurar');

SELECT * FROM Course WHERE tsv @@ plainto_tsquery('texto a procurar');

SELECT * FROM CurricularUnit WHERE tsv @@ plainto_tsquery('texto a procurar');