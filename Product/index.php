<?php
include_once('config/init.php');
$account_type = $_SESSION['account_type'];

if($account_type == 'Student'){
	include_once($BASE_DIR . 'database/evaluation.php');

	$evaluations = getNextStudentEvaluations($_SESSION['userID'],3);
	$smarty->assign('evaluations',$evaluations);
}

$smarty->display('home/homepage.tpl');
?>
