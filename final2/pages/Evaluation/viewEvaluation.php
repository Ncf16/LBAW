<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/class.php');
include_once($BASE_DIR . 'database/evaluation.php');

$hasPermission = false;
if(!$_GET['evaluationID']){
  $_SESSION['error_messages'][] = 'evaluation not found!';
  header("Location: " . $BASE_URL . "index.php");
  exit;
}

$account_type = $_SESSION['account_type'];
if(!$account_type || !($account_type == 'Admin' || 
  ($account_type == 'Teacher' && hasTeacherEvaluationAccess($_SESSION['userID'],$_GET['evaluationID'])) ||
  ($account_type == 'Student' && hasStudentEvaluationAccess($_SESSION['userID'],$_GET['evaluationID'])) )){
  $_SESSION['error_messages'][] = 'Unauthorized Access';
    header("Location: " . $BASE_URL . "index.php");
    exit;
}

$hasPermission= $account_type == 'Admin' ||  ($account_type == 'Teacher' && hasTeacherEvaluationAccess($_SESSION['userID'],$_GET['evaluationID']));

$type = getEvaluationType($_GET['evaluationID']);

if(!$type){
  $_SESSION['error_messages'][] = 'evaluation not found!';
  header("Location: " . $BASE_URL . "index.php");
  exit;
}

$evaluation = getEvaluationWithType($_GET['evaluationID'],$type['evaluationtype']);
if(!$evaluation){
  $_SESSION['error_messages'][] = 'evaluation not found!';
  header("Location: " . $BASE_URL . "index.php");
  exit;
}

$evaluation['calendaryear'] = $evaluation['calendaryear'] . '/' . ($evaluation['calendaryear'] + 1);
$smarty->assign('evaluation',$evaluation);
$smarty->assign('permission',$hasPermission);
$smarty->assign('accountType',$account_type);
$smarty->display('evaluation/viewEvaluation.tpl');

function getEvaluationWithType($evaluation,$type){

  switch($type){
    case 'Test':
    return getTest($evaluation);
    case 'Exam':
    return getExam($evaluation);
    case 'GroupWork':
    return getGroupWork($evaluation);
  }
}

?>