<?php
include_once('../config/init.php'); 
include_once($BASE_DIR . 'database/evaluation.php');

	if(!isset($_POST['evalType']) || empty($_POST['evalType']))
		echo "invalid request";

	 if(is_numeric($_POST['evalID']) && getEvaluationByID($_POST['evalID'])!=false ){
	 	$edit=true;
	 }
	 else
	 	$edit =false;

  $smarty->assign('edit',$edit);

	if($edit == true && $_POST['evalType'] == 'groupwork'  ){
		$evalDetails=getGroupWorkSimple($_POST['evalID']);
	 	$smarty->assign('groupWork',$evalDetails);
	}
	else if($edit == true && $_POST['evalType'] == 'exam'  ){
	 	$evalDetails=getExamSimple($_POST['evalID']);
	 	$smarty->assign('exam',$evalDetails);
	}
	else  if($edit == true && $_POST['evalType'] == 'test'  ){
	    $evalDetails=getTestSimple($_POST['evalID']);
	 	$smarty->assign('test',$evalDetails);
	}
	 
	if( $_POST['evalType'] == 'groupwork'  ){
	 $smarty->display('evaluation/groupWork.tpl');
	}
	else if( $_POST['evalType'] == 'exam'  ){
	 $smarty->display('evaluation/exam.tpl');
	}
	else  if( $_POST['evalType'] == 'test'  ){
	 $smarty->display('evaluation/test.tpl');
	}
	else{
	echo "invalid request type";
	exit;
	} 
?>