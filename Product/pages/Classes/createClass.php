<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/class.php');
include_once($BASE_DIR . 'database/person.php');

$account_type = $_SESSION['account_type'];
 //mandar por get o id da CUO em que vai criar a aula
$curricularUnitOccurenceID=$_GET['CUO_ID'];
$curricularUnitOccurence=getUnit($curricularUnitOccurenceID)
if(!$account_type && $account_type != 'Admin' && $account_type != 'Teacher' && !isRengent($courseDirectors,$_SESSION['userID'],$curricularUnitOccurenceID) ){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}
  $smarty->assign('cuo',$curricularUnitOccurence);
$smarty->display('classes/createClass.tpl');
?>