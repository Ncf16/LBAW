<?php
  include_once($BASE_DIR . "/config/init.php");

function getStudentCourse($academicCode){
 global $conn;

 $stmt = $conn->prepare("SELECT course.code,max(startYear)
						FROM Person, CourseEnrollment, Course
							WHERE Person.academiccode = Courseenrollment.studentcode
								AND Courseenrollment.courseid = course.code
									AND Person.academiccode = ? AND CourseEnrollment.visible=1 AND course.visible=1
                  						  GROUP BY course.code; ");
  $stmt->execute(array($academicCode));
  return $stmt->fetch();

}

?>