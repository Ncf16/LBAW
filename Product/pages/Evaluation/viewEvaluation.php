<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/evaluation.php');


if(!$_GET['evaluationID']){
  $_SESSION['error_messages'][] = 'evaluation not found!';
  header("Location: " . $BASE_URL . "index.php");
  exit;
}

else{

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
   $smarty->display('evaluation/viewEvaluation.tpl');
}
?>

<?php
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