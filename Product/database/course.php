<?php

  function getAllActiveCourseList() {
    global $conn;
    $stmt = $conn->prepare("SELECT course.name AS courseName,course.description,course.creationDate,person.name AS diretorName,COUNT(CourseEnrollment.studentcode),course.courseType,course.code,
    	course.abbreviation,course.teachercode
								FROM  CourseEnrollment, course, person 
                WHERE CourseEnrollment.courseid = course.code AND CourseEnrollment.finishyear IS NULL    AND course.teachercode = person.academiccode 
  										AND course.visible=1 AND person.visible=1 AND CourseEnrollment.visible=1
  										GROUP BY course.code,person.name;");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getVisibleCourses(){
    global $conn;
    $stmt = $conn->prepare("SELECT course.*, person.name as directorname, person.username as directorUsername
                            FROM course, person
                            WHERE course.teachercode = person.academiccode
                            AND course.visible=1
                            ORDER BY course.name;");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getCourseInfo($courseCode){
    global $conn;
    $stmt = $conn->prepare("SELECT course.*, person.name as director, person.username as directorUsername
                            FROM course, person
                            WHERE course.teachercode = person.academiccode
                            AND course.code = ?
                            AND course.visible=1");
    $stmt->execute(array($courseCode));
    return $stmt->fetch();
  }

?>
