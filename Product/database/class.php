<?php
/*
CREATE TABLE IF NOT EXISTS Class(
classID SERIAL PRIMARY KEY,
occurrenceID INTEGER REFERENCES CurricularUnitOccurrence(cuOccurrenceID), 
teacherCode INTEGER REFERENCES Person(academicCode),
duration INTEGER NOT NULL, 
roomID INTEGER REFERENCES Room(roomID),
classDate TIMESTAMP NOT NULL, 
summary TEXT,
visible INTEGER DEFAULT 1,
CHECK(duration > 0)
);
*/
function createClass($uco,$teacher,$duration,$room,$classDate,$summary){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO Class(occurrenceid, teachercode, duration, roomid, classdate, summary)
    VALUES (?, ?, ?, ?, ?, ? RETURNING classid");

    $stmt->execute(array($uco,$teacher,$duration,$room,$classDate,$summary));
	return $stmt->fetch();
}

function updateClass($class,$uco,$teacher,$duration,$room,$classDate,$summary){

	global $conn;
	$stmt = $conn->prepare("UPDATE Class SET occurrenceid=?, teachercode=?, duration=?, roomid=?,
		classdate=?, summary=? WHERE classid = ?");
	return $stmt->execute(array($uco,$teacher,$duration,$room,$classDate,$summary,$class));
}

function countClass(){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) FROM Class WHERE visible=1");

	$stmt->execute();
	return $stmt->fetch();
}

function countUCOClass($uco){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) FROM Class
		WHERE occurrenceid=? AND visible=1");

	$stmt->execute();
	return $stmt->fetch();
}

function getClass($class){

	global $conn;
	$stmt = $conn->prepare("SELECT Class.summary, Class.classdate, Person.name, 
		Syllabus.calendaryear, Curricularunit.name AS unit, Class.roomid, Class.duration
		FROM Class, Person, Curricularunitoccurrence, Syllabus, Curricularunit
		WHERE Class.teachercode = Person.academiccode AND
		Class.occurrenceid = Curricularunitoccurrence.cuoccurrenceid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Curricularunitoccurrence.curricularunitid = Curricularunit.curricularid
		Class.classid = ?");

	$stmt->execute(array($class));
	return $stmt->fetch();
}
//get complete
//get id
//get name
//list
//delete
?>