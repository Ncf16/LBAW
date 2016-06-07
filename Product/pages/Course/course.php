  <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/teacher.php'); 

  if(!$_SESSION['account_type'] || $_SESSION['account_type'] !== 'Admin' || ! checkUserType("Admin",$_SESSION['userID']) ){
    header("Location: " . $BASE_URL . "index.php");
 		exit;
}
  if (isset($_GET['courseID'])) {
      $infoToEdit=getCourseInfo($_GET['courseID']);
      $edit=true;
      $smarty->assign('infoToEdit',$infoToEdit);
    }
    else
      $edit=false;

  $teachers=getAllTeachers();
  $smarty->assign('teachers',$teachers);
  $smarty->assign('edit',$edit);
 

   $smarty->display('course/course.tpl');
?>
  