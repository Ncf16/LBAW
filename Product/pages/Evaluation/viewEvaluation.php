<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/evaluation.php');
include_once($BASE_DIR . 'database/teacher.php');
include_once($BASE_DIR . 'database/grade.php');

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

  $evaluation = getEvaluation($_GET['evaluationID'],$type['evaluationtype']);
  if(!$evaluation){
    $_SESSION['error_messages'][] = 'evaluation not found!';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }
  // Se não for admin nem aluno que fez essa evaluation nem professor dessa CU
  if($_SESSION['account_type'] !== 'Admin' && !getGrade($_SESSION['userID'],$_GET['evaluationID']) && !isTeacherByEvaluation($_SESSION['userID'],$evaluation['name'],$_GET['evaluationID'])){
      $_SESSION['error_messages'][] = 'invalid permission';
      header("Location: " . $BASE_URL . "index.php");
      exit;
  }

   $evaluation['calendaryear'] = $evaluation['calendaryear'] . '/' . ($evaluation['calendaryear'] + 1);
   $smarty->assign('evaluation',$evaluation);
   $smarty->display('evaluation/viewEvaluation.tpl');
}
?>

<?php
function getEvaluation($evaluation,$type){

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