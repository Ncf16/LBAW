<?php
function createClass($uco,$teacher,$duration,$room,$classDate,$summary){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO Class(occurrenceid, teachercode, duration, roomid, classdate, summary)
    VALUES (?, ?, ?, ?, ?, ?) RETURNING classid");

    $stmt->execute(array($uco,$teacher,$duration,$room,$classDate,$summary));
	return $stmt->fetch();
}

function updateClass($class,$uco,$teacher,$duration,$room,$classDate,$summary){

	global $conn;
	$stmt = $conn->prepare("UPDATE Class SET occurrenceid=?, teachercode=?, duration=?, roomid=?,
		classdate=?, summary=? WHERE classid = ?");
	
	$stmt->execute(array($uco,$teacher,$duration,$room,$classDate,$summary,$class));
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

	$stmt->execute(array($uco));
	return $stmt->fetch();
}

function countTeacherClass($teacher){

	global $conn;
	$stmt = $conn->prepare("SELECT COUNT(*) FROM Class
		WHERE teachercode=? AND visible=1");

	$stmt->execute(array($teacher));
	return $stmt->fetch();
}

function getClass($class){

	global $conn;
	$stmt = $conn->prepare("SELECT Class.summary, Class.classdate, Person.name, 
		Syllabus.calendaryear, Curricularunit.name AS unit, Class.duration, Room.room
		FROM Class, Person, Curricularunitoccurrence, Syllabus, Curricularunit, Room
		WHERE Class.teachercode = Person.academiccode AND
		Class.occurrenceid = Curricularunitoccurrence.cuoccurrenceid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Curricularunitoccurrence.curricularunitid = Curricularunit.curricularid AND
		Class.roomid = Room.roomid AND
		Class.classid = ?");

	$stmt->execute(array($class));
	return $stmt->fetch();
}

function getClasses($nbClasses,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Class.classdate, Syllabus.calendaryear, Curricularunit.name AS unit, Room.room
		FROM Class, Curricularunitoccurrence, Syllabus, Curricularunit, Room
		WHERE Class.occurrenceid = Curricularunitoccurrence.cuoccurrenceid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Curricularunitoccurrence.curricularunitid = Curricularunit.curricularid AND
		Class.roomid = Room.roomid LIMIT ? OFFSET ?");

	$stmt->execute(array($nbClasses,$offset));
	return $stmt->fetchAll();
}

function getUCOClasses($uco,$nbClasses,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Class.classdate, Syllabus.calendaryear, Curricularunit.name AS unit, Room.room
		FROM Class, Curricularunitoccurrence, Syllabus, Curricularunit, Room
		WHERE Class.occurrenceid = Curricularunitoccurrence.cuoccurrenceid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Curricularunitoccurrence.curricularunitid = Curricularunit.curricularid AND
		Class.roomid = Room.roomid AND
		Class.occurrenceid = ? LIMIT ? OFFSET ?");

	$stmt->execute(array($uco,$nbClasses,$offset));
	return $stmt->fetchAll();
}

function getTeacherClasses($teacher,$nbClasses,$offset){

	global $conn;
	$stmt = $conn->prepare("SELECT Class.classdate, Syllabus.calendaryear, Curricularunit.name AS unit, Room.room
		FROM Class, Curricularunitoccurrence, Syllabus, Curricularunit, Room
		WHERE Class.occurrenceid = Curricularunitoccurrence.cuoccurrenceid AND
		Curricularunitoccurrence.syllabusid = Syllabus.syllabusid AND
		Curricularunitoccurrence.curricularunitid = Curricularunit.curricularid AND
		Class.roomid = Room.roomid AND
		Class.teacherCode = ? LIMIT ? OFFSET ?");

	$stmt->execute(array($teacher,$nbClasses,$offset));
	return $stmt->fetchAll();
}

function deleteClass($class){
	global $conn;
	$stmt = $conn->prepare("UPDATE Class SET visible=0
		WHERE classid =?");

	$stmt->execute(array($class));
}
?>