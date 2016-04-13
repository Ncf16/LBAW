SELECT 
  curricularunit.name
FROM 
  public.syllabus, 
  public.course, 
  public.curricularunitoccurrence, 
  public.curricularunit
WHERE 
  syllabus.syllabusid = curricularunitoccurrence.syllabusid AND
  course.code = syllabus.coursecode AND
  course.currentcalendaryear = syllabus.calendaryear AND
  curricularunitoccurrence.curricularunitid = curricularunit.curricularid;
