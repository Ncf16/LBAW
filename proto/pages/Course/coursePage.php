 
 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 

  $course = getCourseInfoView($_GET['course']);

  $syllabusYears = getSyllabusYears($_GET['course']);
  $syllabusYears['nrYears'] = sizeof($syllabusYears);

  //var_dump($syllabusYears);

  $smarty->assign('course', $course);
  $smarty->assign('syllabusYears', $syllabusYears);
  $smarty->display('course/coursePage.tpl');
?>
 