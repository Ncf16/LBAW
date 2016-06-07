<?php

function countUnitUploads($occurrenceID){
	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(uploadid) as nruploads FROM curricularuploads 
							WHERE cuoccurrenceid = ?");

	$stmt->execute(array($occurrenceID));
	return $stmt->fetch();
}

function getUnitUploads($occurrenceID, $filesPerPage, $page)
{
	global $conn;
	$stmt = $conn->prepare("SELECT *
							FROM curricularuploads
							WHERE cuoccurrenceid = ?
                            LIMIT ? OFFSET ?;");
	try {
		$stmt->execute(array($occurrenceID, $filesPerPage, (($page - 1) * $filesPerPage)));
	}catch(Exception $e){
		return $e->getMessage();
	}
	return $stmt->fetchAll();
}

function deleteContentDB($contentID){

	global $conn;

	$stmt = $conn->prepare("DELETE FROM curricularuploads
							WHERE uploadid = ?");
	try {
		$stmt->execute(array($contentID));
	}catch(Exception $e){
		return array('error' => 'Database failed deleting.' . $e->getMessage());
	}

	return true;
}

function insertContentDB($cuOccurrenceID, $filepath, $filePresentationName){
	global $conn;

	$conn->beginTransaction();

	$stmt = $conn->prepare("INSERT INTO curricularuploads(cuoccurrenceid, filepath, filepresentationname)
							VALUES(?,?,?) RETURNING uploadid");
	try {
		$stmt->execute(array($cuOccurrenceID, $filepath, $filePresentationName));
		$result = $stmt->fetch();   //false if doesnt work
		if($result === false){
			$conn->rollBack();
			return array('error' => 'Error fetching uploadid');
		}else {
			$conn->commit();
			return $result;
		}
	}catch(Exception $e){
		return array('error' => 'Database failed inserting.' . $e->getMessage());
	}

}

function countUnitContents($cuOccurrenceID){
	global $conn;

	$stmt = $conn->prepare("SELECT count(uploadid) as nruploads
 							FROM curricularuploads
							WHERE cuoccurrenceid = ?");
	try {
		$stmt->execute(array($cuOccurrenceID));
		return $stmt->fetch();
	}catch(Exception $e){
		return $e->getMessage();
	}
}


?>