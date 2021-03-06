<?php
  include_once($BASE_DIR . '/config/init.php');
  require_once($BASE_DIR . "lib/password.php");
/*
CREATE TABLE IF NOT EXISTS Person(
academicCode SERIAL PRIMARY KEY,
personType PersonType,
name VARCHAR(120) NOT NULL,
username VARCHAR(15),
address VARCHAR(256),
birthdate DATE,
nationality VARCHAR(30),
nif CHAR(9) UNIQUE NOT NULL,
password VARCHAR(256) NOT NULL,
phoneNumber VARCHAR(12),
imageURL VARCHAR(256),
visible INTEGER DEFAULT 1,
tsv tsvector
);
*/
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
    return false;
  }catch(DatabaseException $e){
    //echo "Unexpected Database Error: " . $e->getMessage();
    return false;
  }catch(Exception $e){
    //echo "Unexpected Database Error: " . $e->getMessage();
    return false;
  }

}

function createPerson($name, $address, $nationality, $phone, $nif, $birth, $type, $password){
  global $conn;


  try{
    /*
    $stmt = $conn->prepare("SELECT * FROM person WHERE 
                              lower(nif) = lower(?)");
    $stmt->execute(array($nif));
  
  
    if($stmt->fetch() !== false){
      return "A person with the data provided already exists.";
    }
    */
    
    $query = 'INSERT INTO Person (name,address,nationality,phoneNumber,nif,birthdate,personType,password) VALUES (?,?,?,?,?,?,?,?);';    

    $stmt = $conn->prepare($query);
    $stmt->execute(array($name, $address, $nationality, $phone, $nif, $birth, $type, password_hash($password,PASSWORD_DEFAULT)));
    
    return true;

  }catch(PDOException $e){
    //echo $query . "<br>" . $e->getMessage();
    if($e->getCode() == 23505){
      return "User $name with NIF $nif already exists.";
    }else{
      return "ERROR REGISTERING (PDO Error).";
    }
  }catch(DatabaseException $e){
    if($e->getCode() == 23505)
      return "User with NIF $nif already exists.";
    else{
    //echo "Unexpected Database Error: " . $e->getMessage();
     return "ERROR REGISTERING (DB) USER WITH NIF $nif.";
   }
  }catch(Exception $e){
    //echo "Unexpected Database Error: " . $e->getMessage();
    return "ERROR REGISTERING (Other).";
  }
}

function getPersonUsername($name, $address, $nationality, $phone, $birth, $type, $password){
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM person WHERE 
                              lower(name) = lower(?)
                          AND lower(address) = lower(?)
                          AND lower(nationality) = lower (?)
                          AND lower(phonenumber) = lower(?)
                          AND birthdate = ?
                          AND persontype = ?");
    $stmt->execute(array($name, $address, $nationality, $phone, $birth, $type));
  
    $person = $stmt->fetch();

    if($person !== false){
      return $person['username'];
    }
}
 
function getPersonUsernameByNIF($nif){
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM person WHERE 
                              lower(nif) = lower(?)");
    $stmt->execute(array($nif));
  
    $person = $stmt->fetch();

    if($person !== false){
      return $person['username'];
    }
}


  function getPersonInfoByUser($username){
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE username = ?");
    
    $stmt->execute(array($username));
    return $stmt->fetch();
  }

  function getPersonInfoByID($id){
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE academiccode = ?");
    
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getPersonType($username){
    global $conn;
    $stmt = $conn->prepare("SELECT persontype
                            FROM Person
                            WHERE username = ?");
    
    $stmt->execute(array($username));
    return $stmt->fetch();
  }

function getAllPeople(){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                            FROM Person
                            ORDER BY name" );
    
  $stmt->execute();
  return $stmt->fetchAll();
}

function getPeople($peoplePerPage, $page){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                            FROM Person
                            ORDER BY name
                            LIMIT ? OFFSET ?" );
    
  $stmt->execute(array($peoplePerPage,  (($page-1) * $peoplePerPage)));
  return $stmt->fetchAll();
}

function countPeople(){
  global $conn;
  $stmt = $conn->prepare("SELECT Count(academiccode) as nrpeople
                            FROM Person
                            WHERE visible = 1");
    
  $stmt->execute();
  return $stmt->fetch();
}
function getPersonIDByUserName($username){
  global $conn;
  $stmt = $conn->prepare("SELECT academiccode 
                            FROM Person
                            WHERE username = ? AND  visible = 1");
    
  $stmt->execute(array($username));
  return $stmt->fetch();
}

function checkAcademicCodeInArray($array,$valueToCheck){
     // var_dump($valueToCheck);
  foreach ($array as $value) {
    if($value.academiccode==$valueToCheck){
      //var_dump($value.academiccode);
      return true;
    }
  }
  return false;
}

function  checkUserType($type,$id){
  global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE academiccode = ? AND persontype= ? " );
    
    $stmt->execute(array($id,$type));
    return $stmt->fetch();
}
?>
