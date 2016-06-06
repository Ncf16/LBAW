<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/person.php');


if(!isset($_GET['uc'])){
   header("Location: " . $BASE_URL . "index.php");
    exit;
}else{
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

$smarty->display('CurricularUnit/viewUnitContent.tpl');

?>