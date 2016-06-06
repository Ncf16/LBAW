<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');
include_once($BASE_DIR . 'database/course.php');
include_once($BASE_DIR . 'database/calendar.php');

$account_type = $_SESSION['account_type'];

if(!$account_type || !($account_type == 'Admin' || $account_type == 'Teacher')){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}

$courses = getCourses();
$years = getYears();

foreach ($years as &$year)
	$year['year'] = $year['year'] . '/' . ($year['year'] + 1);
unset($year);

$smarty->assign('courses', $courses);
$smarty->assign('years', $years);
$smarty->display('curricularUnit/unitOccurrences.tpl');
?>