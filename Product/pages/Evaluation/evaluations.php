<?php
include_once('../../config/init.php');

$account_type = $_SESSION['account_type'];

if($_GET['unit']){
  include_once($BASE_DIR . 'database/unitOccurrence.php');
  include_once($BASE_DIR . 'database/evaluation.php');

  //admin //student in uc  //teacher that teaches this uc //regent //courseDirector
  if(!$account_type || !($account_type == 'Admin' || 
    ($account_type == 'Teacher' && hasTeacherUCOAccess($_SESSION['userID'],$uco)) ||
    ($account_type == 'Student' && hasStudentUCOAccess($_SESSION['userID'],$uco)) )){
        $_SESSION['error_messages'][] = 'Unauthorized Access';
        header("Location: " . $BASE_URL . "index.php");
        exit;
  }

  $unit = getUCO($_GET['unit']);
  $unit['year'] = $unit['year'] . '/' . ($unit['year'] + 1);
  $evaluations = getUCOEvaluations($_GET['unit']);
  
  $smarty->assign('evaluations',$evaluations);
  $smarty->assign('unit',$unit);
}
else if($_GET['student']){
  include_once($BASE_DIR . 'database/person.php');
  include_once($BASE_DIR . 'database/evaluation.php');

  if(!$account_type || !($account_type == 'Admin' || $account_type == 'Student')){
    $_SESSION['error_messages'][] = 'Unauthorized Access';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }

  $student = getPersonInfoByID($_GET['student']);
  $evaluations = getStudentEvaluations($_GET['student']);

  $smarty->assign('evaluations',$evaluations);
  $smarty->assign('student',$student);
}
else{
  $_SESSION['error_messages'][] = 'Cannot retrieve the page';
  header("Location: " . $BASE_URL . "index.php");
  exit;
}

$smarty->display('evaluation/evaluations.tpl');
?>
 