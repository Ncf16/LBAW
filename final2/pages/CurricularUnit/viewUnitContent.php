<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/person.php');

$account_type = $_SESSION['account_type'];
$hasPermission= false;

if(!isset($_GET['uc']) || !is_numeric($_GET['uc']) ){
   header("Location: " . $BASE_URL . "index.php");
    exit;
}else{

if(!$account_type || !($account_type == 'Admin' || 
  ($account_type == 'Teacher' && hasTeacherUCOAccess($_SESSION['userID'],$_GET['uc'])) ||
  ($account_type == 'Student' && hasStudentUCOAccess($_SESSION['userID'],$_GET['uc']) ))) {
  $_SESSION['error_messages'][] = 'Unauthorized Access';
    header("Location: " . $BASE_URL . "index.php");
    exit;
}

    $uc = getUCO($_GET['uc']);

    if(!$uc){
        $_SESSION['error_messages'][] = 'unit not found!';
        header("Location: " . $BASE_URL . "index.php");
        exit;
    }

    $classes['unitInformation'] = $uc['name'] . ' : ' .$uc['year'] . '/' . ($uc['year'] + 1);
    $classes['unit'] = $_GET['uc'];
    $smarty->assign('classes',$classes);
}

$hasPermission=$account_type == 'Admin'||  ($account_type == 'Teacher' && hasTeacherUCOAccess($_SESSION['userID'],$_GET['uc'])) ;
$smarty->assign('hasPermission',$hasPermission);
$smarty->display('CurricularUnit/viewUnitContent.tpl');

?>