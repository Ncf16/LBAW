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
             Person.academiccode = 437 AND  Person.visible=1 AND Person.personType ='Student' AND
                Evaluation.evaluationDate >= now()
      ORDER BY Evaluation.evaluationDate;
     

    SELECT Class.classDate,Room.room,CurricularUnit.name FROM Class,CurricularUnitOccurrence,CurricularUnit,Room
     WHERE  CurricularUnitOccurrence.cuOccurrenceID=34 AND CurricularUnit.curricularID=CurricularUnitOccurrence.curricularUnitID AND 
     Class.occurrenceID = CurricularUnitOccurrence.cuOccurrenceID AND Class.classDate >= now() AND Class.roomID = Room.roomID
     ORDER BY Class.classDate;

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
GROUP BY course.code,person.name;
