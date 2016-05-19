<?php
  include_once($BASE_DIR . '/config/init.php');

 
  function getStudentInfoByUsername($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT Person.*, Course.abbreviation AS courseName, CourseEnrollment.curricularYear AS currentYear, EXTRACT(YEAR FROM CourseEnrollment.startYear) AS startYear, CourseEnrollment.finishYear AS finishYear, CourseEnrollment.courseGrade As courseGrade
            FROM  Course, CourseEnrollment, Person
            WHERE Course.code = CourseEnrollment.courseID
            AND CourseEnrollment.studentCode = Person.academiccode
            AND Person.username = ?");
    $stmt->execute(array($username));
    return $stmt->fetch();
  }
?>
