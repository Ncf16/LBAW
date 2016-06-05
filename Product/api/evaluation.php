<?php
include_once ('../config/init.php');
include_once ($BASE_DIR . 'database/evaluation.php');
include_once ($BASE_DIR . 'database/unitOccurrence.php');

if (!$_POST['Action']){
	echo "false";
	exit;
	}

if ($_POST['Action'] == 'Create'){
	checkArgs($_POST);
	$result = createEvaluationApi($_POST);
	if ($result !== false) 
		echo $result;
	  else 
	  	echo "false, failed create please check values";
	  
	  exit;
	}
  else if ($_POST['Action'] == 'Edit'){
	if (isset($_POST['CUO']) && getUCO($_POST['CUO']) !== NULL)	{

		$result = getEvaluationType($_POST['evaluationID']);
		
		if ($result !== false) 
			$_POST['evaluationType'] = $result['evaluationtype'];
		else 
			echo "invalid evaluation";
		
		checkArgs($_POST);
		
		$result = updateEvaluationApi($_POST);
		if ($result !== false) 
			echo $result;
		else 
			echo "false, failed update please check values";

		exit;
		
	}
	  else{
		echo "No Curricular Unit Occurrence";
		exit;
		}
}
  else{
	echo "Invalid Action";
	exit;
	}

function checkArgs($args)
	{
	if (!isset($args['weight']) || !is_numeric($args['weight'])) {
		echo "weight error";
		exit;
		}
	  else
	if (!isset($args['evaluationType'])) {
		echo "evaluationType error";
		exit;
		}

	$type = $args['evaluationType'];
	if ($type == "Exam") {
		checkArgsExam($args);
		}
	  else	if ($type == "GroupWork") {
		checkArgsGroupWork($args);
		}
	  else	if ($type == "Test") {
		checkArgsTest($args);
		}
	  else {
		echo "evaluationType error";
		exit;
		}
	}

function checkArgsExam($args) {
	if (!isset($args['duration']) || !is_numeric($args['duration'])) {
		echo "duration error";
		exit;
		}
	}

function checkArgsGroupWork($args) {
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
		if ($min > $max)
			{
			$args['minElements'] = $args['maxElements'];
			}
		}
	}

function checkArgsTest($args) {
	if (!isset($args['duration']) || !is_numeric($args['duration']))
		{
		echo "duration error";
		exit;
		}
	}

function createEvaluationApi($args) {
	$type = $args['evaluationType'];
	$date = new DateTime($args['evaluationDay'] . ' ' . $args['evaluationTime']);
	if ($type == "Exam") {
		return createExam($args['duration'], $args['CUO'], $date->format('Y-m-d H:i') , $args['weight']);
		}
	  else if ($type == "GroupWork") {
		return createGroupWork($args['minElements'], $args['maxElements'], $args['CUO'], $date->format('Y-m-d H:i') , $args['weight']);
		}
	  else if ($type == "Test") {
		return createTest($args['duration'], $args['CUO'], $date->format('Y-m-d H:i') , $args['weight']);
		}
	  else {
		return  false;
		}
	}

function updateEvaluationApi($args)	{
	$type = $args['evaluationType'];
	$date = new DateTime($args['evaluationDay'] . ' ' . $args['evaluationTime']);
	if ($type == "Exam"){
		return updateExam($args['evaluationID'], $args['weight'], $date->format('Y-m-d H:i') ,  $args['duration']);
		}
	  else if ($type == "GroupWork"){
		return updateGroupWork($args['evaluationID'], $args['weight'], $date->format('Y-m-d H:i') , $args['minElements'], $args['maxElements']);
		}
	  else if ($type == "Test"){
		return updateTest($args['evaluationID'], $args['weight'], $date->format('Y-m-d H:i') ,  $args['duration']);
		}
	  else	{
		return false;
		}
	}

?>