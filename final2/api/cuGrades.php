<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/grade.php'); 
include_once($BASE_DIR . 'database/unitOccurrence.php'); 
include_once($BASE_DIR . 'database/cuEnrollment.php'); 

if(!$_POST['CUO_ID'] || !is_numeric($_POST['CUO_ID'])){
	 echo "server error";
     exit;
}
if(($CUO=getUCO($_POST['CUO_ID'])) == false || ($students = getAllStudentsCUO($_POST['CUO_ID'])) == false){
	echo "server error";
	exit;
	}
	$return='true';
	//2 actions getAll Grades of a CUO -> for a student, add all of them and set Grade CurricularEnroll
	foreach ($students as $key => $student) {
	$grades =	getGradesStudentByCUO($student['studentcode'],2015,$CUO['curricularunitid']);
	if($grades!= false){
		$finalGrade=0;

		foreach ($grades as $key => $grade) {
			$finalGrade+=$grade['evalgrade'];
		}
		if($finalGrade >20 || $finalGrade <0){
			$return='false';
			echo "invalid grade with student: ".$student['studentcode']."<br><br>";
		}
		else{
			if(!updateGradeCUEnroll($_POST['CUO_ID'],$student['studentcode'],$finalGrade)){
				echo " error in updating Grade ";
				$return='false';
			} 
			 
		}
	}
}
 echo $return;

?>
