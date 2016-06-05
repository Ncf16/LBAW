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

/* With Admin
function createRequest($studentCode,$adminCode,$newCourse_Code,$approved,$resonForChange){
     global $conn;
    $stmt = $conn->prepare("INSERT INTO request(studentCode,adminCode,newCourse_Code,approved,reasonForChange) VALUES (?,?,?,?,?);");
    $stmt->execute(array($studentCode,$adminCode,$newCourse_Code,$approved,$resonForChange));
}
*/
//Without Admin
/*
function createRequest($studentCode, $newCourse_Code, $approved, $resonForChange)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO request(studentCode,newCourse_Code,approved,resonForChange) VALUES (?,?,?,?);");
    $stmt->execute(array($studentCode, $newCourse_Code, $approved, $resonForChange));
}

function updateRequest($requestID, $studentCode, $adminCode, $newCourse_Code, $approved, $resonForChange)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE request SET  studentCode= ? ,adminCode= ? ,newCourse_Code= ? ,approved=?, reasonForChange = ?
                            WHERE  requestID = ? AND visible=1 ;");
    $stmt->execute(array($studentCode, $adminCode, $newCourse_Code, $approved, $resonForChange, $requestID));
}
*/
function validateRequest($requestID, $isApproved)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE request SET  approved=? 
                            WHERE  requestID = ? AND visible=1 ;");
    $stmt->execute(array($isApproved, $requestID));
}

function setAdmin($adminCode, $requestID)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE request SET adminCode = ?
                            WHERE  requestID = ? AND visible=1;");
    $stmt->execute(array($adminCode, $requestID));
}

function deleteRequest($requestID)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE request SET visible=0
                            WHERE  requestID = ?;");
    $stmt->execute(array($requestID));
}

function getRequestInfo($requestID)
{

    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM request
                            WHERE  requestID = ? AND visible =1 ;");
    $stmt->execute(array($requestID));
    return $stmt->fetch();
}

function listRequest($offset, $limit)
{

    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM request
                            WHERE visible =1 LIMIT ? OFFSET ? ;");
    $stmt->execute(array($offset, $limit));
    return $stmt->fetchAll();

}

// QUERIES USED FOR THE STUDENT

function getStudentOpenRequests($userID, $requestsPerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT request.*,
(SELECT person.name FROM person WHERE request.admincode = person.academiccode) as adminName,
(SELECT person.username FROM person WHERE request.admincode = person.academiccode) as adminUsername,
(SELECT person.name FROM person WHERE request.studentcode = person.academiccode) as studentName,
(SELECT person.username FROM person WHERE request.studentcode = person.academiccode) as studentUsername
FROM request
WHERE approved IS NULL
AND closed = false
AND studentcode = ?
AND request.visible = 1
ORDER BY submitionDate DESC
                            LIMIT ? OFFSET ?;");
    $stmt->execute(array($userID, $requestsPerPage,  (($page-1) * $requestsPerPage)));
    return $stmt->fetchAll();
}



function getStudentClosedRequests($userID, $requestsPerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT request.*,
(SELECT person.name FROM person WHERE request.admincode = person.academiccode) as adminName,
(SELECT person.username FROM person WHERE request.admincode = person.academiccode) as adminUsername,
(SELECT person.name FROM person WHERE request.studentcode = person.academiccode) as studentName,
(SELECT person.username FROM person WHERE request.studentcode = person.academiccode) as studentUsername
FROM request
WHERE closed = true
AND studentcode = ?
AND request.visible = 1
ORDER BY submitionDate DESC
                            LIMIT ? OFFSET ?;");
    $stmt->execute(array($userID, $requestsPerPage,  (($page-1) * $requestsPerPage)));
    return $stmt->fetchAll();
}

