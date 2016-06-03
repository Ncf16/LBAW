<?php
/*
CREATE TABLE IF NOT EXISTS Course(
code SERIAL PRIMARY KEY,
abbreviation VARCHAR(5),
teacherCode INTEGER REFERENCES Person(academicCode),
courseType CourseType,
name VARCHAR(128) NOT NULL UNIQUE,
creationDate DATE NOT NULL DEFAULT CURRENT_DATE,
currentCalendarYear INTEGER NOT NULL,
description TEXT,
visible INTEGER DEFAULT 1,
tsv tsvector,
CHECK (EXTRACT(YEAR FROM creationDate) <= currentCalendarYear AND currentCalendarYear >= 1990)
);
*/

function createCourse($abbreviation, $regentCode, $courseType, $name, $creationDate, $currentCalendarYear, $description)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO COURSE(abbreviation,teachercode,courseType,name,creationDate,currentCalendarYear,description) VALUES(?,?,?,?,?,?,?) RETURNING code");
    try {
        $res = $stmt->execute(array($abbreviation, $regentCode, $courseType, $name, $creationDate, $currentCalendarYear, $description));
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
        return "false " . $e->getMessage();
    }
    $search = $conn->prepare("SELECT code FROM COURSE WHERE name=? AND courseType=? AND teachercode=? AND abbreviation=?");
    $search->execute(array(
        $name,
        $courseType,
        $regentCode,
        $abbreviation
    ));
    $code = $search->fetchAll();

    echo("true " . $code[0]['code']);

}

function updateCourse($code, $abbreviation, $teacherCode, $courseType, $name, $creationDate, $currentCalendarYear, $description)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE Course SET abbreviation=?, teacherCode=?, courseType=?, name=?, creationDate=?, currentCalendarYear=?, description = ? WHERE code = ?");

    try {
        $res = $stmt->execute(array($abbreviation, $teacherCode, $courseType, $name, $creationDate, $currentCalendarYear, $description, $code));
    }catch (Exception $e)  {
        //echo 'Caught exception: ', $e->getMessage(), "\n";
        return "false " + $e->getMessage();
    }
    echo("true " . $code);
}

function deleteCourse($courseCode)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE Course SET visible= 0 WHERE code = '?'");

    $res = $stmt->execute(array(
        $courseCode
    ));
    echo $res;


}

