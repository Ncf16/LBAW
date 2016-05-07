<?php

function getAreaID($area){
	global $conn;
	$stmt = $conn->prepare("SELECT areaid
		FROM Area WHERE area=? AND visible=1");
	
	$stmt->execute(array($area));
	return $stmt->fetch();
}

function getCourseID($course){
	global $conn;
	$stmt = $conn->prepare("SELECT code
		FROM Course WHERE name=? AND visible=1");
	
	$stmt->execute(array($course));
	return $stmt->fetch();
}

function getAreas(){
	global $conn;
    $stmt = $conn->prepare("SELECT area
                            FROM Area WHERE visible=1");
    
    $stmt->execute();
    return $stmt->fetchAll();
}

function createUnit($name,$area,$credits){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO CurricularUnit(name,areaid,credits)
		VALUES(?,?,?)");
	
	$stmt->execute(array($name,$area,$credits));
}

function updateUnit($id,$name,$area,$credits){
	global $conn;
	$stmt = $conn->prepare("UPDATE CurricularUnit
		SET name =?,areaid=?,credits=? WHERE curricularid = ?");
	
	$stmt->execute(array($name,$area,$credits,$id));
}

function countUnits(){
	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) total FROM CurricularUnit WHERE visible=1");

	$stmt->execute();
	return $stmt->fetch();
}

function getUnits($nbItems,$offset){
	global $conn;
	$stmt = $conn->prepare("SELECT curricularID, name, area, credits
		FROM CurricularUnit, Area
		WHERE CurricularUnit.areaid = Area.areaid AND CurricularUnit.visible=1
		LIMIT ? OFFSET ?");

	$stmt->execute(array($nbItems,$offset));
	return $stmt->fetchAll();
}

function getUnit($id){
	global $conn;
	$stmt = $conn->prepare("SELECT curricularID, name, area, credits
		FROM CurricularUnit, Area
		WHERE CurricularUnit.areaid = Area.areaid AND CurricularUnit.visible=1 AND CurricularUnit.curricularID = ?");

	$stmt->execute(array($id));
	return $stmt->fetch();
}

function deleteUnit($unit){

	global $conn;
	try{
		$conn->beginTransaction();

		$stmt = $conn->prepare("SELECT * FROM CurricularUnitOccurrence
			WHERE curricularunitid = ? AND visible=1 LIMIT 1");

		$stmt->execute(array($unit));
		if($stmt->rowCount() == 0){
			$stmt = $conn->prepare("UPDATE CurricularUnit SET visible=0 WHERE curricularID=?");
			$stmt->execute(array($unit));
			$conn->commit();
			return "Success";
		}
		else return "Cannot delete unit, other entities depend on it";
	} catch (Exception $e) {
		$conn->rollBack();
		return "Failed: " . $e->getMessage();
	}
}

function deleteUnitOccurrence($unit){

	global $conn;
	try{
		$conn->beginTransaction();

		$stmt = $conn->prepare("SELECT occurrenceid FROM Class, Evaluation, CurricularEnrollment
			WHERE Class.occurrenceid = ? AND Class.visible = 1
			AND Evaluation.cuoccurrenceid = ? AND Evaluation.visible=1
			AND CurricularEnrollment.cuoccurrenceid = ? AND CurricularEnrollment.visible = 1");

		$stmt->execute(array($unit,$unit,$unit));
		if($stmt->rowCount() == 0){
			$stmt = $conn->prepare("UPDATE CurricularUnitOccurrence SET visible=0 WHERE cuoccurrenceid=?");
			$stmt->execute(array($unit));
			$conn->commit();
			return "Success";
		}
		else return "Cannot delete unit, other entities depend on it";
	} catch (Exception $e) {
		$conn->rollBack();
		return "Failed: " . $e->getMessage();
	}
}


function getUCO($id){
	global $conn;
	$stmt = $conn->prepare("SELECT CurricularUnit.name AS name, area, credits, Course.name AS course, Course.code AS courseid,
		Syllabus.calendarYear AS year, Person.username AS regent, Person.name AS regentName, CurricularUnitOccurrence.*
		FROM CurricularUnitOccurrence, CurricularUnit, Syllabus, Person, Course, Area
		WHERE cuoccurrenceid = ? AND CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid
		AND CurricularUnit.areaID = Area.areaid
		AND CurricularUnitOccurrence.teacherCode = Person.academiccode
		AND CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid
		AND Syllabus.coursecode = Course.code
		AND CurricularUnitOccurrence.visible=1");

	$stmt->execute(array($id));
	return $stmt->fetch();
}

function getUCOlist($nbItems,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT cuoccurrenceid, CurricularUnit.name, Course.name AS course, Syllabus.calendarYear AS year,
		CurricularUnitOccurrence.curricularsemester, CurricularUnitOccurrence.curricularyear
		FROM CurricularUnitOccurrence, CurricularUnit, Syllabus, Course
		WHERE CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid AND Syllabus.coursecode = Course.code
		AND CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid
		AND CurricularUnitOccurrence.visible=1 LIMIT ? OFFSET ?");

	$stmt->execute(array($nbItems,$offset));
	return $stmt->fetchAll();
}

function getUCOlistCourse($course,$nbItems,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT cuoccurrenceid, CurricularUnit.name, Course.name AS course, Syllabus.calendarYear AS year,
		CurricularUnitOccurrence.curricularsemester, CurricularUnitOccurrence.curricularyear
		FROM CurricularUnitOccurrence, CurricularUnit, Syllabus, Course
		WHERE CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid AND Syllabus.coursecode = Course.code
		AND CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND Course.code = ?
		AND CurricularUnitOccurrence.visible=1 LIMIT ? OFFSET ?");

	$stmt->execute(array($course,$nbItems,$offset));
	return $stmt->fetchAll();
}

function getUCOlistYear($course,$year,$nbItems,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT cuoccurrenceid, CurricularUnit.name, Course.name AS course, Syllabus.calendarYear AS year,
		CurricularUnitOccurrence.curricularsemester, CurricularUnitOccurrence.curricularyear
		FROM CurricularUnitOccurrence, CurricularUnit, Syllabus, Course
		WHERE CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid AND Syllabus.coursecode = Course.code
		AND Syllabus.calendarYear = ? AND CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid
		AND CurricularUnitOccurrence.visible=1 AND Course.code = ? LIMIT ? OFFSET ?");

	$stmt->execute(array($year,$course,$nbItems,$offset));
	return $stmt->fetchAll();
}

function getCourses(){
	global $conn;
	$stmt = $conn->prepare("SELECT name FROM Course WHERE visible=1");
	
	$stmt->execute();
    return $stmt->fetchAll();
}

function getYears(){
	global $conn;
	$stmt = $conn->prepare("SELECT DISTINCT(year) FROM Calendar WHERE visible=1");

	$stmt->execute();
	return $stmt->fetchAll();
}

function countUnitOccurrences(){
	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) total FROM CurricularUnitOccurrence WHERE visible=1");

	$stmt->execute();
	return $stmt->fetch();
}

function countUnitOccurrencesC($course){
	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(CurricularUnitOccurrence.*) total FROM CurricularUnitOccurrence, Syllabus
		WHERE CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid AND Syllabus.coursecode = ?
		AND CurricularUnitOccurrence.visible=1");

	$stmt->execute(array($course));
	return $stmt->fetch();
}

function countUnitOccurrencesCY($course,$year){
	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(CurricularUnitOccurrence.*) total FROM CurricularUnitOccurrence, Syllabus
		WHERE CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid AND Syllabus.coursecode = ?
		AND Syllabus.calendarYear = ? AND CurricularUnitOccurrence.visible=1");

	$stmt->execute(array($course,$year));
	return $stmt->fetch();
}
?>