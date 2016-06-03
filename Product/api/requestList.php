<?php

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	include_once('../config/init.php');
	
	$data = array();

	if(!isset($_POST['target']) || !$_POST['tab']){
		$_SESSION['error_messages'][] = 'Action or tab not specified';
		exit;
	}

	if(!$_POST['userID']){
		$_SESSION['error_messages'][] = 'No user was specified';
		exit;
	}else
		$userID = $_POST['userID'];

	$query = "";
	if (isset($_POST['query'])) {
		$query = $_POST['query'];
	}

	// PEOPLE OR COURSE
	if($_POST['target']=='admin'){

		//INCLUDE DB CONNECTION
		include_once($BASE_DIR . 'database/request.php');

		if(!isset($_POST['itemsPerPage']))
			$itemsPerPage = 10;
		else
			$itemsPerPage = intval($_POST['itemsPerPage']);

		if(isset($_POST['page'])){
			if(!is_numeric($_POST['page'])){
				die('Page specified not correct');
			}
			$pageNumber = intval($_POST['page']);
		}
		else
			$pageNumber = 1;

		$data['page'] = $pageNumber;
		$data['nbUnits'] = intval(countOpenRequests()['nropenrequests']);


		if(!isset($_POST['nbUnits'])){
			if(intval($_POST['nbUnits']) != $data['nbUnits']){
				$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}

		// Finishing the data
		$data['units'] = getOpenRequests($itemsPerPage, $pageNumber);
		

		//echo json_encode($query);
		echo json_encode($data);
	}
	
}
?>