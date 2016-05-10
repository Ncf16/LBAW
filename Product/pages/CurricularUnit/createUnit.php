<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');

$account_type = $_SESSION['account_type'];

if(!$account_type && $account_type != 'Admin' && $account_type != 'Teacher'){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}

$areas = getAreas();

$smarty->assign('areas', $areas);
$smarty->display('curricularUnit/createUnit.tpl');
?>