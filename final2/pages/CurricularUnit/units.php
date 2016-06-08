<?php
include_once('../../config/init.php');

$account_type = $_SESSION['account_type'];

if(!$account_type || !($account_type == 'Admin' || $account_type == 'Teacher')){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}

$smarty->display('curricularUnit/units.tpl');
?>