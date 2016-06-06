<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/unit.php');
  include_once($BASE_DIR . 'database/unitOccurrence.php');

  if(!isset($_GET['uc'])){
  	$_SESSION['error_messages'][] = 'unit occurrence not specified!';
  	header("Location: " . $BASE_URL);
  	exit;
  }

  $uc = getUCO($_GET['uc']);
  if(!$uc){
    $_SESSION['error_messages'][] = 'unit not found!';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }
  $permissionToSeeContent=false;
 
  $languages = array();
  $languages['PT']='Portuguese';
  $languages['EN']='English';
  $languages['ES']='Spanish';

  $uc['year'] = $uc['year'] . '/' . ($uc['year'] + 1);
  $uc['language'] = $languages[$uc['language']];

  if(!$uc){
  	$_SESSION['error_messages'][] = 'unit occcurrence id not found!';
  	header("Location: " . $BASE_URL . "index.php");
  	exit;
  }
 // Se   for admin ou aluno ou professor dessa CU tem acesso
  if($_SESSION['account_type'] == 'Admin' ||  hasStudentUCOAccess($_SESSION['userID'],$_GET['uc']) || hasTeacherUCOAccess($_SESSION['userID'],$_GET['uc'])){
      $permissionToSeeContent=true;
  }

  $smarty->assign('permissionToSeeContent',$permissionToSeeContent);
  $smarty->assign('unit',$uc);
  $smarty->display('curricularUnit/viewUnitOccurrence.tpl');
?>