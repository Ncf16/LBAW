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

  //return $address;
  try{

    $stmt = $conn->prepare("SELECT * FROM person WHERE 
                              lower(name) = lower(?)
                          AND lower(address) = lower(?)
                          AND lower(nationality) = lower (?)
                          AND lower(phonenumber) = lower(?)
                          AND birthdate = ?
                          AND persontype = ?");
    $stmt->execute(array($name, $address, $nationality, $phone, $birth, $type));
  
  
    if($stmt->fetch() !== false){
      return "A person with the data provided already exists.";
    }

    
    $query = 'INSERT INTO Person (name,address,nationality,phoneNumber,nif,birthdate,personType,password) VALUES (?,?,?,?,?,?,?,?);';    

    $stmt = $conn->prepare($query);
    $stmt->execute(array($name, $address, $nationality, $phone, $nif, $birth, $type, password_hash($password,PASSWORD_DEFAULT)));
    

    return true;

  }catch(PDOException $e){
    echo $query . "<br>" . $e->getMessage();
    return "ERROR REGISTERING (PDO).";
  }catch(DatabaseException $e){
    //echo "Unexpected Database Error: " . $e->getMessage();
     return "ERROR REGISTERING (DB).";
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

  function getPersonInfoUser($username){
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE username = ?");
    
    $stmt->execute(array($username));
    return $stmt->fetch();
  }

  function getPersonInfoID($id){
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

function getTeacherAcademicCodes(){
     global $conn;
    $stmt = $conn->prepare("SELECT academiccode
                            FROM Person
                            WHERE   persontype='Teacher'" );
    
    $stmt->execute();
    return $stmt->fetchAll();
}
  function getAllTeachers(){
     global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE   persontype='Teacher'" );
    
    $stmt->execute();
    return $stmt->fetchAll();
}

function getPeople(){
  global $conn;
  $stmt = $conn->prepare("SELECT *
                            FROM Person" );
    
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
function checkAcademicCodeInArray($array,$valueToCheck){
      var_dump($valueToCheck);
  foreach ($array as $value) {
    if($value.academiccode==$valueToCheck){
      var_dump($value.academiccode);
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
