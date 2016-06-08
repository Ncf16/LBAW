<?php
function createGrade($student,$evaluation,$grade){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO Grade(studentcode, evaluationid, grade)
    VALUES (?, ?, ?)");

    $stmt->execute(array($student,$evaluation,$grade));
}

function updateGrade($student,$evaluation,$grade){

	global $conn;
	$stmt = $conn->prepare("UPDATE Grade SET grade=?
		WHERE studentcode = ? AND evaluationid = ? RETURNING grade");
	
	$stmt->execute(array($grade,$student,$evaluation));
	return $stmt->fetch();
}

function countEvaluations(){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) AS total FROM Grade WHERE visible=1");

	$stmt->execute(array($evaluation));
	return $stmt->fetch();
}

function countEvaluationGrades($evaluation){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) AS total FROM Grade
		WHERE evaluationid = ? AND visible=1");

	$stmt->execute(array($evaluation));
	return $stmt->fetch();
}

//Not working I think,
//Trigger para serem só estudantes a serem adecionados 
function countStudentUCOGrades($student,$uco){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(Grade.*) AS total
		FROM Grade,Evaluation
		WHERE Grade.studentcode = ? AND Grade.evaluationid = Evaluation.evaluationid
		AND Evaluation.cuoccurrenceid = ? AND Evaluation.visible=1 AND Grade.visible=1");

	$stmt->execute(array($student,$uco));
	return $stmt->fetch();
}

//Vazia why?
function getGrade($student,$evaluation){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Grade.grade, Evaluation.evaluationdate, Curricularunit.name AS unit
		FROM Grade,Person,Evaluation,CurricularUnitOccurrence,CurricularUnit
		WHERE Grade.evaluationid = Evaluation.evaluationid AND Person.academiccode = Grade.studentcode AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Grade.studentCode = ? AND Evaluation.evaluationid = ? AND
		Grade.visible = 1 AND Evaluation.visible=1 AND Person.visible=1 AND CurricularUnit.visible=1");

	$stmt->execute(array($student,$evaluation));
	return $stmt->fetch();
}

function getGrades($nbEvaluations,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Grade.grade, Evaluation.evaluationdate, Curricularunit.name AS unit
		FROM Grade,Person,Evaluation,CurricularUnitOccurrence,CurricularUnit
		WHERE Grade.evaluationid = Evaluation.evaluationid AND Person.academiccode = Grade.studentcode AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid  AND
		Grade.visible = 1 AND Evaluation.visible=1 AND Person.visible=1 AND CurricularUnit.visible=1
		 AND CurricularUnitOccurrence.visible=1 ORDER BY CurricularUnit.name, Person.name LIMIT ? OFFSET ?");

	$stmt->execute(array($nbEvaluations,$offset));
	return $stmt->fetchAll();
}

function getEvaluationGrades($evaluation,$nbEvaluations,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Person.academiccode, Grade.grade,
		Evaluation.evaluationid, Evaluation.evaluationdate, Curricularunit.name AS unit
		FROM Grade,Person,Evaluation,CurricularUnitOccurrence,CurricularUnit
		WHERE Grade.evaluationid = Evaluation.evaluationid AND Person.academiccode = Grade.studentcode AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Evaluation.evaluationid = ?  AND Grade.visible = 1 AND Evaluation.visible=1 AND Person.visible=1
		 AND CurricularUnit.visible=1 AND CurricularUnitOccurrence.visible=1 ORDER BY Person.name LIMIT ? OFFSET ?");

	$stmt->execute(array($evaluation,$nbEvaluations,$offset));
	return $stmt->fetchAll();
}

function getStudentUCOGrades($student,$uco,$nbAttendances,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.name, Person.username, Person.academiccode, Grade.grade,
		Evaluation.evaluationid, Evaluation.evaluationdate, Curricularunit.name AS unit
		FROM Grade,Person,Evaluation,CurricularUnitOccurrence,CurricularUnit
		WHERE Grade.evaluationid = Evaluation.evaluationid AND Person.academiccode = Grade.studentcode AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Grade.studentCode = ? AND Evaluation.cuoccurrenceid = ? AND
		Grade.visible = 1 AND Evaluation.visible=1 AND Person.visible=1
		 AND CurricularUnit.visible=1 AND CurricularUnitOccurrence.visible=1 ORDER BY Evaluation.evaluationdate LIMIT ? OFFSET ?");

	$stmt->execute(array($student,$uco,$nbAttendances,$offset));
	return $stmt->fetchAll();
}

function deleteGrade($studentCode,$evaluation){
 	global $conn;
    $stmt = $conn->prepare("UPDATE Grade SET visible=0
    	WHERE studentcode = ? AND evaluationid = ?");	
    $stmt->execute(array($studentCode,$evaluation));
    return "Success";
}
//Or All é só apagar CurricularUnit.curricularID = ?

function getGradesStudentByCUO($studentcode,$year,$CUO){

	global $conn;
	$stmt = $conn->prepare("SELECT Person.academiccode,CurricularUnit.curricularid,CurricularUnitOccurrence.cuoccurrenceid,CurricularUnit.name,Evaluation.evaluationid,
		Grade.grade*Evaluation.weight/100.0 AS evalGrade
		FROM Grade,Evaluation,Person,CourseEnrollment,Syllabus,CurricularUnitOccurrence,CurricularUnit,CurricularEnrollment
		WHERE Grade.studentcode = ? AND Grade.grade IS NOT NULL 
		AND Person.academiccode = Grade.studentcode AND  CourseEnrollment.studentCode= Grade.studentcode 
		AND Grade.evaluationid = Evaluation.evaluationid AND Syllabus.courseCode = CourseEnrollment.courseID AND Syllabus.calendarYear = ? 
		AND CurricularUnitOccurrence.syllabusID = Syllabus.syllabusID AND Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuOccurrenceID 
	    AND CurricularEnrollment.studentCode  = Grade.studentcode AND CurricularUnitOccurrence.cuOccurrenceID = ? AND 
	    CurricularUnitOccurrence.curricularUnitID = CurricularUnit.curricularID AND CurricularEnrollment.cuOccurrenceID = CurricularUnitOccurrence.cuOccurrenceID 
	    AND Evaluation.visible=1 AND Grade.visible=1 AND Person.visible = 1 AND CourseEnrollment.visible = 1 AND Syllabus.visible = 1 AND CurricularUnitOccurrence.visible = 1 
	    AND CurricularUnit.visible = 1 AND CurricularEnrollment.visible=1;");
		$stmt->execute(array($studentcode,$year,$CUO));

/*
Grade -> Person
Grade -> Evalution
Syllabus -> CourseEnroll
CourseEnroll -> Person
Syllabus -> CUO
Evaluation -> CUO
CUO -> CU
CUE -> CUO
*/
	return $stmt->fetchAll();
}
?>