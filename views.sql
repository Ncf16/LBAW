DROP VIEW IF EXISTS courseDirectors;
DROP TRIGGER IF EXISTS updateCourseDiretorView ON Course CASCADE;
DROP TRIGGER IF EXISTS insertOnDiretorView ON Course CASCADE;

/* Make a cluster on visble assim fica ordenado por visibilidade               */
CREATE VIEW courseDirectors AS
    SELECT course.teacherCode,course.code
    FROM course 
    WHERE course.visible=1  
    WITH CASCADED CHECK OPTION;

CREATE VIEW teachClass AS
    SELECT class.teacherCode,class.classID
    FROM class 
    WHERE class.visible=1  
    WITH CASCADED CHECK OPTION;