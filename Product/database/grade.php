<?php

function listGrades($evaluationID,$limit,$offset){
global $conn;
    $stmt = $conn->prepare("SELECT Person.name, Grade.grade FROM Person, Grade, EvaluationID WHERE Grade.evaluationID = ? AND Grade.evaluationID = EvaluationID 
    	AND Grade.visible = 1 AND EvaluationID.visible=1 LIMIT ? OFFSET ?; "); 
     $stmt->execute(array($evaluationID,$limit,$offset));
    return  $stmt->fetchAll();
}
}

function deleteGrade($evaluationID,$studentCode){
	global $conn;
 $stmt = $conn->prepare("UPDATE Grade SET visible=0 WHERE evaluationID= ? AND studentCode= ?");
      $stmt->execute(array($evaluationID,$studentCode));
}
?>