<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!$_POST['username'] || !$_POST['password']) {

    return false;    
    exit;
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  
  var_dump( password_verify("test",'$2y$10$ZUfhrl7zBNp2WYVM9cUt4e8rPnE9yC5U4YCuah8EdrElb7837Ix8O'));
  
  if (isLoginCorrect($username, $password)) {
    $_SESSION['username'] = $username;
    echo "true"; 
  } else {
    echo "false";  
  }
  
?>