function countStudentOpenRequests($userID){

    global $conn;
    $stmt = $conn->prepare("SELECT count(requestid) as nropenrequests
                            FROM request
                            WHERE approved IS NULL
                            AND closed = false
                            AND studentcode = ?
                            AND visible = 1");

    $stmt->execute(array($userID));
    return $stmt->fetch();
}


function countStudentClosedRequests($userID){

    global $conn;
    $stmt = $conn->prepare("SELECT count(requestid) as nropenrequests
                            FROM request
                            WHERE closed = true
                            AND studentcode = ?
                            AND visible = 1");

    $stmt->execute(array($userID));
    return $stmt->fetch();
}



// QUERIES USED FOR THE ADMIN
function getOpenRequests($requestsPerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT request.*,
(SELECT person.name FROM person WHERE request.admincode = person.academiccode) as adminName,
(SELECT person.username FROM person WHERE request.admincode = person.academiccode) as adminUsername,
(SELECT person.name FROM person WHERE request.studentcode = person.academiccode) as studentName,
(SELECT person.username FROM person WHERE request.studentcode = person.academiccode) as studentUsername
FROM request
WHERE approved IS NULL
AND closed = false
AND request.visible = 1
ORDER BY submitionDate DESC
                            LIMIT ? OFFSET ?;");
    $stmt->execute(array($requestsPerPage,  (($page-1) * $requestsPerPage)));
    return $stmt->fetchAll();
}

function getAdminAnsweredRequests($userID, $requestsPerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT request.*,
(SELECT person.name FROM person WHERE request.admincode = person.academiccode) as adminName,
(SELECT person.username FROM person WHERE request.admincode = person.academiccode) as adminUsername,
(SELECT person.name FROM person WHERE request.studentcode = person.academiccode) as studentName,
(SELECT person.username FROM person WHERE request.studentcode = person.academiccode) as studentUsername
FROM request
WHERE approved IS NOT NULL 
AND admincode = ?
AND request.visible = 1
ORDER BY submitionDate DESC
                            LIMIT ? OFFSET ?;");
    $stmt->execute(array($userID, $requestsPerPage,  (($page-1) * $requestsPerPage)));
    return $stmt->fetchAll();
}

function getClosedRequests($requestsPerPage, $page)
{
    global $conn;
    $stmt = $conn->prepare("SELECT request.*,
(SELECT person.name FROM person WHERE request.admincode = person.academiccode) as adminName,
(SELECT person.username FROM person WHERE request.admincode = person.academiccode) as adminUsername,
(SELECT person.name FROM person WHERE request.studentcode = person.academiccode) as studentName,
(SELECT person.username FROM person WHERE request.studentcode = person.academiccode) as studentUsername
FROM request
WHERE closed = true
AND request.visible = 1
ORDER BY submitionDate DESC
                            LIMIT ? OFFSET ?;");
    $stmt->execute(array($requestsPerPage,  (($page-1) * $requestsPerPage)));
    return $stmt->fetchAll();
}

function countOpenRequests(){

    global $conn;
    $stmt = $conn->prepare("SELECT count(requestid) as nropenrequests
                            FROM request
                            WHERE approved IS NULL
                            AND closed = false
                            AND visible = 1");

    $stmt->execute();
    return $stmt->fetch();
}

function countAdminAnsweredRequests($userID){

    global $conn;
    $stmt = $conn->prepare("SELECT count(requestid) as nropenrequests
                            FROM request
                            WHERE approved IS NOT NULL
                            AND admincode = ?
                            AND visible = 1");

    $stmt->execute(array($userID));
    return $stmt->fetch();
}

function countClosedRequests(){

    global $conn;
    $stmt = $conn->prepare("SELECT count(requestid) as nropenrequests
                            FROM request
                            WHERE closed = true
                            AND visible = 1");

    $stmt->execute();
    return $stmt->fetch();
}

function countRequests()
{

    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*)
                            FROM request
                            WHERE  visible =1 ;");
    $stmt->execute(array());
    return $stmt->fetch();
}

// ACCEPT, REJECT AND CANCEL REQUESTS

function acceptRequest($requestID, $adminCode)
{
    global $conn;

    $stmt = $conn->prepare("UPDATE request
                            SET closed = true, approved = true, admincode = ?, submitiondate = current_date
                            WHERE requestid = ? AND closed = false");

    try {
        $res = $stmt->execute(array($adminCode, $requestID));
    } catch (Exception $e) {
        //echo 'Caught exception: ', $e->getMessage(), "\n";
        return $e->getMessage();
    }
    return "true";
}

function rejectRequest($requestID, $adminCode){
    global $conn;

    $stmt = $conn->prepare("UPDATE request
                            SET closed = true, approved = false, admincode = ?, submitiondate = current_date
                            WHERE requestid = ? AND closed = false");

    try {
        $res = $stmt->execute(array($adminCode, $requestID));
    }catch (Exception $e)  {
        //echo 'Caught exception: ', $e->getMessage(), "\n";
        return "false " + $e->getMessage();
    }
    return "true";
}

function cancelRequest($requestID){

    global $conn;
    $stmt = $conn->prepare("UPDATE request
                            SET closed = true, submitiondate = current_date
                            WHERE requestid = ? AND closed = false");

    try {
        $res = $stmt->execute(array($requestID));
    }catch (Exception $e)  {
        //echo 'Caught exception: ', $e->getMessage(), "\n";
        return  $e->getMessage();
    }
    return "true";

}


?>