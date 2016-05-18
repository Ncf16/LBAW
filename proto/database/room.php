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
//TODO teste a bit more and with arguments from php
function getAvailableRoom($timeStamp){
     global $conn;
    $stmt = $conn->prepare("SELECT room.*
                            FROM room 
                            WHERE room.visible =1  AND room.roomdID 
                            NOT IN    (SELECT class.roomid FROM class WHERE (classDate::TIMESTAMP, interval '1' minute * class.duration) OVERLAPS ( ?::TIMESTAMP, interval '1' minute * 0);"); 
 
    $stmt->execute(array($timeStamp));
    return  $stmt->fetch();
}
function countRooms(){

     global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*)
                            FROM room
                            WHERE  visible =1 ;");
    $stmt->execute(array());
    return  $stmt->fetch();
}
function listRooms($offset,$limit){

     global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM room
                            WHERE  visible =1 LIMIT ? OFFSET ? ;");
    $stmt->execute(array($offset,$limit));
    return  $stmt->fetchAll();
}

?>