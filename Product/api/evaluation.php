<?php
var_dump($_POST);
  include_once('../config/init.php');
  include_once($BASE_DIR . 'database/evaluation.php');  
  if (!$_POST['Action']) {
    echo "false";    
    exit;
  } 

  if($_POST['Action']=='Create'){
    checkArgs();
     $result=createEvaluation($_POST);
    exit;
  }
  elseif ($_POST['Action']=='Edit')  {
     if(isset($_POST['CUO'])){
      checkArgs();
       $result= updateEvaluation($_POST);
       echo $result;
       exit;
      }
      else{
        echo "No cuo";
        exit;
      }
    }
    else {
      echo "Invalid Action";    
      exit;
      } 


    function checkArgs(){
    	//evaluationDate TIMESTAMP NOT NULL, 
		//weight INTEGER NOT NULL,
		//evaluationType EvaluationType,
		 $evalTypes= getEvaluationTypes();
      global $courseType;
      if(!isset($_POST['weight']) || !is_numeric($_POST['weight']) ){
        echo "weight error";
        exit;
      }
      
    else  if (!isset($_POST['evaluationType']) || !in_array($_POST['evaluationType'], $evalTypes)) {
        echo "evaluationType error";
        exit;
      }
    else  if(!isset($_POST['course_abbreviation'])) {
       echo "course_abbreviation";
        exit;
      }
	
	checkArgsEvalType();

    } 
 function createEvaluation($args){

 }
 function updateEvaluation($args){

 }
?>

?>