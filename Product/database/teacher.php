<?php

  function getAllTeachers(){
     global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE   persontype='Teacher'" );
    
    $stmt->execute();
    return $stmt->fetchAll();
}

function getTeacherWithName($username){
   global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE username = ? AND persontype='Teacher'" );
    
    $stmt->execute(array($username));
    return $stmt->fetch();
}

function getCourseDirectorsIDs(){
    global $conn;
    $stmt = $conn->prepare("SELECT teacherCode
                            FROM courseDirectors " );
    
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function checkTeacherCodeInArray($array,$code){
  foreach ($array as $toCheck) {
    if($toCheck['teacherCode']==$code)
      return true;
  }
  return false;
}

function getTeacherID($username){
  global $conn;
  $stmt = $conn->prepare("SELECT academiccode FROM Person
    WHERE username = ? AND visible = 1");

  $stmt->execute(array($username));
  return $stmt->fetch();
}

function getTeachers(){
  global $conn;
  $stmt = $conn->prepare("SELECT name, username FROM Person
  WHERE personType = 'Teacher' AND visible=1");

  $stmt->execute();
  return $stmt->fetchAll();
}
function isTeacherByEvaluation($academiccode,$cuName,$evalID){
    global $conn;
  $stmt = $conn->prepare("SELECT  Person.academiccode FROM Person,Evaluation,CurricularUnit,CurricularUnitOccurrence,Class
  WHERE  Person.academiccode = ? AND Person.personType = 'Teacher' AND Evaluation.evaluationID = ? AND  Evaluation.cuOccurrenceID = CurricularUnitOccurrence.cuOccurrenceID
   AND  CurricularUnitOccurrence.curricularunitid = curricularunit.curricularid AND CurricularUnit.name = ? AND Class.occurrenceID = CurricularUnitOccurrence.cuOccurrenceID AND 
   Class.teacherCode = Person.academiccode 
   AND Person.visible = 1 AND Evaluation.visible = 1 AND CurricularUnit.visible = 1 AND CurricularUnitOccurrence.visible = 1 AND Class.visible = 1;");

  $stmt->execute(array($academiccode,$evalID,$cuName));
  $return = $stmt->fetchAll();
  if($return !=false)
    return true;
  else
    return false;
}
?>
