 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/course.php'); 
  include_once($BASE_DIR . 'database/person.php'); 
  include_once($BASE_DIR . 'database/courseEnrollment.php'); 
  include_once($BASE_DIR . 'database/cuEnrollment.php'); 
  //DO NOT FORGET TO CHANGE THE SHIT IN THE COURSE_ENROLLMENT.PHP FFS 
  $_GET['student']=20164;
       if(!$_GET['student'] ||  !$_SESSION['account_type'] || ( ($_GET['student']!== $_SESSION['username'] && $_SESSION['account_type'] !== 'Student') && 
        $_SESSION['account_type'] !== 'Admin'  ) ){
       		header("Location: " . $BASE_URL . "index.php");
       		exit;
      } 
     

     $course = getStudentCourseByUsername($_GET['student']); 
     $student = getPersonInfoByUser($_GET['student']);
     $availableToSign=  getAvailableCurricularUnitAvailable( $student['academiccode'],$course['code'],date("Y"),$course['curricularyear'] );
     $courseYears=getCourseYears($course['code']);
     if(count($availableToSign)>0){ 
     $units=array();
     for ($i = 1; $i <=  $courseYears; $i++) {
    $units[$i]=array();
    }
   foreach ($availableToSign as $key => $value) {
     array_push( $units[$value['curricularyear']],  $value);
   }
     $smarty->assign('course', $course);
     $smarty->assign('student', $student);
     $smarty->assign('canSignUpTo', $units);
     $smarty->display('student/signingToCU.tpl');
}
else{
    header("Location: " . $BASE_URL . "index.php");
    exit;
}
?>
 