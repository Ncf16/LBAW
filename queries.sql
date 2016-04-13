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

SELECT Evaluation.*,CurricularUnit.name
  FROM Evaluation,CurricularEnrollment,CurricularUnit,Person
    WHERE
      Evaluation.cuOccurrenceID = CurricularEnrollment.cuOccurrenceID AND Evaluation.visible=1 AND Evaluation.visible=1 AND 
      CurricularEnrollment.studentCode= USER_CODE AND CurricularUnit.curricularUnitID AND CurricularEnrollment.curricularUnitID AND CurricularUnit.visible=1
      AND Person.academiccode = USER_CODE AND  Person.visible=1 AND Person.personType ='Student';


--List of courses
SELECT 
  course.name,course.description,course.creationDate,person.name,COUNT(courseenrollment.studentcode),course.courseType
FROM 
  courseenrollment, 
  course,
  person
WHERE 
  courseenrollment.courseid = course.code AND
  courseenrollment.finishyear IS NOT NULL AND
  course.teachercode = person.academiccode
GROUP BY course.code,person.name;

-- list of curricular units done with grade
--e.g. student:Ayana
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
  person.academicCode = 'Ayana' AND
  curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid AND
  person.academiccode = curricularenrollment.studentcode AND
  curricularunit.curricularid = curricularunitoccurrence.curricularunitid AND
  syllabus.syllabusid = curricularunitoccurrence.syllabusid AND
  curricularenrollment.finalGrade >= 10;