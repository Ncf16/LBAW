<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');

$areas = getAreas();

if(!isset($_GET['unit'])){
	$_SESSION['error_messages'][] = 'unit not especified!';
	header("Location: " . $BASE_URL);
	exit;
}

$unit = getUnit($_GET['unit']);
if(!unit){
	$_SESSION['error_messages'][] = 'unit id not found!';
	header("Location: " . $BASE_URL);
	exit;
}

$fValues = array('unit_id' => $unit['curricularid'], 'unit_name' => $unit['name'], 'unit_area' => $unit['area'], 'unit_credits' => $unit['credits']);

$smarty->assign('FORM_VALUES', $fValues);
$smarty->assign('areas', $areas);
$smarty->display('curricularUnit/updateUnit.tpl');
?>