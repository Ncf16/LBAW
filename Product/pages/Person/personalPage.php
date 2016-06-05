 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/student.php'); 
  include_once($BASE_DIR . 'database/course.php'); 
  include_once($BASE_DIR . 'database/courseEnrollment.php'); 
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

   include_once($BASE_DIR . 'database/course.php'); 
   include_once($BASE_DIR . 'database/courseEnrollment.php'); 
       
    $student=getStudentInfoByUsername($_GET['person']);
    $smarty->assign('student', $student);
    $studentID = getPersonIDByUserName($_GET['person']);
    $getStudentCourse=getStudentCourse($studentID['academiccode']);
     
  if(isset($_SESSION['username']) && isset($_GET['person']) && $_GET['person'] === $_SESSION['username'] ){
    include_once($BASE_DIR . 'database/cuEnrollment.php'); 

     
    $isCheckProgress=true;
    $smarty->assign('courseCode' ,$getStudentCourse['code']);
     

}
  else
  $isCheckProgress=false;

 if($_SESSION['account_type']=='Admin' ){
      $courses= getVisibleCourses();
      $currentCourse = getCourseInfo( $getStudentCourse['code']);
      $smarty->assign('courses',$courses);
      $smarty->assign('currentCourse' ,$currentCourse);
    }    

}

    
  $smarty->assign('viewerType',$_SESSION['account_type']);
  $smarty->assign('seeUnits' ,$isCheckProgress);
  $smarty->assign('person', $person);
  $smarty->display('person/personalPage.tpl');
?>
