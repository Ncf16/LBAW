<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/grade.php'); 

if(!$_POST['CUO_ID'] || !is_numeric($_POST['CUO_ID'])){
	 echo "server error";
     exit;
}
if($CUO=getUCO($_POST['CUO_ID'])) == false || ($students = getAllStudentsCUO($_POST['CUO_ID'])) == false){
	echo "server error";
	exit;
	}
	$return='true';
	//2 actions getAll Grades of a CUO -> for a student, add all of them and set Grade CurricularEnroll
	foreach ($students as $key => $student) {
	$grades =	getGradesStudentByCUO($student['studentCode'],date("Y"),$CUO['curricularunitid']);
	if($grades!= false){
		$finalGrade=0;

		foreach ($grades as $key => $grade) {
			$finalGrade+=$grade['evalGrade'];
		}
		if($finalGrade >20 || $finalGrade <0){
			$return='false';
			echo "invalid grade with student: ".$student['studentCode']."<br><br>";
		}
		else{
			if(updateGrade($student['studentCode'],$evaluation,$finalGrade)){
				echo "error in updating Grade";
				$return='false';
			}
		}
	}
}
 echo $return;

?>
