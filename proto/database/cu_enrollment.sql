-- List CU enrollments for a certain student: group by year
SELECT *
FROM Person, CurricularEnrollment, CurricularUnitOccurrence
WHERE Person.academiccode = curricularenrollment.studentcode
AND curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid
AND Person.academiccode = :academiccode
AND curricularenrollment.grade IS NOT null
ORDER BY curricularunitoccurrence.curricularyear;

-- List CU enrollments for a certain CU Occurrence: group by year
SELECT *
FROM Person, CurricularEnrollment, CurricularUnitOccurrence
WHERE Person.academiccode = curricularenrollment.studentcode
AND curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid
AND curricularunitoccurrence.cuoccurrenceid = :occurrenceid
LIMIT :limit OFFSET :offset
ORDER BY Person.name


-- Create a CU enrollment
INSERT INTO curricularenrollment(cuoccurrenceid, studentcode)
VALUES(:cuoccurrenceid, :studentcode) RETURNING (cuoccurrenceid, studentcode);

-- ViewCU enrollments info of a certain person on a certain CU-> maybe select 1st 

SELECT *
FROM Person, curricularenrollment, CurricularUnitOccurrence, CurricularUnit
WHERE Person.academiccode = curricularenrollment.studentcode
AND curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid
AND CurricularUnitOccurrence.curricularunitid = curricularunit.curricularid
AND Person.academiccode = :academiccode
AND curricularunit.curricularid = :curricularid

-- Update CU final grade of a student on a CUOccurrence
UPDATE curricularenrollment
SET finalgrade = :finalgrade
WHERE cuoccurrenceid = :cuoccurrenceid
	  AND studentcode = :studentcode;
