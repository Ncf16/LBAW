<?php
  
  
  function isLoginCorrect($username, $password){
  global $conn;

  try{
  $query = 'SELECT * FROM PERSON WHERE username  ILIKE  ? ';//   AND password = ?";
  $stmt = $conn->prepare($query);
  $stmt->execute(array($username));
  $user = $stmt->fetch();

  if($stmt->fetch() != true){
    return false;
  }else{
    $result=password_verify($password,$user['password']);
  }
 
  // $result !== false means it found the user with the password
  if($result !== false){
    return true;
  }else{
    return false;
  }

  }catch(PDOException $e){
    echo $query . "<br>" . $e->getMessage();
  }catch(DatabaseException $e){
    echo "Unexpected Database Error: " . $e->getMessage();
    return false;
  }catch(Exception $e){
    echo "Unexpected Database Error: " . $e->getMessage();
    return false;
  }

}
?>
