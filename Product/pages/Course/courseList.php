 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . "database/course.php");

  $activeCourses=getVisibleCourses();

  $smarty->assign('activeCourses', $activeCourses);
  $smarty->display('course/courseList.tpl')
?>
