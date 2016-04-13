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