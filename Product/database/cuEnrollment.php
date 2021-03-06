<?php
  include_once($BASE_DIR . "/config/init.php");

function getGradeCuStatus($academicCode,$year){
 global $conn;

$queryPart1= "(SELECT CurricularUnit.name,MAX(Syllabus.calendarYear) , CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear, 
CurricularUnitOccurrence.cuoccurrenceid,'notDone' AS curricularStatus
    FROM Person, CurricularEnrollment, CurricularUnitOccurrence,CurricularUnit,Syllabus,CourseEnrollment
         WHERE Person.academiccode = curricularenrollment.studentcode
                AND curricularenrollment.cuoccurrenceid = curricularunitoccurrence.cuoccurrenceid
                      AND Person.academiccode = ? AND CurricularUnitOccurrence.curricularunitid = curricularunit.curricularid
                          AND CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid  AND Syllabus.courseCode =CourseEnrollment.courseID
                             AND CourseEnrollment.studentcode= Person.academiccode AND curricularenrollment.finalgrade IS NULL AND CurricularUnit.visible=1
                              AND CurricularUnitOccurrence.visible=1 AND CurricularEnrollment.visible=1 AND Syllabus.visible=1 
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
                                    AND Person.academiccode = ?  AND curricularenrollment.finalgrade IS NOT null AND CurricularUnit.visible=1 AND CurricularUnitOccurrence.visible=1 AND CurricularEnrollment.visible=1  AND Syllabus.visible=1 AND Person.visible=1 AND CourseEnrollment.visible = 1
                                 GROUP BY  curricularunit.name ,CurricularUnitOccurrence.curricularsemester,CurricularUnitOccurrence.curricularYear,CurricularUnitOccurrence.cuoccurrenceid)";

 
    $query=$queryPart1.$queryPart2;
     $stmt = $conn->prepare($query);
    $stmt->execute(array($academicCode ,$academicCode ));
    $userGrades = $stmt->fetchAll();
    return $userGrades;

}

//perhaps course is not needed
 function getAvailableCurricularUnitAvailable($academiccode, $course, $year, $curricularYear){
 global $conn;

 $stmt = $conn->prepare("SELECT Course.code,CurricularUnit.name,CurricularUnit.curricularid,Person.academiccode,CurricularUnitOccurrence.curricularyear,Syllabus.calendaryear,Curricularunitoccurrence.cuOccurrenceID
  FROM Person,CourseEnrollment, Course,CurricularUnit,CurricularUnitOccurrence,Syllabus
    WHERE Course.code = ? AND Course.code = CourseEnrollment.courseID AND CourseEnrollment.studentCode = ? AND Person.academiccode = CourseEnrollment.studentCode
     AND Person.persontype = 'Student' AND Syllabus.coursecode= Course.code AND Syllabus.syllabusid = Curricularunitoccurrence.syllabusid AND Syllabus.calendaryear = ?
      AND Curricularunitoccurrence.curricularunitid = CurricularUnit.curricularid AND Curricularunitoccurrence.curricularyear <= ? AND
         Person.visible = 1 AND CourseEnrollment.visible = 1 AND Course.visible = 1 AND CurricularUnit.visible = 1 AND CurricularUnitOccurrence.visible = 1 AND Syllabus.visible = 1
         ORDER BY CurricularUnitOccurrence.curricularyear,CurricularUnit.name;");

$stmt->execute(array($course,$academiccode,$year,$curricularYear));
return $stmt->fetchAll();

}
 
function isEnrolledInCU($person,$CUO_ID,$course,$year,$CU_ID){
  global $conn;

  $stmt = $conn->prepare("SELECT *
                            FROM Person,CurricularEnrollment,CurricularUnitOccurrence,Course,Syllabus,CurricularUnit
                              WHERE curricularenrollment.studentcode = ? AND curricularenrollment.studentcode=person.academiccode AND person.persontype='Student'
                                  AND curricularenrollment.cuoccurrenceid = ? AND curricularenrollment.cuoccurrenceid=CurricularUnitOccurrence.cuoccurrenceid AND
                                    course.code = ? AND curricularunitoccurrence.syllabusid = syllabus.syllabusid AND syllabus.coursecode = Course.code
                                       AND syllabus.calendaryear = ? AND CurricularUnit.curricularid =  ? AND CurricularUnit.curricularid = CurricularUnitOccurrence.curricularunitid;");

  $stmt->execute(array($person,$CUO_ID,$course,$year,$CU_ID));
  $return = $stmt->fetchAll();
  
  if($return ==false)
    return false;
  else
    return true;
}
function enrollInCU($person ,$CUO_ID ){
   global $conn;

  $stmt = $conn->prepare("INSERT INTO CurricularEnrollment(cuOccurrenceID,studentCode)
    VALUES(?,?) RETURNING cuOccurrenceID,studentCode");

  $stmt->execute(array($CUO_ID,$person ));
  $return= $stmt->fetch();


  if($return['studentcode'] != $person || $return['cuoccurrenceid'] != $CUO_ID)
    return false;
  else
    return true;
}
function getAllStudentsCUO($CUO_ID){
   global $conn;
$stmt = $conn->prepare("SELECT curricularenrollment.studentcode
                            FROM CurricularEnrollment 
                              WHERE  curricularenrollment.cuoccurrenceid = ? ;");

  $stmt->execute(array($CUO_ID));
  return $stmt->fetchAll();
}
  function updateGradeCUEnroll($CUO_ID,$student,$grade){
  global $conn;
  $grade=intval(ceil ($grade));

  $stmt = $conn->prepare("UPDATE CurricularEnrollment SET finalgrade = ?
    WHERE  CurricularEnrollment.cuOccurrenceID  = ? AND CurricularEnrollment.studentCode = ? AND CurricularEnrollment.visible=1 RETURNING cuOccurrenceID,studentCode; ");
   $stmt->execute(array($grade ,$CUO_ID,$student));
   $return = $stmt->fetch();
  
    if($return == false || $return['studentcode'] != $student || $return['cuoccurrenceid'] != $CUO_ID)
    return false;
  else
    return true;
}
?>
