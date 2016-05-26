 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/student.php'); 

  if(!$_GET['person']){
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   exit;
  }

  $person = getPersonInfoByUser($_GET['person']);

  if($person == NULL){ //IF USERNAME CORRESPONDS TO NO PERSON, REDIRECT TO INDEX
  	header('Location: ' . $BASE_URL .  'index.php');
    exit;
  }

  if($person['persontype'] == 'Student'){
  	$student=getStudentInfoByUsername($_GET['person']);
  	$smarty->assign('student', $student);
  }

  $smarty->assign('person', $person);
  $smarty->display('person/personalPage.tpl');
?>
