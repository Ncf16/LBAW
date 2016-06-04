<?php
function updateEvaluation($evaluation,$date,$weight){

	global $conn;
	$stmt = $conn->prepare("UPDATE Evaluation SET evaluationdate=?, weight = ?
		summary=? WHERE evaluationid = ?");
	
	$stmt->execute(array($date,$weight,$evaluation));
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

function getEvaluationType($evaluation){

	global $conn;
	$stmt = $conn->prepare("SELECT evaluationtype FROM Evaluation
		WHERE evaluationid= ? AND visible=1");

	$stmt->execute(array($evaluation));
	return $stmt->fetch();
}

function countEvaluations($uco){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) FROM Evaluation
		WHERE cuoccurrenceid = ? AND visible=1");

	$stmt->execute(array($uco));
	return $stmt->fetch();
}

function getTest($test){

	global $conn;
	$stmt = $conn->prepare("SELECT duration, evaluationtype, weight, evaluationdate, Curricularunit.name, Syllabus.calendaryear
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
	$stmt = $conn->prepare("SELECT duration, evaluationtype, weight, evaluationdate, Curricularunit.name, Syllabus.calendaryear
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
	$stmt = $conn->prepare("SELECT minelements, maxelements, evaluationtype, weight, evaluationdate, Curricularunit.name, Syllabus.calendaryear
		FROM GroupWork, Evaluation, CurricularUnit, CurricularUnitOccurrence, Syllabus
		WHERE GroupWork.evaluationid = Evaluation.evaluationid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Evaluation.evaluationid = ? AND Evaluation.visible=1");

	$stmt->execute(array($groupWork));
	return $stmt->fetch();
}

function getExams($nbEvaluations,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT evaluationtype, weight, evaluationdate, Curricularunit.name
		FROM Evaluation, CurricularUnit, CurricularUnitOccurrence
		WHERE Evaluation.cuoccurrenceid = CurricularUnitOccurrence.cuoccurrenceid AND
		CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
		Evaluation.visible=1 LIMIT ? OFFSET ?");

	$stmt->execute(array($nbEvaluations,$offset));
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
?>