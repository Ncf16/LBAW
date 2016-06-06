<?php
  include_once($BASE_DIR . "/config/init.php");

function getGradeCuStatus($academicCode){
 global $conn;

$queryPart1= "(SELECT CurricularUnit.name,MAX(Syllabus.calendarYear) , CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear, 
CurricularUnitOccurrence.cuoccurrenceid,'notDone' AS curricularStatus
                  FROM Person, CurricularEnrollment, CurricularUnitOccurrence, CurricularUnit,Syllabus,CourseEnrollment
                      WHERE Person.academiccode = curricularenrollment.studentcode
                          AND curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid
                            AND Person.academiccode = ? AND CurricularUnitOccurrence.curricularunitid = curricularunit.curricularid
                              AND CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid AND Syllabus.courseCode =CourseEnrollment.courseID
                                 AND CourseEnrollment.studentcode= Person.academiccode AND curricularenrollment.finalgrade IS NULL AND CurricularUnit.visible=1 AND CurricularUnitOccurrence.visible=1 AND CurricularEnrollment.visible=1 AND Syllabus.visible=1 
                                     AND Person.visible=1 AND CourseEnrollment.visible = 1
                                  GROUP BY curricularunit.name ,CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear,CurricularUnitOccurrence.cuoccurrenceid)";

$queryPart2= " UNION (SELECT CurricularUnit.name,MAX(curricularenrollment.finalgrade) , CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear,
CurricularUnitOccurrence.cuoccurrenceid,'done' AS curricularStatus
                    FROM Person, CurricularEnrollment, CurricularUnitOccurrence, CurricularUnit,CourseEnrollment,Syllabus
                        WHERE Person.academiccode = curricularenrollment.studentcode
                            AND curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid AND CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid
                              AND Syllabus.courseCode =CourseEnrollment.courseID 
                                AND CurricularUnitOccurrence.curricularunitid = curricularunit.curricularid  AND Syllabus.courseCode =CourseEnrollment.courseID
                                 AND CourseEnrollment.studentcode= Person.academiccode
                                    AND Person.academiccode = ?  AND curricularenrollment.finalgrade IS NOT null AND CurricularUnit.visible=1 AND CurricularUnitOccurrence.visible=1 AND CurricularEnrollment.visible=1 AND Syllabus.visible=1 AND Person.visible=1 AND CourseEnrollment.visible = 1
                                 GROUP BY  curricularunit.name ,CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear,CurricularUnitOccurrence.cuoccurrenceid)";

    $query=$queryPart1.$queryPart2;
     $stmt = $conn->prepare($query);
    $stmt->execute(array($academicCode,$academicCode));
    $userGrades = $stmt->fetchAll();
    return $userGrades;

}

 
  
?>
