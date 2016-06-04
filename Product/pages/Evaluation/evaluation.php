<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/evaluation.php');
$account_type = $_SESSION['account_type'];

//Ask for their opinion use date("Y") or let it be a arg
$_GET['CUO']=1;
if(!$_GET['CUO']||!$account_type || ($account_type != 'Admin' && !isRegent($_GET['CUO'], $_SESSION['userID'],date("Y")))){
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
if(isset($_GET['evalID'])){
	$edit=true;
	$eval = getEval($_GET['evalID']);
	$detailInfo= getDetailEval($_GET['evalID']);
	if($eval  != NULL || $detailInfo != NULL){
	$smarty->assign('eval',$eval);
	$smarty->assign('detailInfo',$detailInfo);
	}
}
else
	$edit =false;
 $smarty->assign('evalTypes',$evalTypes); 
 $smarty->assign('edit',$edit); 
 $smarty->assign('CUO',$cuo);
 $smarty->display('evaluation/evaluation.tpl');
?>