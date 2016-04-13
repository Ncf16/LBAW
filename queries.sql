--Select a syllabus given the name of a course
--e.g. course:Chemistry

SELECT 
  curricularunit.name, 
  curricularunitoccurrence.curricularyear, 
  curricularunitoccurrence.curricularsemester
FROM 
  public.syllabus, 
  public.course, 
  public.curricularunitoccurrence, 
  public.curricularunit
WHERE 
  syllabus.syllabusid = curricularunitoccurrence.syllabusid AND
  course.code = syllabus.coursecode AND
  course.currentcalendaryear = syllabus.calendaryear AND
  curricularunitoccurrence.curricularunitid = curricularunit.curricularid AND
  course.name = 'Chemistry';

SELECT Evaluation.*,CurricularUnit.name
  FROM Evaluation,CurricularEnrollment,CurricularUnit
    WHERE
      Evaluation.cuOccurrenceID = CurricularEnrollment.cuOccurrenceID AND Evaluation.visible=1 AND Evaluation.visible=1 AND 
      CurricularEnrollment.studentCode= USER_CODE AND CurricularUnit.curricularUnitID AND CurricularEnrollment.curricularUnitID AND CurricularUnit.visible=1
