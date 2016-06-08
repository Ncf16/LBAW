<?php
  include_once($BASE_DIR . '/config/init.php');

 
  function getStudentInfoByUsername($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT Person.*, Course.abbreviation AS courseName, CourseEnrollment.curricularYear AS currentYear,  CourseEnrollment.startYear AS startYear, CourseEnrollment.finishYear AS finishYear, CourseEnrollment.courseGrade As courseGrade
            FROM  Course, CourseEnrollment, Person
            WHERE Course.code = CourseEnrollment.courseID
            AND CourseEnrollment.studentCode = Person.academiccode
            AND Person.username = ? AND Course.visible=1 AND Person.visible=1 AND CourseEnrollment.visible=1;");
    $stmt->execute(array($username));
    return $stmt->fetch();
  }
?>
