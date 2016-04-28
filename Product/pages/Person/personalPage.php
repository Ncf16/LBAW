 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . "database/Person/personalPage.php");

  $person=getStudentInfo($USERNAME);
  $smarty->assign('person', $person);
  $smarty->display('person/personalPage.tpl');
?>
