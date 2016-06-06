<?php
include_once($BASE_DIR . '/config/init.php');
require_once($BASE_DIR . "lib/password.php");

function isLoginCorrect($username, $password)
{
    global $conn;

    try {
        $query = 'SELECT * FROM PERSON WHERE LOWER(username) = LOWER(?) ';//   AND password = ?";

        $stmt = $conn->prepare($query);
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        $result = password_verify($password, $user['password']);

        // $result !== false means it found the user with the password
        if ($result !== false) {
            return true;  //$user['username'];
        } else {
            return false;
        }

    } catch (PDOException $e) {
        //echo $query . "<br>" . $e->getMessage();
        return false;
    } catch (DatabaseException $e) {
        //echo "Unexpected Database Error: " . $e->getMessage();
        return false;
    } catch (Exception $e) {
        //echo "Unexpected Database Error: " . $e->getMessage();
        return false;
    }

}

function createPerson($name, $address, $nationality, $phone, $nif, $birth, $type, $password)
{
    global $conn;


    try {
        /*
        $stmt = $conn->prepare("SELECT * FROM person WHERE
                                  lower(nif) = lower(?)");
        $stmt->execute(array($nif));


        if($stmt->fetch() !== false){
          return "A person with the data provided already exists.";
        }
        */

        $query = 'INSERT INTO Person (name,address,nationality,phoneNumber,nif,birthdate,personType,password) VALUES (?,?,?,?,?,?,?,?) 
                  RETURNING username;';

        $stmt = $conn->prepare($query);
        $stmt->execute(array($name, $address, $nationality, $phone, $nif, $birth, $type, password_hash($password, PASSWORD_DEFAULT)));

        $result = $stmt->fetch();
        return $result;
    } catch (PDOException $e) {
        //echo $query . "<br>" . $e->getMessage();
        if ($e->getCode() == 23505) {
            return "User $name with NIF $nif already exists.";
        } else {
            return $e->getMessage();
        }
    } catch (DatabaseException $e) {
        if ($e->getCode() == 23505)
            return "User with NIF $nif already exists.";
        else {
            //echo "Unexpected Database Error: " . $e->getMessage();
            return "ERROR REGISTERING (DB) USER WITH NIF $nif.";
        }
    } catch (Exception $e) {
        //echo "Unexpected Database Error: " . $e->getMessage();
        return "ERROR REGISTERING (Other).";
    }
}

function getPersonUsername($name, $address, $nationality, $phone, $birth, $type, $password)
{
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

    if ($person !== false) {
        return $person['username'];
    }
}

function getPersonUsernameByNIF($nif)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM person WHERE 
                              lower(nif) = lower(?)");
    $stmt->execute(array($nif));

    $person = $stmt->fetch();

    if ($person !== false) {
        return $person['username'];
    }
}

function createUpdateQuery($arrayValues,$id,$idName){
  global $conn;
  $values=array();
  $query="UPDATE Person SET ";

  foreach ($arrayValues as $key => $value) {

    if(!empty ($value)){
     $query.=" ".$key." = ?, ";
     array_push($values,$value);
     }
  }
  $query=substr($query, 0, -2);
  $query.=" WHERE ".$idName." =  ? RETURNING ".$idName." ;";

  array_push($values, $id);
  $stmt = $conn->prepare($query);
  try{
    $stmt->execute($values);
  }catch (Exception $e)  {
   return false;
  }
  $res= $stmt->fetch();
  if($res!==false)
    return true;
  else
    return false;
 }
 
function getPersonInfoByUser($username)
{
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE username = ?");

    $stmt->execute(array($username));
    return $stmt->fetch();
}

function getPersonInfoByID($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE academiccode = ?");

    $stmt->execute(array($id));
    return $stmt->fetch();
}

function getPersonType($username)
{
    global $conn;
    $stmt = $conn->prepare("SELECT persontype
                            FROM Person
                            WHERE username = ?");

    $stmt->execute(array($username));
    return $stmt->fetch();
}

function getAllPeople()
{
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            ORDER BY name");

    $stmt->execute();
    return $stmt->fetchAll();
}

function getPeople($peoplePerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            ORDER BY name
                            LIMIT ? OFFSET ?");

    $stmt->execute(array($peoplePerPage, (($page - 1) * $peoplePerPage)));
    return $stmt->fetchAll();
}


function searchPeople($query, $peoplePerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM
                            (SELECT *, tsv @@ to_tsquery(?) as found
                            From Person
                            WHERE visible = 1
                            ) as tsv_search
                            WHERE found = true
                            ORDER BY name
                            LIMIT ? OFFSET ?");

    $stmt->execute(array($query, $peoplePerPage, (($page - 1) * $peoplePerPage)));
    return $stmt->fetchAll();
}

function countPeople()
{
    global $conn;
    $stmt = $conn->prepare("SELECT Count(academiccode) as nrpeople
                            FROM Person
                            WHERE visible = 1");

    $stmt->execute();
    return $stmt->fetch();
}

function countPeopleQuery($query)
{

    if ($query)

        global $conn;
    $stmt = $conn->prepare("SELECT Count(academiccode) as nrpeople 
                          FROM 
                            (SELECT academiccode, tsv @@ to_tsquery(?) as found
                            From Person
                            WHERE visible = 1
                            ) as tsv_search
                            WHERE found = true");

    $stmt->execute(array($query));
    return $stmt->fetch();
}

function getPersonIDByUserName($username)
{
    global $conn;
    $stmt = $conn->prepare("SELECT academiccode 
                            FROM Person
                            WHERE username = ? AND  visible = 1");

    $stmt->execute(array($username));
    return $stmt->fetch();
}

function checkAcademicCodeInArray($array, $valueToCheck)
{
    // var_dump($valueToCheck);
    foreach ($array as $value) {
        if ($value . academiccode == $valueToCheck) {
            //var_dump($value.academiccode);
            return true;
        }
    }
    return false;
}

function checkUserType($type, $id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM Person
                            WHERE academiccode = ? AND persontype= ? ");

    $stmt->execute(array($id, $type));
    return $stmt->fetch();
}

?>
