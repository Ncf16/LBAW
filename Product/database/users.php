<?php
  include_once('../config/init.php');
  require_once($BASE_DIR . "lib/password.php");

  function isLoginCorrect($username, $password){
  global $conn;

  try{
<<<<<<< HEAD
  $query = 'SELECT * FROM PERSON WHERE LOWER(username) = LOWER(?) ';//   AND password = ?";
=======
  $query = 'SELECT * FROM PERSON WHERE username  ILIKE  ? ';//   AND password = ?";
>>>>>>> 425b50ee1a5566ecdf2f4d9389bca0a04a8b3faa
  $stmt = $conn->prepare($query);
  $stmt->execute(array($username));
  $user = $stmt->fetch();
 
  $result = password_verify($password, $user['password']);
  
  // $result !== false means it found the user with the password
  if($result !== false){
    return "2";//$user['username'];
  }else{
    return "3";
  }

  }catch(PDOException $e){
    echo $query . "<br>" . $e->getMessage();
  }catch(DatabaseException $e){
    echo "Unexpected Database Error: " . $e->getMessage();
    return false;
  }catch(Exception $e){
    echo "Unexpected Database Error: " . $e->getMessage();
    return false
  }

}
?>
