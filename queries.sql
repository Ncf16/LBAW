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

--Get Course info, instead of CD name we get the ID
SELECT Course.name,Course.creationDate,Course.courseType, Course.teacherCode,COUNT(Person.academiccode)
  FROM Course,Person,CourseEnrollment WHERE
    Course.code = CourseEnrollment.courseID AND  Person.academiccode = CourseEnrollment.studentcode
      GROUP BY Course.name,Course.creationDate,Course.courseType, Course.teacherCode ;
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