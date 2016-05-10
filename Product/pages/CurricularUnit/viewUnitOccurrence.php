<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/unit.php');

  if(!isset($_GET['uc'])){
  	$_SESSION['error_messages'][] = 'unit occurrence not especified!';
  	header("Location: " . $BASE_URL);
  	exit;
  }

  $uc = getUCO($_GET['uc']);
  if(!$uc){
    $_SESSION['error_messages'][] = 'unit not found!';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }

  $uc['year'] = $uc['year'] . '/' . ($uc[year] + 1);

  if(!$uc){
  	$_SESSION['error_messages'][] = 'unit occcurrence id not found!';
  	header("Location: " . $BASE_URL . "index.php");
  	exit;
  }

  $smarty->assign('unit',$uc);
  $smarty->display('curricularUnit/viewUnitOccurrence.tpl');
?>