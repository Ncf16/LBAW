 
 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 

  $course = getCourseInfo($_GET['course']);
  $syllabus = getCurrentCourseSyllabus($_GET['course']);

  //var_dump($course);
  //var_dump($course["name"]);

  $smarty->assign('course', $course);
  $smarty->assign('syllabus', $syllabus);
  $smarty->display('course/coursePage.tpl');
?>
 