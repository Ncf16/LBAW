<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/course.php');
include_once($BASE_DIR . 'database/calendar.php');
include_once($BASE_DIR . 'database/teacher.php');

$account_type = $_SESSION['account_type'];

if(!$account_type && $account_type != 'Admin' && $account_type != 'Teacher'){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}

if(!isset($_GET['uc'])){
	$_SESSION['error_messages'][] = 'unit occurrence not specified!';
	header("Location: " . $BASE_URL . "index.php");
	exit;
}

$unit = getUCO($_GET['uc']);
if(!$unit){
	$_SESSION['error_messages'][] = 'unit occurrence id not found!';
	header("Location: " . $BASE_URL . "index.php");
	exit;
}

$languages = array();
$languages['PT']='Portuguese';
$languages['EN']='English';
$languages['ES']='Spanish';

$courses = getCourses();
$years = getYears();
$teachers = getTeachers();
$units = getUnitsName();

foreach ($years as &$year)
	$year['year'] = $year['year'] . '/' . ($year[year] + 1);
unset($year);

foreach ($teachers as &$teacher)
	$teacher['name'] = $teacher['name'] . ": " . $teacher['username'];
unset($teacher);

$unit['year'] = $unit['year'] . '/' . ($unit[year] + 1);
$unit['teacher'] = $unit['regentname'] . ': ' . $unit['regent'];
$unit['language'] = $languages[$unit['language']];

$fValues = array('unit_id' => $_GET['uc'], 'unit_name' => $unit['name'], 'unit_course' => $unit['course'], 'unit_year' => $unit['year'],
	'unit_curricularyear' => $unit['curricularyear'], 'unit_curricularsemester' => $unit['curricularsemester'],
	'unit_teacher' => $unit['teacher'], 'unit_language' => $unit['language'], 'unit_links' => $unit['externalpage'], 'unit_competences' => $unit['competences'],
	'unit_requirements' => $unit['requirements'],'unit_programme' => $unit['programme'], 'unit_evaluations' => $unit['evaluation'], 'unit_bibliography' => $unit['bibliography']);

$smarty->assign('FORM_VALUES', $fValues);
$smarty->assign('courses', $courses);
$smarty->assign('years', $years);
$smarty->assign('teachers', $teachers);
$smarty->assign('units', $units);
$smarty->assign('languages',$languages);
$smarty->display('curricularUnit/updateUnitOccurrence.tpl');
?>