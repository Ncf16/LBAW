<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/person.php');

if(isset($_GET['uc'])){

   $uc = getUCO($_GET['uc']);

   if(!$uc){
    $_SESSION['error_messages'][] = 'unit not found!';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }

   $classes['unitInformation'] = $uc['name'] . ' : ' .$uc['year'] . '/' . ($uc['year'] + 1);
   $smarty->assign('classes',$classes);
}
else if(isset($_GET['teacher'])){

	$teacher = getPersonInfoByID($_GET['teacher']);

	if(!teacher){
		$_SESSION['error_messages'][] = 'teacher not found!';
	    header("Location: " . $BASE_URL . "index.php");
	    exit;
	}

	$classes['teacherInformation'] = $teacher['name'];
	$smarty->assign('classes',$classes);
}

$smarty->display('classes/classes.tpl');
?>