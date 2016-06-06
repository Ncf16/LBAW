 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 

  $course = getCourseInfoView($_GET['course']);

  $syllabusYears = getSyllabusYears($_GET['course']);
  $syllabusYears['nrYears'] = sizeof($syllabusYears);

	if( $_SESSION['account_type'] === 'Admin' || isCourseDirector($_GET['course'], $_SESSION['userID'])){
		 $canAddCU=true;
	}
	else
	 $canAddCU=false;
  
  $smarty->assign('canAddCU', $canAddCU);
  $smarty->assign('course', $course);
  $smarty->assign('syllabusYears', $syllabusYears);
  $smarty->display('course/coursePage.tpl');
?>
 
