  <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 
  include_once($BASE_DIR . 'database/person.php'); 
  /*if(!$_SESSION['account_type'] || $_SESSION['account_type'] != 'Admin' ){
 		header("Location: " . $BASE_URL . "index.php");
 		exit;
	}
 	else*/
 		//$_GET['courseID']=1;
  	$smarty->display('course/courseCreation.tpl');
 /*
  <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . "database/course.php");
  include_once($BASE_DIR . "database/person.php");

  if(!$_SESSION['account_type'] || $_SESSION['account_type'] != 'Admin' || ! checkUserType("Admin",$USERID) ){
 	?>
		<h1>ERROR NOT A VALID PERMISSION</h1>
 	<?php
 		exit;
}
  $smarty->display('course/courseCreation.tpl');
?>
 */
 ?>
 