<?php 
include_once('../config/init.php');

if ($_SESSION['username']){  //ALREADY LOGGED IN... CAN'T ACCESS LOGIN PAGE
	header("Location: " . $_SERVER['HTTP_REFERER']);
	exit;
}

$smarty->display('person/login.tpl');
?>
   