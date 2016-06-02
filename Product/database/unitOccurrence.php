<?php
 /*
CREATE TABLE IF NOT EXISTS CurricularUnitOccurrence(
cuOccurrenceID SERIAL PRIMARY KEY,
syllabusID INTEGER REFERENCES Syllabus(syllabusID),
curricularUnitID INTEGER REFERENCES CurricularUnit(curricularID),
teacherCode INTEGER REFERENCES Person(academicCode),
bibliography TEXT NOT NULL,
competences TEXT NOT NULL,
curricularSemester INTEGER NOT NULL,
curricularYear INTEGER NOT NULL,
evaluation TEXT NOT NULL,
externalPage VARCHAR(128) NOT NULL,
language Language,
programme TEXT NOT NULL,
requirements TEXT NOT NULL,
visible INTEGER DEFAULT 1,
CHECK(curricularSemester = 1 OR curricularSemester = 2),
CHECK(curricularYear > 0 AND curricularYear <=  8)
);
 
 */
function createUnitOccurrence($syllabus,$unit,$teacher,$bibliography,$competences,$curricularSemester,$curricularYear,
          $evaluations,$links,$language,$programme,$requirements){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO CurricularUnitOccurrence(syllabusid, curricularunitid, teachercode, bibliography, 
            competences, curricularsemester, curricularyear, evaluation, 
            externalpage, language, programme, requirements)
	VALUES (?, ?, ?, ?, 
            ?, ?, ?, ?, 
            ?, ?, ?, ?) RETURNING cuoccurrenceid");

	$stmt->execute(array($syllabus,$unit,$teacher,$bibliography,
		$competences,$curricularSemester,$curricularYear,$evaluations,
		$links,$language,$programme,$requirements));
	return $stmt->fetch();
}

function updateUnitOccurrence($uco,$syllabus,$unit,$teacher,$bibliography,$competences,$curricularSemester,$curricularYear,
          $evaluations,$links,$language,$programme,$requirements){
	global $conn;
	$stmt = $conn->prepare("UPDATE CurricularUnitOccurrence SET syllabusid=?, curricularunitid=?, teachercode=?, bibliography=?, 
            competences=?, curricularsemester=?, curricularyear=?, evaluation=?, 
            externalpage=?, language=?, programme=?, requirements=?
            WHERE cuoccurrenceid = ?");

	$stmt->execute(array($syllabus,$unit,$teacher,$bibliography,
		$competences,$curricularSemester,$curricularYear,$evaluations,
		$links,$language,$programme,$requirements,$uco));
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

function deleteUnitOccurrence($unit){

	global $conn;
	try{
		$conn->beginTransaction();

		$stmt = $conn->prepare("SELECT occurrenceid FROM Class
			WHERE occurrenceid = ? AND visible = 1 UNION
			SELECT cuoccurrenceid FROM Evaluation
			WHERE cuoccurrenceid = ? AND visible = 1 UNION
			SELECT cuoccurrenceid FROM CurricularEnrollment
			WHERE cuoccurrenceid = ? AND visible=1");

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

function isRegent($cuoID,$academiccode){
 
	global $conn;
	$stmt = $conn->prepare("SELECT curricularID
		FROM CurricularUnitOccurrence,Syllabus
		WHERE Syllabus.syllabusID = CurricularUnitOccurrence.syllabusID   AND CurricularUnitOccurrence.cuOccurrenceID = ? AND CurricularUnitOccurrence.teacherCode = ?
			 AND Syllabus.calendarYear = ? AND Syllabus.visible=1 AND  CurricularUnitOccurrence.visible=1 ");

	$stmt->execute(array($cuoID,$academiccode,date("Y")));
	 if($stmt->fetch()!= false)
	 	return true;
	 else
	 	return false;
}
?>