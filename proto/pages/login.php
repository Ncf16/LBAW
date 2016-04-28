<?php 
include_once('../config/init.php');

if ($_SESSION['username']){  //ALREADY LOGGED IN... CAN'T ACCESS LOGIN PAGE
	header("Location: " . $BASE_DIR . "index.php");
	exit;
}

$smarty->display('person/login.tpl');
?>
   