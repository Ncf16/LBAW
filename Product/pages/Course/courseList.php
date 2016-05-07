 <?php
  include_once('../../config/init.php');


  /* DEPRECATED GET VERSION
  include_once($BASE_DIR . "database/course.php");

  $COURSES_PER_PAGE = 10;
  $page = 1;


  $nrCourses = countCourses()['nrcourses'];
  $nrPages = ceil($nrCourses/$COURSES_PER_PAGE);


  if(!is_numeric($_GET['page']) || $_GET['page'] < 1){
  	header('Location: ' . $BASE_URL . 'pages/Course/courseList.php?page=1');
  	exit;
  }else if($_GET['page'] > $nrPages && $nrPages > 0){
  	header('Location: ' . $BASE_URL . 'pages/Course/courseList.php?page=' . $nrPages);
  }else{
  	$page = $_GET['page'];
  }

  $activeCourses=getVisibleCoursesFromPage($page, $COURSES_PER_PAGE);
  $activeCourses[0]['totalCount'] = $nrCourses;
  $activeCourses[0]['nrPages'] = $nrPages;

  $smarty->assign('activeCourses', $activeCourses);
  */


  $smarty->display('course/courseListPage.tpl')
?>
