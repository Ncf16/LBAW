<?php
include_once('../config/init.php');
include_once('../lib/util.php');
include_once($BASE_DIR . 'database/person.php');  

if (!$_POST['people']){
 echo "false";
 exit;
}

$people = $_POST['people'];
$errors = array();

foreach($people as $person){

    // Name and password are required!
  if (!$person['name'] || !$person['password'] || !$person['nif'])  {
    echo "false";    
    exit;
  }
  

  $name = $person['name'];
  $password = $person['password'];
  $nif = $person['nif'];

  $address = !$person['address'] ? "" : $person['address'];
  $nationality = !$person['nationality'] ? "" : $person['nationality'];
  $phone = !$person['phone'] ? "" : $person['phone'];
  $birth_date = !$person['birth'] ? "" : $person['birth'];
  $account_type = !$person['account'] ? "Student" : $person['account'];  
  
  $result = createPerson($name, $address, $nationality, $phone, $nif, $birth_date, $account_type, $password);
  
  if ($result === true){
    // Cool, added the person
  }else{
    array_push($errors, $result);
  }

}

echo json_encode($errors);







?>