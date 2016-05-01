 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/person.php'); 

  if(!$_GET['person']){
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   exit;
  }

  $person = getPersonInfo($_GET['person']);

  //IF USERNAME CORRESPONDS TO NO PERSON, REDIRECT TO INDEX

  if($person['persontype'] == 'Student'){
  	$student=getStudentInfo($_GET['person']);
  	$smarty->assign('student', $student);

  }

  //var_dump($_GET['person']);
  $smarty->assign('person', $person);
  $smarty->display('person/personalPage.tpl');
?>
