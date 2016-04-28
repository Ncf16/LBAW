<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  echo "kk";

  if (!$_POST['username'] || !$_POST['password']) {

    echo "false";    
    exit;
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $message = isLoginCorrect($username, $password);
  echo "hi";
  
  if (isLoginCorrect($username, $password)) {
    $_SESSION['username'] = $username;
    echo "true"; 
  } else {
    echo "false";  
  }
  
?>
