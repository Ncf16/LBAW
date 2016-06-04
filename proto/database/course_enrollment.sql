-- List students enrolled in a certain course
-- move course.code para o inicio?
SELECT *
FROM Person, Courseenrollment, Course
WHERE Person.academiccode = Courseenrollment.studentcode
AND Courseenrollment.courseid = course.code
AND course.code = :coursecode
ORDER BY Person.name;

-- Create a course enrollment
INSERT INTO courseenrollment(courseid, studentcode, curricularyear, startyear, finishyear)
VALUES(:courseid, :studentcode, :curricularyear, current_date, NULL);

-- View Courses and Course Enrollments info of a certain person -> maybe select 1st           -- enrollment, etc?
SELECT *
FROM Person, CourseEnrollment, Course
WHERE Person.academiccode = Courseenrollment.studentcode
AND Courseenrollment.courseid = course.code
AND Person.academiccode = :academiccode;

-- Edit a course enrollment for a certain course-student
UPDATE courseenrollment
SET courseGrade = :courseGrade,
	curricularYear = :curricularYear,
	finishYear = :finishYear,
	startYear = :startyear
WHERE courseid = :courseid
	  AND studentcode = :studentcode;


-- Finish course   -> if he has all UCs at the end of the year?
UPDATE courseenrollment
SET finishYear = current_course
WHERE courseid = :courseid
	  AND studentcode = :studentcode;


-- Next year
UPDATE courseenrollment
SET curricularYear = curricularYear+1
WHERE courseid = :courseid
	  AND studentcode = :studentcode;

-- Update course grade
UPDATE courseenrollment
SET courseGrade = :courseGrade
WHERE courseid = :courseid
	  AND studentcode = :studentcode;


