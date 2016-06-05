<?php
include_once('../config/init.php'); 
include_once($BASE_DIR . 'database/evaluation.php');
 if(isset($_POST['evalID']) && is_numeric($_POST['evalID'])){
 	$edit=true;
 	$evalDetails=getTestSimple($_POST['evalID']);
 	$smarty->assign('test',$evalDetails);

 }
 else
 	$edit =false;
 
 $smarty->assign('edit',$edit); 
 $smarty->display('evaluation/test.tpl');
?>