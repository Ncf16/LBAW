<?php
function deleteAttendance($studentCode,$classID){
 global $conn;
    $stmt = $conn->prepare("UPDATE Attendance SET visible=0 WHERE classID= ? AND studentCode= ?;");	
     $stmt->execute(array($classID,$studentCode));
}

?>