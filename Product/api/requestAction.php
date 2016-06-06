<?php

if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    include_once('../config/init.php');

    $data = array();


    if (!isset($_POST['action'])) {
        $_SESSION['error_messages'][] = 'Action not specified';
        exit;
    }
        
    if (!$_POST['requestID']) {
        $_SESSION['error_messages'][] = 'No requestID was specified';
        exit;
    } else
        $requestID = $_POST['requestID'];

    if (!$_POST['userID']) {
        $_SESSION['error_messages'][] = 'No userID was specified';
        exit;
    } else
        $userID = $_POST['userID'];

    if($_SESSION['userID'] != $userID){
        $_SESSION['error_messages'][] = 'User performing action not the same as the user logged in';
        exit;
    }

    if($_SESSION['account_type'] != 'Admin'){
        if ($_POST['action'] == 'accept' || $_POST['action'] == 'reject'){
            $_SESSION['error_messages'][] = 'User not authorized';
            exit;
        }
    }


    //INCLUDE DB CONNECTION
    include_once($BASE_DIR . 'database/request.php');


    // Depending on the tab selected, gets different information
    switch ($_POST['action']) {
        case 'approve':
            //$data = array('true');
            $data = acceptRequest($requestID, $userID);

            break;
        case 'reject':
            $data = rejectRequest($requestID, $userID);
            break;
        case 'cancel':
            $data = cancelRequest($requestID);
            break;
    }


    echo json_encode($data);


}
?>