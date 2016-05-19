  <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/teacher.php'); 

 if(!$_SESSION['account_type'] || $_SESSION['account_type'] != 'Admin' ){
 		header("Location: " . $BASE_URL . "index.php");
 		exit;
	}
 	
  if(!$_SESSION['account_type'] || $_SESSION['account_type'] != 'Admin' || ! checkUserType("Admin",$USERID) ){
 	?>
		<h1>ERROR NOT A VALID PERMISSION</h1>
 	<?php
 		exit;
}
    
$_GET['courseID']=15;
  if (isset($_GET['courseID'])) {
      $infoToEdit=getCourseInfo($_GET['courseID']);
      $edit=true;
      $smarty->assign('infoToEdit',$infoToEdit);
      var_dump($infoToEdit);
    }
    else
      $edit=false;

  $teachers=getAllTeachers();
  $smarty->assign('teachers',$teachers);
  $smarty->assign('edit',$edit);
 

   $smarty->display('course/courseCreation.tpl');
?>
 ?>
 