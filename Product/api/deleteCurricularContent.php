<?php

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once('../config/init.php');

	if(!$_POST['action']){
		$_SESSION['error_messages'][] = 'Action not specified';
		exit;
	}

	if(!$_POST['contentID']){
		$_SESSION['error_messages'][] = 'No occurrence ID was specified';
		exit;
	}else
		$contentID = $_POST['contentID'];


	if($_SESSION['account_type'] == 'Student'){
		if ($_POST['action'] == 'delete'){
			$_SESSION['error_messages'][] = 'User not authorized';
			exit;
		}
	}

	//INCLUDE DB CONNECTION
	include_once($BASE_DIR . 'database/curricularUploads.php');

	if($_POST['action'] == 'delete'){
		//Verify if user doing the action should have access to the content

		$data = deleteContentDB($contentID);
		//deleteContentServer();   //-> REALLY DELETES CONTENT FROM THE SERVER AND NOT JUST FROM DB
	}else{
		$_SESSION['error_messages'][] = 'Specified action does not match any of the existent.';
		exit;
	}

	echo json_encode($data);
}
?>