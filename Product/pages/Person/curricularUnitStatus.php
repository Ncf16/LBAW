<?php 
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/person.php');
include_once($BASE_DIR . 'database/course.php'); 
include_once($BASE_DIR . 'database/cuEnrollment.php'); 
include_once($BASE_DIR . 'database/courseEnrollment.php'); 
// get al the CUO of the student get the ones he has grades on and pick the highest grade
$_SESSION['username']=20162;
$_GET['username']=20162;

 
$studentID = getPersonIDByUserName($_GET['username']);
$getStudentCourse=getStudentCourse($studentID['academiccode']);

$smarty->assign('courseCode' ,$getStudentCourse['code']);
$smarty->assign('student',$studentID['academiccode']);
$smarty->display('person/curricularUnitStatus.tpl');
?>