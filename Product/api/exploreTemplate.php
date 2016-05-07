<?php

  include_once('../config/init.php');
  include_once($BASE_DIR . 'database/course.php');  
  
 
  if (!$_POST['template'] || !$_POST['units']) {
    echo "There are no curricular unit occurrences present on this course's syllabus.";    
    exit;
  }

  $units = $_POST['units'];

  if($_POST['template'] == 'peopleTable'){

    $smarty->assign('people', $units);
    $smarty->display('person/personListBody.tpl');
    
  }else if($_POST['template'] == 'courseTable'){

    $smarty->assign('activeCourses', $units);
    $smarty->display('course/courseListBody.tpl');
  }


?>