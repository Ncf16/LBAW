<?php

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once('../config/init.php');

	$data = array();


	if(!$_POST['action']){
		$_SESSION['error_messages'][] = 'Action not specified';
		exit;
	}


	if(!$_POST['occurrenceID']){

		$_SESSION['error_messages'][] = 'No occurrence ID was specified';
		exit;
	}else
		$occurrenceID = $_POST['occurrenceID'];

	//INCLUDE DB CONNECTION
	include_once($BASE_DIR . 'database/curricularUploads.php');


	if(!isset($_POST['itemsPerPage']))
		$itemsPerPage = 10;
	else
		$itemsPerPage = intval($_POST['itemsPerPage']);

	if(!isset($_POST['page']))
		$pageNumber = 1;
	else
		$pageNumber = intval($_POST['page']);

	if($itemsPerPage == 0 || $pageNumber == 0){ //intval return 0 if failed
		$_SESSION['error_messages'][] = 'Arguments of page and items per page expected to be integer > 0';
		exit;
	}

	$data['page'] = $pageNumber;
	$data['nbItemsPerPage'] = $itemsPerPage;


	// Admin or Student
	if($_POST['action']=='list'){

		// Total Count
		$data['nbUnits'] = intval(countUnitUploads($occurrenceID)['nruploads']);

		if(!isset($_POST['nbUnits'])){
			if(intval($_POST['nbUnits']) != $data['nbUnits']){
				$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}

		// Query to get the stuff
		$data['units'] = getUnitUploads($occurrenceID,$itemsPerPage, $pageNumber);
		
		echo json_encode($data);

	}else{
		$_SESSION['error_messages'][] = 'Specified action does not match any of the existent.';
		exit;
	}

}
?>