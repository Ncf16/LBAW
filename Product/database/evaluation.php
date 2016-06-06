<?php
function updateEvaluation($evaluation,$date,$weight){

	global $conn;
	$stmt = $conn->prepare("UPDATE Evaluation SET evaluationdate=?, weight = ?
		summary=? WHERE evaluationid = ?");
	
	$stmt->execute(array($date,$weight,$evaluation));
}

function getEvaluationTypes(){
	global $conn;
	$stmt = $conn->prepare("SELECT  unnest(enum_range(NULL::evaluationtype));");
	$stmt->execute(array());
	return $stmt->fetchAll();

}
function getEvaluationType($id){
	global $conn;
	$stmt = $conn->prepare("SELECT evaluationtype FROM Evaluation
		WHERE evaluationid = ? AND visible=1");

	$stmt->execute(array($id));
	return $stmt->fetch();

}

function createExam($duration,$uco,$date,$weight){

	global $conn;
	$conn->beginTransaction();
	$stmt = $conn->prepare("INSERT INTO Evaluation(cuoccurrenceid, evaluationdate, weight, evaluationtype)
	VALUES(?,?,?,'Exam') RETURNING evaluationid");
	$stmt->execute(array($uco,$date,$weight));
	$examID = $stmt->fetch();
	if(isset($examID)){
		$examID = intval($examID['evaluationid']);
		if($examID > 0){
			$stmt = $conn->prepare("INSERT INTO Exam(evaluationid,duration)
				VALUES(?,?)");

			$stmt->execute(array($examID,$duration));
			$conn->commit();
			return $examID;
		}
	}
	$conn->rollBack();
	return false;
}

function createTest($duration,$uco,$date,$weight){

	global $conn;
	$conn->beginTransaction();
	$stmt = $conn->prepare("INSERT INTO Evaluation(cuoccurrenceid, evaluationdate, weight, evaluationtype)
	VALUES(?,?,?,'Test') RETURNING evaluationid");
 
	$stmt->execute(array($uco,$date,$weight));
	$examID = $stmt->fetch();
	if(isset($examID)){
		$examID = intval($examID['evaluationid']);
		if($examID > 0){
			$stmt = $conn->prepare("INSERT INTO Test(evaluationid,duration)
				VALUES(?,?)");

			$stmt->execute(array($examID,$duration));
			$conn->commit();
			return $examID;
		}
	}
	$conn->rollBack();
	return false;
}

function createGroupWork($min,$max,$uco,$date,$weight){

	global $conn;
	$conn->beginTransaction();
	$stmt = $conn->prepare("INSERT INTO Evaluation(cuoccurrenceid, evaluationdate, weight, evaluationtype)
	VALUES(?,?,?,'GroupWork') RETURNING evaluationid");

	$stmt->execute(array($uco,$date,$weight));
	$examID = $stmt->fetch();
	if(isset($examID)){
		$examID = intval($examID['evaluationid']);
		if($examID > 0){
			$stmt = $conn->prepare("INSERT INTO GroupWork(evaluationid,minelements,maxelements)
				VALUES(?,?,?)");

			$stmt->execute(array($examID,$min,$max));
			$conn->commit();
			return $examID;
		}
	}
	$conn->rollBack();
	return false;
}


function countUCOEvaluations($uco){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) FROM Evaluation
		WHERE cuoccurrenceid = ? AND visible=1");

	$stmt->execute(array($uco));
	return $stmt->fetch();
}
function getEvaluationByID($id){
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM Evaluation WHERE evaluationid = ? AND visible=1");

	$stmt->execute(array($id));
	return $stmt->fetch();
}
function getTest($test){

	global $conn;
	$stmt = $conn->prepare("SELECT duration, evaluationtype, weight, Evaluation.evaluationdate::date AS day, Evaluation.evaluationdate::time AS time,
		Curricularunit.name, Syllabus.calendaryear, Evaluation.cuoccurrenceid
		FROM Test, Evaluation, CurricularUnit, CurricularUnitOccurrence, Syllabus
		WHERE Test.evaluationid = Evaluation.evaluationid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Evaluation.evaluationid = ? AND Evaluation.visible=1");

	$stmt->execute(array($test));
	return $stmt->fetch();
}

function getExam($exam){

	global $conn;
	$stmt = $conn->prepare("SELECT duration, evaluationtype, weight, Evaluation.evaluationdate::date AS day, Evaluation.evaluationdate::time AS time,
		Curricularunit.name, Syllabus.calendaryear, Evaluation.cuoccurrenceid
		FROM Exam, Evaluation, CurricularUnit, CurricularUnitOccurrence, Syllabus
		WHERE Exam.evaluationid = Evaluation.evaluationid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Evaluation.evaluationid = ? AND Evaluation.visible=1");

	$stmt->execute(array($exam));
	return $stmt->fetch();
}

function getGroupWork($groupWork){

	global $conn;
	$stmt = $conn->prepare("SELECT minelements, maxelements, evaluationtype, weight, Evaluation.evaluationdate::date AS day, 
		Evaluation.evaluationdate::time AS time, Curricularunit.name, Syllabus.calendaryear, Evaluation.cuoccurrenceid
		FROM GroupWork, Evaluation, CurricularUnit, CurricularUnitOccurrence, Syllabus
		WHERE GroupWork.evaluationid = Evaluation.evaluationid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Evaluation.evaluationid = ? AND Evaluation.visible=1");

	$stmt->execute(array($groupWork));
	return $stmt->fetch();
}

function getUCOEvaluations($uco){

	global $conn;
	$stmt = $conn->prepare("SELECT Evaluation.*
		FROM Evaluation
		WHERE Evaluation.cuoccurrenceid = ? AND Evaluation.visible=1 ORDER BY evaluationdate");

	$stmt->execute(array($uco));
	return $stmt->fetchAll();
}

function getStudentEvaluations($student){

	global $conn;
	$stmt = $conn->prepare("SELECT Evaluation.*, Curricularunit.name
		FROM Evaluation, CurricularEnrollment, CurricularUnitOccurrence, Curricularunit
		WHERE Evaluation.cuoccurrenceid = CurricularEnrollment.cuoccurrenceid AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		CurricularEnrollment.studentcode = ? AND Evaluation.visible=1 ORDER BY evaluationdate");

	$stmt->execute(array($student));
	return $stmt->fetchAll();
}

function deleteTest($test){
	global $conn;
	$conn->beginTransaction();
	$stmt = $conn->prepare("UPDATE Test SET visible=0
		WHERE evaluationid =?");

	$count = $stm->execute(array($test));
	if($count > 0){
		$conn->prepare("UPDATE Evaluation SET visible=0
			WHERE evaluationid=?");
		$stmt->execute(array($test));
		$conn->commit();
		return;
	}

	$conn->rollBack();
}

function deleteExam($exam){
	global $conn;
	$conn->beginTransaction();
	$stmt = $conn->prepare("UPDATE Exam SET visible=0
		WHERE evaluationid =?");

	$count = $stm->execute(array($exam));
	if($count > 0){
		$conn->prepare("UPDATE Evaluation SET visible=0
			WHERE evaluationid=?");
		$stmt->execute(array($exam));
		$conn->commit();
		return;
	}

	$conn->rollBack();
}

function deleteGroupWork($groupWork){
	global $conn;
	$conn->beginTransaction();
	$stmt = $conn->prepare("UPDATE GroupWork SET visible=0
		WHERE evaluationid =?");

	$count = $stm->execute(array($groupWork));
	if($count > 0){
		$conn->prepare("UPDATE Evaluation SET visible=0
			WHERE evaluationid=?");
		$stmt->execute(array($groupWork));
		$conn->commit();
		return;
	}

	$conn->rollBack();
}

function getEvaluation($evaluationID,$cuoID){
		global $conn;
	$stmt = $conn->prepare("SELECT Evaluation.*
		FROM Evaluation, CurricularUnit, CurricularUnitOccurrence
		WHERE Evaluation.evaluationid = ? AND	 Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid
		 AND CurricularUnitOccurrence.cuoccurrenceid = ? AND CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND 
		 		Evaluation.visible=1 AND CurricularUnitOccurrence.visible = 1 AND CurricularUnit.visible=1; ");

	$stmt->execute(array($evaluationID,$cuoID));
	return $stmt->fetch();
}

function getTestSimple($test){

	global $conn;
	$stmt = $conn->prepare("SELECT Test.*
		FROM Test ,Evaluation
		WHERE Test.evaluationid =  ? AND Evaluation.evaluationid = Test.evaluationid AND Evaluation.visible=1 AND Test.visible=1");

	$stmt->execute(array($test));
	return $stmt->fetch();
}

function getExamSimple($exam){

	global $conn;
	$stmt = $conn->prepare("SELECT Exam.*
		FROM Exam ,Evaluation
		WHERE Exam.evaluationid =  ? AND Evaluation.evaluationid = Exam.evaluationid AND Evaluation.visible=1 AND Exam.visible=1");

	$stmt->execute(array($exam));
	return $stmt->fetch();
}

function getGroupWorkSimple($groupWork){

	global $conn;
	$stmt = $conn->prepare("SELECT GroupWork.*
		FROM GroupWork, Evaluation 
		WHERE GroupWork.evaluationid = ? AND  GroupWork.evaluationid = Evaluation.evaluationid AND GroupWork.visible=1 AND Evaluation.visible=1");

	$stmt->execute(array($groupWork));
	return $stmt->fetch();
}
function updateTest($evaluationID,$weight,$evaluationDate,$duration){
	global $conn;
	$conn->beginTransaction();
	$stmt = $conn->prepare("UPDATE Evaluation SET evaluationdate = ?::timestamp, weight = ?
		WHERE evaluationid =? RETURNING evaluationid;");

	 $stmt->execute(array($evaluationDate,$weight,$evaluationID));
	$evalID = $stmt->fetch();
	if(isset($evalID)){
	$stmt =	$conn->prepare("UPDATE Test SET duration = ?
			WHERE evaluationid = ? ;");
		$stmt->execute(array($duration,$evaluationID));
		$conn->commit();
		return $evalID['evaluationid'];
	}

	$conn->rollBack();
	return false;
}
function updateExam($evaluationID,$weight,$evaluationDate,$duration){
	global $conn;
	$conn->beginTransaction();
	$stmt = $conn->prepare("UPDATE Evaluation SET evaluationdate = ?::timestamp, weight = ?
		WHERE evaluationid = ?  RETURNING evaluationid;");

	 $stmt->execute(array($evaluationDate,$weight,$evaluationID));
	 $evalID = $stmt->fetch();
	if(isset($evalID)){
	$stmt =	$conn->prepare("UPDATE Exam SET duration = ?
			WHERE evaluationid = ? ;");
		$stmt->execute(array($duration,$evaluationID));
		$conn->commit();
		return $evalID['evaluationid'];
	}

	$conn->rollBack();
	return false;
}
function updateGroupWork($evaluationID,$weight,$evaluationDate,$minElement,$maxElements){
	global $conn;
	$conn->beginTransaction();
	 $stmt = $conn->prepare("UPDATE Evaluation SET evaluationdate = ?, weight = ?
		WHERE evaluationid = ?  RETURNING evaluationid;");

	  $stmt->execute(array($evaluationDate,$weight,$evaluationID)); 
	$evalID = $stmt->fetch();
	 if(isset($evalID)){
		$stmt=$conn->prepare("UPDATE GroupWork SET minelements = ?, maxelements = ?
			WHERE evaluationid = ?;");
		$stmt->execute(array($minElement,$maxElements,$evaluationID));
		$conn->commit();
		return $evalID['evaluationid'];
	 }
	$conn->rollBack();
	return false;
}

function getEvaluationUCO($evaluation){
	global $conn;
	$stmt = $conn->prepare("SELECT cuoccurrenceid FROM Evaluation WHERE evaluationid = ?");

	$stmt->execute(array($evaluation));
	return $stmt->fetch();
}

function hasTeacherEvaluationAccess($person,$evaluation){
	
	$uco = getEvaluationUCO($evaluation)['cuoccurrenceid'];
	if(isUCOCourseDirector($person,$uco))
		return true;
	else if(isUCORegent($person,$uco))
		return true;
	else return isUCOClassTeacher($person,$uco);
}

function hasStudentEvaluationAccess($person,$evaluation){
	
	$uco = getEvaluationUCO($evaluation)['cuoccurrenceid'];
	return hasStudentUCOAccess($person,$uco);
}
?>