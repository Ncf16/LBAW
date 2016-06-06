<?php
include_once('../../config/init.php');

$account_type = $_SESSION['account_type'];

if($_GET['uc']){

  include_once($BASE_DIR . 'database/unitOccurrence.php');
  $uc = getUCO($_GET['uc']);

   if(!$uc){
    $_SESSION['error_messages'][] = 'unit not found!';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }

  if(!$account_type || !($account_type == 'Admin' || 
    ($account_type == 'Teacher' && hasTeacherUCOAccess($_SESSION['userID'],$_GET['uc'])) ||
    ($account_type == 'Student' && hasStudentUCOAccess($_SESSION['userID'],$_GET['uc'])) )){
        $_SESSION['error_messages'][] = 'Unauthorized Access';
        header("Location: " . $BASE_URL . "index.php");
        exit;
  }

  $classes['unitInformation'] = $uc['name'] . ' : ' .$uc['year'] . '/' . ($uc['year'] + 1);
  $classes['unit'] = $_GET['uc'];
  $smarty->assign('classes',$classes);
}
else if($_GET['teacher']){

  include_once($BASE_DIR . 'database/person.php');
	$teacher = getPersonInfoByID($_GET['teacher']);

	if(!$account_type || !($account_type == 'Admin' || $account_type == 'Teacher')){
		  $_SESSION['error_messages'][] = 'teacher not found!';
	    header("Location: " . $BASE_URL . "index.php");
	    exit;
	}

	$classes['teacherInformation'] = $teacher['name'];
	$smarty->assign('classes',$classes);
}
else{
  if(!$account_type || $account_type != 'Admin'){
    $_SESSION['error_messages'][] = 'Unauthorized Access';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }
}

$smarty->assign('accountType',$accountType);
$smarty->display('classes/classes.tpl');
?>