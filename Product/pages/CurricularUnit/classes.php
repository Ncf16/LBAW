<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');


if(isset($_GET['uc'])){

   $uc = getUCO($_GET['uc']);

   if(!$uc){
    $_SESSION['error_messages'][] = 'unit not found!';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }

   $classes['unitInformation'] = $uc['name'] . ' : ' .$uc['year'] . '/' . ($uc[year] + 1);
   $smarty->assign('classes',$classes);
}

$smarty->display('classes/classes.tpl');
?>