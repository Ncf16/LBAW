<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/class.php');
include_once($BASE_DIR . 'database/room.php');
include_once($BASE_DIR . 'database/teacher.php');
include_once($BASE_DIR . 'database/unit.php');
include_once($BASE_DIR . 'database/calendar.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');

$account_type = $_SESSION['account_type'];

/*
if(!$account_type && $account_type != 'Admin' && $account_type != 'Teacher'){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}
*/

$uco = $_GET['unit'];
if($uco){
    $smarty->assign('uco', $uco);
    $ucoInfo = getUCO($uco);
    $formValues = array('class_unit' => $ucoInfo['name'],'class_unit_year' => $ucoInfo['year'] . '/' . ($ucoInfo['year'] + 1));
    $smarty->assign('FORM_VALUES', $formValues);
}

$rooms = getRooms();
$teachers = getTeachers();
$units = getUnitsName();
$years = getYears();

foreach ($teachers as &$teacher)
	$teacher['name'] = $teacher['name'] . ": " . $teacher['username'];
unset($teacher);

foreach ($years as &$year)
	$year['year'] = $year['year'] . '/' . ($year['year'] + 1);
unset($year);

$smarty->assign('years', $years);
$smarty->assign('units', $units);
$smarty->assign('teachers', $teachers);
$smarty->assign('rooms', $rooms);
$smarty->display('classes/createClass.tpl');
?>