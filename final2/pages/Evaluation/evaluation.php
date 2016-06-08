<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/evaluation.php');
//Ask for their opinion use date("Y") or let it be a arg

$account_type=$_SESSION['account_type'];
 
 if(!$_GET['CUO']||!$account_type|| ($account_type!= 'Admin' && !isRegent($_GET['CUO'], $_SESSION['userID'],date("Y")))){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}
 
$cuo = getUCO($_GET['CUO']);
$evalTypes = getEvaluationTypes();
 
if($cuo  == NULL){
	$_SESSION['error_messages'][] = 'CUO does not exist';
 	 header("Location: " . $BASE_URL . "index.php");
 	 exit;
}
if(isset($_GET['evalID']) && !empty($_GET['evalID'])){
	$edit=true;
	$eval = getEvaluation($_GET['evalID'],$_GET['CUO']);
 
	if($eval  != NULL ){
		$date=  new DateTime($eval['evaluationdate']);
		$smarty->assign('evaluation',$eval);
		$smarty->assign('dateDay',$date->format('Y-m-d'));
		$smarty->assign('dateTime',$date->format('H:i'));
	}
}
else
	$edit =false;

 $smarty->assign('evalTypes',$evalTypes); 
 $smarty->assign('edit',$edit); 
 $smarty->assign('CUO',$_GET['CUO']);
 $smarty->display('evaluation/evaluation.tpl'); 

?>