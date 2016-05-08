<?php 
/*
CREATE TABLE IF NOT EXISTS Room(
roomID SERIAL PRIMARY KEY,
room CHAR(4) NOT NULL UNIQUE,
visible INTEGER DEFAULT 1
);
*/
function createRoom($room){
	 global $conn;
    $stmt = $conn->prepare("INSERT INTO room(room) VALUES (?);");
    $stmt->execute(array($room));
}

function updateRoom($roomID,$room){
 global $conn;
    $stmt = $conn->prepare("UPDATE room SET  room=?
                            WHERE  roomID = ? AND visible=1 ;");
    $stmt->execute(array($room,$roomID));
}

function deleteRoom($roomID){
	 global $conn;
    $stmt = $conn->prepare("UPDATE room SET visible=0
                            WHERE  roomID = ? ;");
    $stmt->execute(array($roomID));
}

function getRoomInfo($roomID){

	 global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM room
                            WHERE  roomID = ? AND visible =1 ;");
    $stmt->execute(array($roomID));
    return  $stmt->fetch();
}

?>