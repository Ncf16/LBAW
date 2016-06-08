 <?php
/*
CREATE TABLE IF NOT EXISTS Syllabus(
syllabusID SERIAL PRIMARY KEY,
courseCode INTEGER REFERENCES Course(code),
calendarYear INTEGER NOT NULL,
visible INTEGER DEFAULT 1,
CHECK (calendarYear >= 1990)
);
*/
 /*
 function createSyllabus($courseCode,$calendaryear){
 	 global $conn;
    $stmt = $conn->prepare("INSERT INTO Syllabus(courseCode,calendarYear) VALUES (?,?);");
    $stmt->execute(array($courseCode,$calendaryear));
 }

 function updateSyllabus($syllabusID,$courseCode,$calendaryear){
 	 global $conn;
    $stmt = $conn->prepare("UPDATE Syllabus SET courseCode = ?, calendarYear = ? WHERE syllabusID = ?;");
    $stmt->execute(array($syllabusID,$courseCode,$calendaryear));
 }

 function deleteSyllabus($syllabusID,){
 		 global $conn;
    $stmt = $conn->prepare("UPDATE Syllabus SET visible = 0 WHERE syllabusID = ?;");
    $stmt->execute(array($syllabusID));
 }

 function listSyllabus($limit,$offset){
 	 global $conn;
    $stmt = $conn->prepare("SELECT * FROM Syllabus WHERE visible = 1 
    	LIMIT ? OFFSET ?;");
    $stmt->execute(array($limit,$offset));

    return $stmt->fetchAll();
 }
 
 function countSyllabus(){
 		 global $conn;
    $stmt = $conn->prepare("SELECT COUNT(syllabusid) FROM Syllabus
		WHERE visible=1");
    $stmt->execute(array());
    return $stmt->fetch();
}
*/

function getSyllabusID($course,$year){
	global $conn;
	$stmt = $conn->prepare("SELECT syllabusid FROM Syllabus
		WHERE coursecode=? AND calendaryear=? AND visible=1");

	$stmt->execute(array($course,$year));
	return $stmt->fetch();
}

function getMostRecentSyllabus($course){
    global $conn;
    $stmt = $conn->prepare("SELECT Syllabus.*
        FROM Syllabus WHERE coursecode = ? ORDER BY calendaryear DESC LIMIT 1");

    $stmt->execute(array($course));
    return $stmt->fetch();       
}

function getCourseNameYear($syllabus){
    global $conn;
    $stmt = $conn->prepare("SELECT Syllabus.calendaryear, CurricularUnit.name
        FROM Syllabus, CurricularUnit, CurricularUnitOccurrence
        WHERE CurricularUnitOccurrence.syllabusid = Syllabus.syllabusid AND
        CurricularUnitOccurrence.curricularunitid = CurricularUnit.curricularid AND
        Syllabus.syllabusid = ?");

    $stmt->execute(array($syllabus));
    return $stmt->fetch(); 
}
?>