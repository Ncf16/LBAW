 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/student.php'); 

  if(!$_GET['person']){
   header('Location: ' . $BASE_URL .  'index.php');
   exit;
  }

  $person = getPersonInfoByUser($_GET['person']);

  if($person == NULL){ //IF USERNAME CORRESPONDS TO NO PERSON, REDIRECT TO INDEX
  	header('Location: ' . $BASE_URL .  'index.php');
    exit;
  }

  if($person['persontype'] == 'Student'){
  	$smarty->assign('student', $person);
        if(isset($_SESSION['username']) && isset($_GET['person']) && $_GET['person'] === $_SESSION['username'] ){
          include_once($BASE_DIR . 'database/course.php'); 
          include_once($BASE_DIR . 'database/cuEnrollment.php'); 
          include_once($BASE_DIR . 'database/courseEnrollment.php'); 
          $studentID = getPersonIDByUserName($_GET['person']);
          $getStudentCourse=getStudentCourse($studentID['academiccode']);
          $isCheckProgress=true;
          $smarty->assign('courseCode' ,$getStudentCourse['code']);
          $smarty->assign('student',$studentID['academiccode']);
      }
        else
        $isCheckProgress=false;
 
  }
 $smarty->assign('seeUnits' ,$isCheckProgress);
  $smarty->assign('person', $person);
  $smarty->display('person/personalPage.tpl');
?>
