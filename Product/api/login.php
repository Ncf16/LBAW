<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!$_POST['username'] || !$_POST['password']) {
    //$_SESSION['error_messages'][] = 'Invalid login';

    if(isset($_POST['username']))
      echo "true";

    else echo $_POST['username'];
    exit;
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if (isLoginCorrect($username, $password)) {
    $_SESSION['username'] = $username;
    //$_SESSION['success_messages'][] = 'Login successful'; 
    echo "true"; 
  } else {
    //$_SESSION['error_messages'][] = 'Login failed';
    echo "false";  
  }
  
?>
