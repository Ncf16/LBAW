<?php
  include_once('../config/init.php');
  include_once('../lib/util.php');
  include_once($BASE_DIR . 'database/person.php');  
  

  // Name and password are required!
  if (!$_POST['name'] || !$_POST['password']) {
    echo "false";    
    exit;
  }

  $name = $_POST['name'];
  $password = $_POST['password'];

  //TODO: use test_input($data) on these fields, to sanitize them!
  //TODO: validate fields

  $address = !$_POST['address'] ? "" : $_POST['address'];
  $nationality = !$_POST['nationality'] ? "" : $_POST['nationality'];
  $phone = !$_POST['phone'] ? "" : $_POST['phone'];
  $nif = !$_POST['nif'] ?   NULL : $_POST['nif']; // NIF HAS TO BE NULL, DUE TO UNIQUE CONSTRAINT
  $birth_date = !$_POST['birth_date'] ? "" : $_POST['birth_date'];
  $account_type = !$_POST['account_type'] ? "" : $_POST['account_type'];  
  
  $result = createPerson($name, $address, $nationality, $phone, $nif, $birth_date, $account_type, $password);
  
  if ($result === true){
    $username = getPersonUsername($name, $address, $nationality, $phone, $birth_date, $account_type, $password);
    echo $username;
  }else{
    echo "false";
  }
  

?>