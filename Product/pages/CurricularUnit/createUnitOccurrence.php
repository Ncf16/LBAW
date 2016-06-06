<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/course.php');
include_once($BASE_DIR . 'database/syllabus.php');
include_once($BASE_DIR . 'database/calendar.php');
include_once($BASE_DIR . 'database/teacher.php');

$account_type = $_SESSION['account_type'];

if(!$account_type || !($account_type == 'Admin' || $account_type == 'Teacher')){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}

$languages = array();
$languages['PT']='Portuguese';
$languages['EN']='English';
$languages['ES']='Spanish';

if($_GET['syllabus']){
    $smarty->assign('syllabus', $_GET['syllabus']);

    $myVar = $smarty->getTemplateVars('FORM_VALUES');
    
    if($_GET['year'] && $_GET['course']){
    	$myVar['unit_year'] = $_GET['year'] . '/' . ($_GET['year'] + 1);
    	$myVar['unit_course'] = getCourseNameByID($_GET['course'])['name'];
    }
    else{
    	$syllabus = getCourseNameYear($_GET['syllabus']);
    	$myVar['unit_year'] = $syllabus['calendaryear'] . '/' . ($syllabus['calendaryear'] + 1);
    	$myVar['unit_course'] = $syllabus['name'];
    }

	$smarty->assign('FORM_VALUES', $myVar);
}

$courses = getCourses();
$years = getYears();
$teachers = getTeachers();
$units = getUnitsName();

foreach ($years as &$year)
	$year['year'] = $year['year'] . '/' . ($year['year'] + 1);
unset($year);

foreach ($teachers as &$teacher)
	$teacher['name'] = $teacher['name'] . ": " . $teacher['username'];
unset($teacher);

$smarty->assign('courses', $courses);
$smarty->assign('years', $years);
$smarty->assign('teachers', $teachers);
$smarty->assign('units', $units);
$smarty->assign('languages',$languages);
$smarty->display('curricularUnit/createUnitOccurrence.tpl');
?>