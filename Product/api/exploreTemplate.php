<?php

  include_once('../config/init.php');
  include_once($BASE_DIR . 'database/course.php');  
  
 
  if (!$_POST['template'] || !$_POST['units']) {
    echo "There are no curricular unit occurrences present on this course's syllabus.";    
    exit;
  }


  if($_POST['template'] == 'peopleTable'){

    $people = $_POST['units'];

    $smarty->assign('people', $people);
    $smarty->display('person/personListBody.tpl');
  }
 
  

?>