/*
CREATE OR REPLACE FUNCTION createClassAttendances() RETURNS trigger AS $$
DECLARE
student INTEGER;
BEGIN
FOR student IN SELECT studentCode FROM CurricularEnrollment
WHERE cuoccurrenceid = NEW.occurrenceid LOOP
INSERT INTO Attendance(studentcode, classid, attended)
VALUES(student, NEW.classid, FALSE);
END LOOP;
END
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER createAttendances
BEFORE INSERT ON Class
FOR EACH ROW
EXECUTE PROCEDURE createClassAttendances();
*/

/*
SELECT studentCode
FROM CurricularEnrollment
WHERE cuoccurrenceid=5;
*/