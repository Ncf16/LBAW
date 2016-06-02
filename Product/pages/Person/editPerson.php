 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/person.php'); 

  if(!$_GET['personUsr'] || ($person = getPersonInfoByUser($_GET['personUsr']))==NULL || ($_SESSION['username'] != $_GET['personUsr'] &&  $_SESSION['account_type'] !== 'Admin')) {
   header('Location: ' . $BASE_URL.'index.php');
    exit;
  }
  $smarty->assign('person',$person);
  $smarty->display('person/editPerson.tpl');
?>
