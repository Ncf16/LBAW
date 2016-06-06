<?php
/*
CREATE TABLE IF NOT EXISTS Area(
areaID SERIAL PRIMARY KEY,
area VARCHAR(64) NOT NULL UNIQUE,
visible INTEGER DEFAULT 1
);
*/
function createArea($area){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO Area(area)
		VALUES(?) RETURNING areaid");

	$stmt->execute(array($area));
	return $stmt->fetch();
}

function updateArea($areaid,$area){
	global $conn;
	$stmt = $conn->prepare("UPDATE Area SET area=?
		WHERE areaid=?");

	$stmt->execute(array($area,$areaid));
}

function deleteArea($area){
	global $conn;
	$stmt = $conn->prepare("UPDATE Area SET visible=0
		WHERE areaid =?");

	$stmt->execute(array($area));
	return "Success";
}

function getAreaID($area){
	global $conn;
	$stmt = $conn->prepare("SELECT areaid
		FROM Area WHERE area=? AND visible=1");
	
	$stmt->execute(array($area));
	return $stmt->fetch();
}

function countAreas(){
	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) AS total
		FROM Area WHERE visible=1");

	$stmt->execute();
	return $stmt->fetch();
}

function getAreas(){
	global $conn;
    $stmt = $conn->prepare("SELECT area
    	FROM Area WHERE visible=1");
    
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAreasList($nbAreas,$offset){
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM Area
		WHERE visible=1 LIMIT ? OFFSET ?");

	$stmt->execute(array($nbAreas,$offset));
	return $stmt->fetchall();
}
?>