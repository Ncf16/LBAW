<?php 
/*CREATE TABLE IF NOT EXISTS Calendar(
year INTEGER,
semester INTEGER,
beginDate DATE NOT NULL,
endDate DATE NOT NULL,
visible INTEGER DEFAULT 1,
PRIMARY KEY(year, semester),
CHECK(beginDate < endDate)
);*/ 

function createCalendar($year,$semester,$beginDate,$endDate){
	 global $conn;
    $stmt = $conn->prepare("INSERT INTO calendar(year,semester,beginDate,endDate) VALUES (?,?,?,?);");
    $stmt->execute(array($year,$semester,$beginDate,$endDate));
}

function updateCalendar($newYear,$newSemester,$newBeginDate,$newEndDate,$currentYear,$currentSemester){
 global $conn;
    $stmt = $conn->prepare("UPDATE calendar SET  year= ? ,semester= ? ,beginDate= ? ,endDate=?
                            WHERE  year = ? AND semester=? AND visible=1 ;");
    $stmt->execute(array($newYear,$newSemester,$newBeginDate,$newEndDate,$currentYear,$currentSemester));
}

function deleteCalendar($currentYear,$currentSemester){
	 $stmt = $conn->prepare("UPDATE calendar SET visible=0
                            WHERE  year = ? AND semester=? ;");
    $stmt->execute(array($currentYear,$currentSemester));

function getCalendarInfo($currentYear,$currentSemester){

	 global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM calendar
                            WHERE  year = ? AND semester = ? AND visible =1 ;");
    $stmt->execute(array($currentYear,$currentSemester));
    return  $stmt->fetch();
}
function validateDate($dateToCheck,$currentSemester,$currentYear){
     global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM calendar
                            WHERE  year = ? AND semester = ?  AND visible =1 AND ? BETWEEN beginDate AND endDate");
    $stmt->execute(array($currentYear,$currentSemester,$dateToCheck));

     $result= $stmt->fetch();
     if($result==false)
        return false;
    else
        return true;

}
function listCalendar($limit,$offset){
 global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM calendar
                            WHERE  visible =1 LIMIT ? OFFSET ? ;");
    $stmt->execute(array($limit,$offset));
    return  $stmt->fetchAll();
}
function countCalendar(){
global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*)
                            FROM calendar
                            WHERE visible =1 ;");
    $stmt->execute(array());
    return  $stmt->fetch ();
}
function getYears(){
    global $conn;
    $stmt = $conn->prepare("SELECT DISTINCT(year) FROM Calendar WHERE visible=1");

    $stmt->execute();
    return $stmt->fetchAll();
}

?>