<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');
include_once($BASE_DIR . 'database/area.php');

$account_type = $_SESSION['account_type'];

if(!$account_type && $account_type != 'Admin' && $account_type != 'Teacher'){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}

$areas = getAreas();

if(!isset($_GET['unit'])){
	$_SESSION['error_messages'][] = 'unit not specified!';
	header("Location: " . $BASE_URL . "index.php");
	exit;
}

$unit = getUnit($_GET['unit']);
if(!$unit){
	$_SESSION['error_messages'][] = 'unit not found!';
	header("Location: " . $BASE_URL . "index.php");
	exit;
}

$formValues = array('unit_id' => $unit['curricularid'], 'unit_name' => $unit['name'], 'unit_area' => $unit['area'], 'unit_credits' => $unit['credits']);

$smarty->assign('FORM_VALUES', $formValues);
$smarty->assign('areas', $areas);
$smarty->display('curricularUnit/updateUnit.tpl');
?>