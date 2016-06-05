<?php
  include_once('../config/init.php');
  include_once($BASE_DIR . 'database/person.php');
include_once($BASE_DIR . 'database/courseEnrollment.php');

  if (!$_POST['username'] || !$_POST['password']) {
    echo "false";    
    exit;
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (isLoginCorrect($username, $password)) {
    $user = getPersonInfoByUser($username);
    $userCourse = getStudentCourse($user['academiccode'])['code'];
    $_SESSION['username'] = $username;
    $_SESSION['account_type'] = $user['persontype'];
    $_SESSION['userID'] = $user['academiccode'];
    $_SESSION['student_course'] = $userCourse;
    echo "true"; 
  } else {
    echo "false";  
  }
  
  
?>
