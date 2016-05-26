<?php
  include_once($BASE_DIR . "/config/init.php");

function getGradeCuStatus($academicCode){
 global $conn;

$queryPart1= "(SELECT  CurricularUnit.name,MAX(syllabus.calendarYear) , CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear, 
CurricularUnitOccurrence.cuoccurrenceid,'notDone' AS curricularStatus
                  FROM Person, CurricularEnrollment, CurricularUnitOccurrence, CurricularUnit,Syllabus
                      WHERE Person.academiccode = curricularenrollment.studentcode
                          AND curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid
                            AND Person.academiccode = ? AND CurricularUnitOccurrence.curricularunitid = curricularunit.curricularid
                              AND CurricularUnitOccurrence.syllabusid = syllabus.syllabusid AND curricularenrollment.finalgrade IS NULL
                                  GROUP BY  curricularunit.name ,CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear,CurricularUnitOccurrence.cuoccurrenceid)";

$queryPart2= " UNION (SELECT CurricularUnit.name,MAX(curricularenrollment.finalgrade) , CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear,
CurricularUnitOccurrence.cuoccurrenceid,'done' AS curricularStatus
                    FROM Person, CurricularEnrollment, CurricularUnitOccurrence, CurricularUnit
                        WHERE Person.academiccode = curricularenrollment.studentcode
                            AND curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid
                                AND CurricularUnitOccurrence.curricularunitid = curricularunit.curricularid
                                    AND Person.academiccode = ?  AND curricularenrollment.finalgrade IS NOT null
                                        GROUP BY  curricularunit.name ,CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear,CurricularUnitOccurrence.cuoccurrenceid)";

    $query=$queryPart1.$queryPart2;
     $stmt = $conn->prepare($query);
    $stmt->execute(array($academicCode,$academicCode));
    $userGrades = $stmt->fetchAll();
    return $userGrades;

}

 
  
?>
