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


	// Admin or Student
	if($_POST['target']=='admin'){

		if($_SESSION['account_type'] != 'Admin'  ){
			$_SESSION['error_messages'][] = 'User is not authorized.';
			exit;
		}

		// Depending on the tab selected, gets different information
		switch ($_POST['tab']) {
			case '#open':
				$data['nbUnits'] = intval(countOpenRequests()['nropenrequests']);
				break;
			case '#answered':
				$data['nbUnits'] = intval(countAdminAnsweredRequests($userID)['nropenrequests']);
				break;
			case '#closed':
				$data['nbUnits'] = intval(countClosedRequests()['nropenrequests']);
				break;
			default:
				$data['nbUnits'] = intval(countOpenRequests()['nropenrequests']);
				break;
		}


		if(!isset($_POST['nbUnits'])){
			if(intval($_POST['nbUnits']) != $data['nbUnits']){
				$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}

		// Depending on the tab selected, gets different information
		switch ($_POST['tab']) {
			case '#open':
				$data['units'] = getOpenRequests($itemsPerPage, $pageNumber);
				break;
			case '#answered':
				$data['units'] = getAdminAnsweredRequests($userID, $itemsPerPage, $pageNumber);
				break;
			case '#closed':
				$data['units'] = getClosedRequests($itemsPerPage, $pageNumber);

				break;
			default:
				$data['units'] = getOpenRequests($itemsPerPage, $pageNumber);
				break;
		}

		echo json_encode($data);

	}else if($_POST['target']=='student'){

		if($_SESSION['account_type'] != 'Student'|| $_SESSION['userID'] != $_POST['userID'] ){
			$_SESSION['error_messages'][] = 'User is not authorized.';
			exit;
		}

		// Depending on the tab selected, gets different information
		switch ($_POST['tab']) {
			case '#open':
				$data['nbUnits'] = intval(countStudentOpenRequests($userID)['nropenrequests']);
				break;
			case '#closed':
				$data['nbUnits'] = intval(countStudentClosedRequests($userID)['nropenrequests']);
				break;
			default:
				$data['nbUnits'] = intval(countStudentOpenRequests($userID)['nropenrequests']);
				break;
		}


		if(!isset($_POST['nbUnits'])){
			if(intval($_POST['nbUnits']) != $data['nbUnits']){
				$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}

		// Depending on the tab selected, gets different information
		switch ($_POST['tab']) {
			case '#open':
				$data['units'] = getStudentOpenRequests($userID, $itemsPerPage, $pageNumber);
				break;
			case '#closed':
				$data['units'] = getStudentClosedRequests($userID, $itemsPerPage, $pageNumber);
				break;
			default:
				$data['units'] = getStudentOpenRequests($userID, $itemsPerPage, $pageNumber);
				break;
		}

		echo json_encode($data);

	}
	
}
?>