<?php

  include_once('../config/init.php');
  
 
  if (!$_POST['template'] || !$_POST['units']) {
    echo "No occurrences were found.";
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