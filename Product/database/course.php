<?php

  function getAllActiveCourseList() {
    global $conn;
    $stmt = $conn->prepare("SELECT course.*, person.name AS diretorName,COUNT(CourseEnrollment.studentcode),
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
    $stmt = $conn->prepare("SELECT course.*, person.name as director, person.username as directorUsername, COUNT(CourseEnrollment.studentcode) AS studentcount
                            FROM course, person, courseenrollment
                            WHERE course.code = courseenrollment.courseid
                            AND course.teachercode = person.academiccode
                            AND course.code = ?
                            AND course.visible=1 AND person.visible=1 AND CourseEnrollment.visible=1
                            GROUP BY course.code, person.name, person.username;");
    $stmt->execute(array($courseCode));

    $result = $stmt->fetch();

    if ($result['coursetype'] !== false){
      switch ($result['coursetype']) {
    
    case 'PhD':
        $result['courseYears'] = 5;
        break;
    case 'Masters':
       $result['courseYears'] = 5;
        break;
    case 'Bachelor':
        $result['courseYears'] = 3;
        break;
    default:
      $result['courseYears'] = 0;
      break;
      }
    }else{
      $result['courseYears'] = 0;
    }

    return $result;
    
  }

  function getCourseUnits($courseCode, $year){
    global $conn; 
    $stmt = $conn->prepare("SELECT curricularunitoccurrence.*, curricularunit.*, course.coursetype
                            FROM course, syllabus, curricularunitoccurrence, curricularunit
                            WHERE course.code = ?
                            AND syllabus.calendaryear = ?
                            AND course.code = syllabus.coursecode
                            AND curricularunitoccurrence.syllabusid = syllabus.syllabusid
                            AND curricularunitoccurrence.curricularunitid = curricularunit.curricularid");
    // The "syllabus.calendaryear = course.currentcalendaryear" condition gets the units for the current year (2016, for instance)

    $stmt->execute(array($courseCode, $year));

    return $stmt->fetchAll();
  }


  /*/
  /* DEPRECATED, AT THE MOMENT IS NOT USED
  /*/
  function getCourseYears($courseCode){
    global $conn;
    $stmt = $conn->prepare("SELECT courseType
                            FROM course
                            WHERE code = ?");
    $stmt->execute(array($courseCode));
    $years = $stmt->fetch();
   //return $years;

    if ($years['coursetype'] !== false)
      switch ($years['coursetype']) {
    case 'PhD':
        return 5;
        break;
    case 'Masters':
        return 5;
        break;
    case 'Bachelor':
        return 3;
        break;
    }
    else
      return 0;
  }

  function getSyllabusYears($courseCode){
    global $conn;
    $stmt = $conn->prepare("SELECT Distinct(syllabus.calendarYear) as year
                            FROM course, syllabus, curricularunitoccurrence, curricularunit
                            WHERE course.code = ?
                            AND course.code = syllabus.coursecode
                            AND curricularunitoccurrence.syllabusid = syllabus.syllabusid
                            AND curricularunitoccurrence.curricularunitid = curricularunit.curricularid;");
    $stmt->execute(array($courseCode));
    return $stmt->fetchAll();
  }
?>
