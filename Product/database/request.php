<?php 

/*
CREATE TABLE IF NOT EXISTS Request(
requestID SERIAL PRIMARY KEY,
studentCode INTEGER REFERENCES Person(academicCode),
adminCode INTEGER REFERENCES Person(academicCode),
newCourse_Code INTEGER REFERENCES Course(code),
approved BOOLEAN,
reasonForChange TEXT NOT NULL,
visible INTEGER DEFAULT 1,
CHECK(reasonForChange <> '')
);*/ 
function createRequest($studentCode,$adminCode,$newCourse_Code,$approved,$resonForChange){
	 global $conn;
    $stmt = $conn->prepare("INSERT INTO request(studentCode,adminCode,newCourse_Code,approved,resonForChange) VALUES (?,?,?,?,?);");
    $stmt->execute(array($studentCode,$adminCode,$newCourse_Code,$approved,$resonForChange));
}

function updateRequest($requestID,$studentCode,$adminCode,$newCourse_Code,$approved,$resonForChange){
 global $conn;
    $stmt = $conn->prepare("UPDATE request SET  studentCode= ? ,adminCode= ? ,newCourse_Code= ? ,approved=?, reasonForChange = ?
                            WHERE  requestID = ? AND visible=1 ;");
    $stmt->execute(array($studentCode,$adminCode,$newCourse_Code,$approved,$resonForChange,$requestID));
}

function validateRequest($requestID,$isApproved){
	 global $conn;
    $stmt = $conn->prepare("UPDATE request SET  approved=? 
                            WHERE  requestID = ? AND visible=1 ;");
    $stmt->execute(array($isApproved,$requestID));
}

function deleteRequest($requestID){
	 $stmt = $conn->prepare("UPDATE request SET visible=0
                            WHERE  requestID = ?;");
    $stmt->execute(array($requestID));

function getRequestInfo($requestID){

	 global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM request
                            WHERE  requestID = ? AND visible =1 ;");
    $stmt->execute(array($requestID));
    return  $stmt->fetch();
}

?>