<?php
  include_once('../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/courseEnrollment.php'); 
  include_once($BASE_DIR . 'database/cuEnrollment.php'); 
  include_once($BASE_DIR . 'database/unit.php'); 

foreach ($_POST as $key => $value) {
	var_dump($key);
	echo "  <br>";
	var_dump($value);
	echo " <br>";
}

	if(!$_POST['cCode']){
		echo "Make sure you are enrolled in a course";
		exit;
	} 

     if(!$_POST['cCode'] || !is_numeric($_POST['cCode'])|| !is_numeric($_POST['pCode']) || !$_SESSION['account_type'] || ( ($_POST['pCode']!== $_SESSION['userID'] && $_SESSION['account_type'] !== 'Student') && 
        $_SESSION['account_type'] !== 'Admin'  ) ){
       		echo "You do not have permission";
       		exit;
      } 
     
		$person= getPersonInfoByUser($_POST['pCode']);
		$enrolled=getStudentCourseByUsername($_POST['pCode']);

		if($enrolled == false  || $_POST['cCode'] != $enrolled['code']){
			 echo "Not a valid course or enrollment";
	      exit;
		}

		if($person==false){
	       echo "Not a valid user";
	      exit;
	      } 

	      //No longer needed and would be useless value in the upcoming for cycle
	    unset($_POST['pCode']);
		unset($_POST['cCode']);
		 $pattern = '/CU_.+/'; 

		 //$key = CU_CurricularUnitName
		// $value = CUO_ID
		 $return='true';
		foreach ($_POST as $key => $value) {
		  preg_match($pattern, $key,$match);
		 
			 if(count($match)>0){
			 	  $key = str_replace("CU_", "",$key);
		  		  $curricularName= str_replace("_", " ",$key);
			 	 
			 	 $CU_ID =getCurricularUnitByName($curricularName); 
			 	 
			 	 if( $CU_ID != false && !isEnrolledInCU($person['academiccode'],$value,$enrolled['code'],date("Y"),$CU_ID['curricularid'])){ 
			 		if(enrollInCU($person['academiccode'],$value)==false)
						$return ="error";
					}
					else
					$return = "can't sign up the same CU twice in the same year";
			 } 
		}
		echo $return;
	     

?>