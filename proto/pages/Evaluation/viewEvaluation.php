  <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/teacher.php'); 
//Not ready to be used
  
 
    
  if (isset($_GET['evaluationID'])) {
    $evaluation = getEvaluationInfo($_GET['evaluationID'])
    } 
     else{
    header("Location: " . $BASE_URL . "index.php");
    exit;
    }
     
 
  $smarty->assign('evaluation',$evaluation);
  $smarty->display('evaluation/viewEvaluaton.tpl');
 ?>
 