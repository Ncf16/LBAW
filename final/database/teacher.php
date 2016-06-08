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
function getTeacherWithID($academiccode){
   global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE academiccode = ? AND persontype='Teacher'" );
    
    $stmt->execute(array($academiccode));
    return $stmt->fetch();
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

?>
