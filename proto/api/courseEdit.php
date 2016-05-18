<?php
  include_once('../config/init.php');
  include_once($BASE_DIR . 'database/person.php');  
   include_once($BASE_DIR . 'database/course.php');  
  $courseType=array ('Bachelor','Masters','PhD');
  if (!$_POST['Action']) {
    echo "false";    
    exit;
  } 

  if($_POST['Action']=='Create'){
    checkArgs();
    $result=createCourse($_POST['course_abbreviation'],$_POST['course_director'], $_POST['course_degree'],$_POST['course_name'],$_POST['course_fundate'], date("Y"),$_POST['course_description']);
    exit;
  }
  elseif ($_POST['Action']=='Edit')  {
     if(isset($_POST['courseID'])){
      checkArgs();
       $result= updateCourse($_POST['courseID'],$_POST['course_abbreviation'],$_POST['course_director'], $_POST['course_degree'],$_POST['course_name'],$_POST['course_fundate'], date("Y"), 
        $_POST['course_description']);
       echo $result;
       exit;
      }
      else{
        echo "No courseID given";
        exit;
      }
    }
    else {
      echo "Invalid Action";    
      exit;
      } 


    function checkArgs(){
      global $courseType;
      if(!isset($_POST['course_degree']) || !in_array($_POST['course_degree'],$courseType)){
        echo "course_degree";
        exit;
      }
      $teacherCodes=getTeacherAcademicCodes();
      if (!isset($_POST['course_director'])||checkAcademicCodeInArray($teacherCodes,$_POST['course_director'])) {
        echo "course_director error";
        exit;
      }
      if(!isset($_POST['course_abbreviation'])) {
       echo "course_abbreviation";
        exit;
      }

      if (!isset($_POST['course_name'])) {
       echo "course_name";
        exit;
      }
      if (!isset($_POST['course_fundate'])) {
       echo "course_fundate";
        exit;
      }
      if (!isset($_POST['course_duration'])) {
       echo "course_duration";
        exit;
      }
        if (!isset($_POST['course_description'])) {
       echo "course_description";
        exit;
      }
    } 
  
?>