function getAllActiveCourseList()
{
    global $conn;
    $stmt = $conn->prepare("SELECT course.*, person.name AS diretorName,COUNT(CourseEnrollment.studentcode),
   FROM  CourseEnrollment, course, person 
                WHERE CourseEnrollment.courseid = course.code AND CourseEnrollment.finishyear IS NULL    AND course.teachercode = person.academiccode 
                      AND course.visible=1 AND person.visible=1 AND CourseEnrollment.visible=1
                      GROUP BY course.code,person.name");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getVisibleCourses()
{
    global $conn;
    $stmt = $conn->prepare("SELECT course.*, person.name as directorname, person.username as directorUsername
                            FROM course, person
                            WHERE course.teachercode = person.academiccode
                            AND course.visible=1
                            ORDER BY course.name");
    $stmt->execute();
    return $stmt->fetchAll();

}

function getVisibleCoursesFromPage($coursesPerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT course.*, person.name as directorname, person.username as directorUsername
                            FROM course, person
                            WHERE course.teachercode = person.academiccode
                            AND course.visible=1
                            ORDER BY course.name
                            LIMIT ? OFFSET ?");
    $stmt->execute(array(
        $coursesPerPage,
        (($page - 1) * $coursesPerPage)
    ));
    return $stmt->fetchAll();
}

function getVisibleCoursesFromPageSearch($query, $coursesPerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM
                            (
                            SELECT course.*, person.name as directorname, person.username as directorUsername, course.tsv @@ to_tsquery(?) as found
                            FROM course, person
                            WHERE course.teachercode = person.academiccode
                            AND course.visible=1
                            ) as tsv_search
                            WHERE found = true
                            ORDER BY name
                            LIMIT ? OFFSET ?");
    $stmt->execute(array($query,
        $coursesPerPage,
        (($page - 1) * $coursesPerPage)
    ));
    return $stmt->fetchAll();
}


function countCourses()
{
    global $conn;
    $stmt = $conn->prepare("SELECT Count(code) as nrcourses
                            FROM Course
                            WHERE visible = 1");

    $stmt->execute();
    return $stmt->fetch();

}


function countCoursesQuery($query)
{
    global $conn;
    $stmt = $conn->prepare("SELECT Count(code) as nrcourses
                            FROM (
                              SELECT code, tsv @@ to_tsquery(?) as found 
                              FROM Course
                              Where visible = 1
                            ) as tsv_search
                            WHERE found = true");

    $stmt->execute(array($query));
    return $stmt->fetch();

}

function getCourseInfo($courseCode)
{
    global $conn;
    $stmt = $conn->prepare("SELECT course.*, person.name as director, person.username as directorUsername, COUNT(CourseEnrollment.studentcode) AS studentcount
                            FROM course, person, courseenrollment
                            WHERE course.code = courseenrollment.courseid
                            AND course.teachercode = person.academiccode
                            AND course.code = ?
                            AND course.visible=1 AND person.visible=1 AND CourseEnrollment.visible=1
                            GROUP BY course.code, person.name, person.username");
    $stmt->execute(array(
        $courseCode
    ));
    $result = $stmt->fetch();

    if ($result['coursetype'] !== false) {
        $result['courseYears'] = courseTypeToYears($result['coursetype']);
    } else
        $result['courseYears'] = 0;
    return $result;
}


function getCourseInfoView($courseCode)
{
    global $conn;
    $stmt = $conn->prepare("SELECT course.* ,person.name as director, person.username as directorUsername
                            FROM course  , person
                            WHERE course.code = ?
                            AND  course.teachercode = person.academiccode
                            AND course.visible=1  AND person.visible=1 ");
    $stmt->execute(array($courseCode));
    $result = $stmt->fetch();

    $stmt = $conn->prepare("SELECT course.*,  COUNT(CourseEnrollment.studentcode) AS studentcount
                            FROM course, courseenrollment
                            WHERE course.code = courseenrollment.courseid
                            AND course.code = ?
                            AND course.visible=1   AND CourseEnrollment.visible=1
                            GROUP BY course.code");
    $stmt->execute(array($courseCode));
    $nStudents = $stmt->fetch();

    if ($nStudents !== false) {
        $result['studentcount'] = $nStudents['studentcount'];
    } else
        $result['studentcount'] = 0;

    if ($result['coursetype'] !== false) {
        $result['courseYears'] = courseTypeToYears($result['coursetype']);
    } else
        $result['courseYears'] = 0;
    return $result;
}

function getCourseUnits($courseCode, $year)
{
    global $conn;
    $stmt = $conn->prepare("SELECT curricularunitoccurrence.*, curricularunit.*, course.coursetype
                            FROM course, syllabus, curricularunitoccurrence, curricularunit
                            WHERE course.code = ?
                            AND syllabus.calendaryear = ?
                            AND course.code = syllabus.coursecode
                            AND curricularunitoccurrence.syllabusid = syllabus.syllabusid
                            AND curricularunitoccurrence.curricularunitid = curricularunit.curricularid");

    // The "syllabus.calendaryear = course.currentcalendaryear" condition gets the units for the current year (2016, for instance)

    $stmt->execute(array(
        $courseCode,
        $year
    ));
    return $stmt->fetchAll();
}

/*/
/* DEPRECATED, AT THE MOMENT IS NOT USED
/*/

function getCourseYears($courseCode)
{
    global $conn;
    $stmt = $conn->prepare("SELECT courseType
                            FROM course
                            WHERE code = ?");
    $stmt->execute(array(
        $courseCode
    ));
    $years = $stmt->fetch();

    // return $years;

    if ($years['coursetype'] !== false)
        return courseTypeToYears($years['coursetype']);
    else
        return 0;
}

function courseTypeToYears($type)
{
    switch ($type) {
        case 'PhD':
            return 5;
        case 'Masters':
            return 5;
        case 'Bachelor':
            return 3;
    }
}

function getSyllabusYears($courseCode)
{
    global $conn;
    $stmt = $conn->prepare("SELECT Distinct(syllabus.calendarYear) as year
                            FROM course, syllabus, curricularunitoccurrence, curricularunit
                            WHERE course.code = ?
                            AND course.code = syllabus.coursecode
                            AND curricularunitoccurrence.syllabusid = syllabus.syllabusid
                            AND curricularunitoccurrence.curricularunitid = curricularunit.curricularid
                            ORDER BY year DESC");
    $stmt->execute(array(
        $courseCode
    ));
    return $stmt->fetchAll();
}

function convertTypeToInt($type)
{
    switch ($type) {
        case "Bachelor":
            return 1;
        case "Masters":
            return 2;
        case "PhD":
            return 3;
        default:
            return -1;
    }
}

function getCourseIDByName($courseName)
{
    global $conn;
    $stmt = $conn->prepare("SELECT code
        FROM Course WHERE name=? AND visible=1");

    $stmt->execute(array($courseName));
    return $stmt->fetch();
}

function getCourses()
{
    global $conn;
    $stmt = $conn->prepare("SELECT name FROM Course WHERE visible=1");

    $stmt->execute();
    return $stmt->fetchAll();
}

function isCourseDirector($course,$regent){
       global $conn;
    $stmt = $conn->prepare("SELECT * FROM Course WHERE code = ?  AND teacherCode = ? AND visible=1");
    
    $stmt->execute(array($course,$regent));
    $return = $stmt->fetchAll();
    if($return == false)
        return false;
    else
        return true;
}
?>
