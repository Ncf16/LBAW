<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/class.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');

//see what files I´ll need to include -> Filipe
$account_type = $_SESSION['account_type'];
$curricularUnitOccurenceID=$_GET['CUO_ID'];
$curricularUnitOccurence=getUCO($curricularUnitOccurenceID);

if(!$account_type && $account_type != 'Admin' && !isRengent($_SESSION['userID'],$curricularUnitOccurenceID) ){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}
  
  if (isset($_GET['classID'])) {
      $infoToEdit=getClass($_GET['classID']);
      $edit=true;
      $smarty->assign('infoToEdit',$infoToEdit);
      var_dump($infoToEdit);
    }
    else
      $edit=false;


$smarty->assign('cuo',$curricularUnitOccurence);
$smarty->display('classes/createClass.tpl');

?>