  <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/teacher.php'); 
//Not ready to be used
  
 
    
  if (isset($_GET['cuoID'])) {
      $evaluations=getEvaluationByCUO($_GET['cuoID']);
    }
    else if (isset($_GET['stuentCode'])) {
      $evaluations=getEvaluationByStudentCode($_GET['stuentCode']);
    } else if (isset($_GET['studentUsername'])) {
      $evaluations=getEvaluationByStudentCode( getIDFrom($_GET['studentUsername']));
    }else if (isset($_GET['teacherCode'])) {
      $evaluations=getEvaluationByStudentCode( getIDFrom($_GET['teacherCode']));
    }
    else{
    header("Location: " . $BASE_URL . "index.php");
    exit;
    }
 
  $smarty->assign('evaluations',$evaluations);
  $smarty->display('evaluation/listEvaluatons.tpl');
 ?>
 