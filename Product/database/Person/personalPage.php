<?php
  function getStudentInfo($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT Person.*, Course.abbreviation AS courseName, CourseEnrollment.curricularYear AS currentYear, EXTRACT(YEAR FROM CourseEnrollment.startYear) AS startYear, CourseEnrollment.finishYear AS finishYear, CourseEnrollment.courseGrade As courseGrade
FROM CourseEnrollment, Course, Person
WHERE CourseEnrollment.courseID = Course.code
AND Person.academicCode = ?
AND CourseEnrollment.studentCode = ?");
    $stmt->execute(array($id,$id));
    return $stmt->fetch();
  }
?>
