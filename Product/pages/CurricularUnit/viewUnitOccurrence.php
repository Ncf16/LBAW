<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');

$account_type = $_SESSION['account_type'];
if(!$_GET['uc']){
 $_SESSION['error_messages'][] = 'unit occurrence not specified!';
 header("Location: " . $BASE_URL);
 exit;
}
$hasPermission=false;
if(!$account_type || !($account_type == 'Admin' || 
  ($account_type == 'Teacher' && hasTeacherUCOAccess($_SESSION['userID'],$_GET['uc'])) ||
  ($account_type == 'Student' && hasStudentUCOAccess($_SESSION['userID'],$_GET['uc'])) )){
  $_SESSION['error_messages'][] = 'Unauthorized Access';
header("Location: " . $BASE_URL . "index.php");
exit;
}
$hasPermission= $account_type == 'Admin' ||  ($account_type == 'Teacher' && hasTeacherUCOAccess($_SESSION['userID'],$_GET['uc']));
$uc = getUCO($_GET['uc']);
if(!$uc){
 $_SESSION['error_messages'][] = 'unit occcurrence id not found!';
 header("Location: " . $BASE_URL . "index.php");
 exit;
}

$languages = array();
$languages['PT']='Portuguese';
$languages['EN']='English';
$languages['ES']='Spanish';

$uc['year'] = $uc['year'] . '/' . ($uc['year'] + 1);
$uc['language'] = $languages[$uc['language']];


$smarty->assign('hasPermission',$hasPermission);
$smarty->assign('unit',$uc);
$smarty->display('curricularUnit/viewUnitOccurrence.tpl');
?>