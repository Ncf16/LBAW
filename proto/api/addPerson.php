<?php
  include_once('../config/init.php');
  include_once('../lib/util.php');
  include_once($BASE_DIR . 'database/person.php');  
  

  // Name and password are required!
  if (!$_POST['name'] || !$_POST['password'] || !$_POST['nif'])  {
    echo "false";    
    exit;
  }

  $name = $_POST['name'];
  $password = $_POST['password'];
  $nif = $_POST['nif'];

  //TODO: use test_input($data) on these fields, to sanitize them!
  //TODO: validate fields

  $address = !$_POST['address'] ? "" : $_POST['address'];
  $nationality = !$_POST['nationality'] ? "" : $_POST['nationality'];
  $phone = !$_POST['phone'] ? "" : $_POST['phone'];
  $birth_date = !$_POST['birth_date'] ? "" : $_POST['birth_date'];
  $account_type = !$_POST['account_type'] ? "Student" : $_POST['account_type'];  
  
  $result = createPerson($name, $address, $nationality, $phone, $nif, $birth_date, $account_type, $password);
  
  if ($result === true){
    $username = getPersonUsernameByNIF($name, $address, $nationality, $phone, $birth_date, $account_type, $password);
    echo $username;
  }else{
    echo "false";
  }
  

?>