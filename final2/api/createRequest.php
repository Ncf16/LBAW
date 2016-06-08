<?php

if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    include_once('../config/init.php');

    $data = array();

    if (!($_POST['title'])) {
        $_SESSION['error_messages'][] = 'Title not specified';
        echo 'Missing Title.';
        exit;
    }else{
        $title = $_POST['title'];
    }

    if (!($_POST['description'])) {
        $_SESSION['error_messages'][] = 'Description not specified';
        echo 'Missing Description.';
        exit;
    }else{
        $description = $_POST['description'];
    }

    $userID = $_SESSION['userID'];

    //INCLUDE DB CONNECTION
    include_once($BASE_DIR . 'database/request.php');

    $data = createRequest($userID, $title, $description);

    echo json_encode($data);

    //echo json_encode($_POST['description']);
}
?>