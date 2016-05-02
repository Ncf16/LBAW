<?php
  include_once('../config/init.php');
  include_once($BASE_DIR . 'database/person.php');  
  

  if (!$_POST['username'] || !$_POST['password']) {
    echo "false";    
    exit;
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (isLoginCorrect($username, $password)) {
    $user = getPersonInfoUser($username);
    $_SESSION['username'] = $username;
    $_SESSION['account_type'] = $user['persontype'];
    $_SESSION['userID'] = $user['academiccode'];
    echo "true"; 
  } else {
    echo "false";  
  }
  
  
?>
