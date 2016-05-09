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
                            WHERE  year = ? AND currentSemester = ? AND visible =1 ;");
    $stmt->execute(array($currentYear,$currentSemester));
    return  $stmt->fetch();
}

?>