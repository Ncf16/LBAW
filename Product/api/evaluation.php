<?php
include_once ('../config/init.php');
include_once ($BASE_DIR . 'database/evaluation.php');

if (!$_POST['Action']) {
	echo "false";
	exit;
}
 
if ($_POST['Action'] == 'Create') {
	 checkArgs($_POST);
	 echo "out of check";
	$result = createEvaluationL($_POST);
	 if($result!==false)
	 	echo "true";
	 else
	 	echo "false";

	exit;
} 
else if ($_POST['Action'] == 'Edit') {
	if (isset($_POST['CUO'])) {
		$result = updateEvaluationL($_POST);
		echo $result;
		exit;
	}
	else {
		echo "No cuo";
		exit;
	}
}
else {
	echo "Invalid Action";
	exit;
} 
 
function checkArgs($args){
 var_dump($args);
	if (!isset($args['weight']) || !is_numeric($args['weight'])) {
		echo "weight error";
		exit;
	}
	else
	if (!isset($args['evaluationType'])) {
		echo "evaluationType error";
		exit;
	}
  	$type=$args['evaluationType'];
	var_dump($type);
	if($type == "Exam"){
		checkArgsExam($args);
	}else
	if($type == "GroupWork"){
		checkArgsGroupWork($args);
	}
	else if($type =="Test"){
		checkArgsTest($args);
	}
	else{
		echo "evaluationType error";
		exit;
	} 
	echo "out";
}

function checkArgsExam($args){
	if (!isset($args['duration']) || !is_numeric($args['duration'])) {
		echo "duration error";
		exit;
	}
}

function checkArgsGroupWork($args){
	if (!isset($args['minElements']) || !is_numeric($args['minElements'])) {
		echo "Minimum Elements error";
		exit;
	}
	else
	if (!isset($args['maxElements']) || !is_numeric($args['maxElements'])) {
		echo "Maximum Elements error";
		exit;
	}
	else {
		$max = intval($args['maxElements']);
		$min = intval($args['minElements']);
		if ($min > $max) {
			$args['minElements'] = $args['maxElements'];
		}
	}
}

function checkArgsTest($args){
	if (!isset($args['duration']) || !is_numeric($args['duration'])) {
		echo "duration error";
		exit;
	}
}
 
function createEvaluationL($args){
	$type=$args['evaluationType'];
	$date = new DateTime($args['evaluationDay'].' '.$args['evaluationTime']);
 
	if($type == "Exam"){
		echo "\nExam\n";
				return createExam($args['duration'], $args['CUO'], $date->format('Y-m-d H:i'), $args['weight']);
	}else if($type == "GroupWork"){
		echo "\nGroupWork\n";
		return createGroupWork($args['minElements'], $args['maxElements'],  $args['CUO'],  $date->format('Y-m-d H:i'), $args['weight']);
	}
	else if($type =="Test"){
		echo "\nTest\n";
		 return createTest($args['duration'],  $args['CUO'],  $date->format('Y-m-d H:i'), $args['weight']);
	}
	else{
		echo "evaluationType error";
		exit;
	}  
}  

function updateEvaluationL($args){
	 
	$type=$args['evaluationType'];
	$date = new DateTime($args['evaluationDay'].' '.$args['evaluationTime']);
 
	if($type == "Exam"){
		echo "\nUpdate Exam\n";
				return updateExam($args['duration'], $args['CUO'], $date->format('Y-m-d H:i'), $args['weight']);
	}else if($type == "GroupWork"){
		echo "\nUpdate GroupWork\n";
		return updateGroupWork($args['minElements'], $args['maxElements'],  $args['CUO'],  $date->format('Y-m-d H:i'), $args['weight']);
	}
	else if($type =="Test"){
		echo "\nUpdate Test\n";
		 return updateTest($args['duration'],  $args['CUO'],  $date->format('Y-m-d H:i'), $args['weight']);
	}
	else{
		echo "evaluationType error";
		exit;
	}  
}   
?>

