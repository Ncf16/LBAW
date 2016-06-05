<?php
  include_once('../config/init.php');
  include_once($BASE_DIR . 'database/courseEnrollment.php'); 
  
  var_dump($_POST);

if(isset($_POST['student']) && !$_POST['course'] && isset($_POST['newCourse'])){
	createCourseEnrollment($_POST['student'],$_POST['newCourse'],date("Y"),NULL,1);
}

if(!$_POST || !$_POST['student']|| !$_POST['course']|| !$_POST['newCourse'] || !is_numeric($_POST['student'])  || !is_numeric($_POST['course']) || !is_numeric($_POST['newCourse']))
	echo "false error in input, please check values";
else{
	if( isInactive($_POST['student'],$_POST['newCourse'])){
		 echo "course is innnactiv";
		 $result=restartEnrollment($_POST['student'],$_POST['course'],$_POST['newCourse'],date("Y"),NULL,1);
		}
		else
  		$result=replaceCourseEnrollment($_POST['student'],$_POST['course'],$_POST['newCourse'],date("Y"),NULL,1);

  echo json_encode($result); 
}

?>