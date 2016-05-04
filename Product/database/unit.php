<?php

function getAreaID($area){
	global $conn;
	$stmt = $conn->prepare("SELECT areaid
		FROM Area WHERE area=? AND visible=1");
	
	$stmt->execute(array($area));
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
		WHERE CurricularUnit.areaid = area.areaid AND CurricularUnit.visible=1
		LIMIT ? OFFSET ?");

	$stmt->execute(array($nbItems,$offset));
	return $stmt->fetchAll();
}

function getUnit($id){
	global $conn;
	$stmt = $conn->prepare("SELECT curricularID, name, area, credits
		FROM CurricularUnit, Area
		WHERE CurricularUnit.areaid = area.areaid AND CurricularUnit.visible=1 AND CurricularUnit.curricularID = ?");

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
?>