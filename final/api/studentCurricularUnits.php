<?php 
 include_once('../config/init.php');
 include_once($BASE_DIR . 'database/course.php');  
 include_once($BASE_DIR . 'database/cuEnrollment.php');  
 
  if (!$_POST['student'] || !$_POST['course']) {
    echo "There are no curricular unit for this student.";    
    exit;
  }
  $grades =getGradeCuStatus($_POST['student'],date("Y"));

  $grades['courseYears'] =  getCourseYears($_POST['course']);
  // Determine nr. years to show
 
   $gradesStudent = array();
   $gradesStudent['courseYears'] = $grades['courseYears'];

    // Once to create as empty arrays
    for($i = 0; $i < sizeof($grades); $i++){
  		$gradesStudent[$grades[$i]['curricularyear']][$grades[$i]['curricularsemester']] = array();
    }

    // Another time to push into them, so as to encapsulate everything
    for($i = 0; $i < sizeof($grades); $i++){
      if(!ignoreNotDoneStatus($gradesStudent[$grades[$i]['curricularyear']][$grades[$i]['curricularsemester']],$grades[$i]))
           array_push($gradesStudent[$grades[$i]['curricularyear']][$grades[$i]['curricularsemester']], $grades[$i]);
    }

 /*var_dump(array_key_exists([5][1], $gradesStudent));
 var_dump($gradesStudent[1][1]);*/
 
 $smarty->assign('curricularUnitGrades', $gradesStudent);
 $smarty->display('person/gradesPerson.tpl');

 function ignoreNotDoneStatus($array,$toCheck){
  foreach ($array as $key => $value) {
    if($value['name'] == $toCheck['name'] && $toCheck['curricularstatus'] != "done")
      return true;
  }
  return false;
 }
?>