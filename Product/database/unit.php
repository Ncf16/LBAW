<?php

function getAreaID($area){
	global $conn;
	$stmt = $conn->prepare("SELECT areaid
		FROM Area WHERE area=?");
	
	$stmt->execute(array($area));
	return $stmt->fetch();
}

function getAreas(){
	global $conn;
    $stmt = $conn->prepare("SELECT area
                            FROM Area");
    
    $stmt->execute();
    return $stmt->fetchAll();
}

function createUnit($name,$area,$credits){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO CurricularUnit(name,areaid,credits)
		VALUES(?,?,?)");
	
	$stmt->execute(array($name,$area,$credits));
}

function countUnits(){
	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) total FROM CurricularUnit");

	$stmt->execute();
	return $stmt->fetch();
}

function getUnits($nbItems,$offset){
	global $conn;
	$stmt = $conn->prepare("SELECT curricularID, name, area, credits
		FROM CurricularUnit, Area
		WHERE CurricularUnit.areaid = area.areaid
		LIMIT ? OFFSET ?");

	$stmt->execute(array($nbItems,$offset));
	return $stmt->fetchAll();
}
?>