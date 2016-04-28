 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . "database/Courses/courses.php");

  $activeCourses=getAllActiveCourseList();
  $smarty->assign('activeCourses', $activeCourses);
  $smarty->display('course/courseList.tpl')
?>
