<?php
  include_once($BASE_DIR . '/config/init.php');
  require_once($BASE_DIR . "lib/password.php");

  function isLoginCorrect($username, $password){
  global $conn;

  try{
    $query = 'SELECT * FROM PERSON WHERE LOWER(username) = LOWER(?) ';//   AND password = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute(array($username));
    $user = $stmt->fetch();
 
    $result = password_verify($password, $user['password']);
  
  // $result !== false means it found the user with the password
  if($result !== false){
    return true;  //$user['username'];
  }else{
    return false;
  }

  }catch(PDOException $e){
    //echo $query . "<br>" . $e->getMessage();
  }catch(DatabaseException $e){
    //echo "Unexpected Database Error: " . $e->getMessage();
    return false;
  }catch(Exception $e){
    //echo "Unexpected Database Error: " . $e->getMessage();
    return false;
  }

}

  function getStudentInfo($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT Person.*, Course.abbreviation AS courseName, CourseEnrollment.curricularYear AS currentYear, EXTRACT(YEAR FROM CourseEnrollment.startYear) AS startYear, CourseEnrollment.finishYear AS finishYear, CourseEnrollment.courseGrade As courseGrade
            FROM  Course, CourseEnrollment, Person
            WHERE Course.code = CourseEnrollment.courseID
            AND CourseEnrollment.studentCode = Person.academiccode
            AND Person.username = ?");
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getPersonInfo($id){
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE username = ?");
    
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getPersonType($id){
    global $conn;
    $stmt = $conn->prepare("SELECT persontype
                            FROM Person
                            WHERE username = ?");
    
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

?>
