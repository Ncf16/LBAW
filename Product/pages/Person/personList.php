 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . "database/person.php");

  $people = getPeople();
 
  $smarty->assign('people', $people);
  $smarty->display('person/personList.tpl')
?>
