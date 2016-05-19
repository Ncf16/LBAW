<?php
/*
CREATE TABLE IF NOT EXISTS CurricularUnit(
curricularID SERIAL PRIMARY KEY,
name VARCHAR(64) NOT NULL UNIQUE,
areaID INTEGER REFERENCES Area(areaID),
credits INTEGER NOT NULL,
visible INTEGER DEFAULT 1,
tsv tsvector,
CHECK(credits > 0)
);
*/
function createUnit($name,$area,$credits){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO CurricularUnit(name,areaid,credits)
		VALUES(?,?,?) RETURNING curricularid");
	
	$stmt->execute(array($name,$area,$credits));
	return $stmt->fetch();
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

function getUnit($id){
	global $conn;
	$stmt = $conn->prepare("SELECT curricularID, name, area, credits
		FROM CurricularUnit, Area
		WHERE CurricularUnit.areaid = Area.areaid AND CurricularUnit.visible=1 AND CurricularUnit.curricularID = ?");

	$stmt->execute(array($id));
	return $stmt->fetch();
}

function getUnitID($unit){
	global $conn;
	$stmt = $conn->prepare("SELECT curricularid FROM CurricularUnit
		WHERE name=? AND visible=1");

	$stmt->execute(array($unit));
	return $stmt->fetch();
}

function getUnitsName(){
	global $conn;
	$stmt = $conn->prepare("SELECT name FROM CurricularUnit
		WHERE visible=1");

	$stmt->execute();
	return $stmt->fetchAll();
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