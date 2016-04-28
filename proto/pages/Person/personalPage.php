 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . "database/Person/personalPage.php");

  if(!$_GET['person']){
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   exit;
  }

  $person=getStudentInfo($_GET['person']);
  $smarty->assign('person', $person);
  $smarty->display('person/personalPage.tpl');
?>
