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

function deleteCourseEnrollment($academiccode,$course){
	 global $conn;

 $stmt = $conn->prepare("UPDATE Courseenrollment SET visible =  0 
							WHERE   Courseenrollment.studentcode = ?
								AND Courseenrollment.courseid = ? AND  CourseEnrollment.visible = 1  RETURNING visible; ");
  $stmt->execute(array($academiccode,$course));
  return $stmt->fetch();
}

function createCourseEnrollment($academiccode,$course,$startYear,$finishYear,$curricularYear){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO Courseenrollment(courseID, studentCode, startYear, finishYear, curricularYear)
    VALUES (?, ?, ?, ?, ?) RETURNING courseID, studentCode");

    $stmt->execute(array($course,$academiccode,$startYear,$finishYear,$curricularYear));
	return $stmt->fetch();
	 
}
function isInactive($academiccode,$course){

	 global $conn;

 $stmt = $conn->prepare("SELECT * FROM Courseenrollment	WHERE   Courseenrollment.studentcode = ?
								AND Courseenrollment.courseid = ? AND  CourseEnrollment.visible = 0; ");
  $stmt->execute(array($academicCode,$course));
  $value=$stmt->fetch() ;
  var_dump($value);
  if(  $value !== false)
  	return false;
  else
  	return true;
}
function restartEnrollment($academiccode,$oldCourse,$newCourse,$startYear,$finishYear,$curricularYear){

	 global $conn;
	 $conn->beginTransaction();
	 $returnUpdate = deleteCourseEnrollment($academiccode,$oldCourse);
	if($returnUpdate['visible'] == 0){
	 $stmt = $conn->prepare("UPDATE Courseenrollment SET visible =  1, startYear = ?, finishYear = ?, curricularYear = ?
							WHERE  Courseenrollment.studentcode = ?
								AND Courseenrollment.courseid = ? RETURNING courseid,studentcode ");

  	 $stmt->execute(array($startYear,$finishYear,$curricularYear,$academiccode,$newCourse));
  	 $returnCreate=$stmt->fetch();
  	if( $returnCreate['studentcode'] == $academiccode && $returnCreate['courseid'] == $newCourse ){
		$conn->commit();
		return "true";
		}
  }

  $conn->rollBack();
 return "false";

}
function replaceCourseEnrollment($academiccode,$oldCourse,$newCourse,$startYear,$finishYear,$curricularYear){

	global $conn;
	$conn->beginTransaction();
	$returnUpdate = deleteCourseEnrollment($academiccode,$oldCourse);
	if($returnUpdate['visible'] == 0){
		 
		$returnCreate = createCourseEnrollment($academiccode,$newCourse,$startYear,$finishYear,$curricularYear);

		if( $returnCreate['studentcode'] == $academiccode && $returnCreate['courseid'] == $newCourse ){
		$conn->commit();
		return "true";
		}
	}
	var_dump($returnUpdate);
	var_dump($returnCreate);
		$conn->rollBack();
		return "false";
}

?>