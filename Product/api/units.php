<?php
include_once('../config/init.php');


if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	$account_type = $_SESSION['account_type'];
	if(!$account_type || !($account_type == 'Admin' || $account_type == 'Teacher')){
		$_SESSION['error_messages'][] = 'Unauthorized Access';
	 	header("Location: " . $BASE_URL . "index.php");
	 	exit;
	}

	include_once($BASE_DIR . 'database/unit.php');

	$data = array();

	if(!isset($_POST['action'])){
		$_SESSION['error_messages'][] = 'Action not specified';
		exit;
	}

	switch($_POST['action']){
		case 'list':
			listView();
			break;
		case 'delete':
			deleteView();
			break;
		default:
			$_SESSION['error_messages'][] = 'Unknow Action';      
			exit;
	}
}

function listView(){

	if(!isset($_POST['itemsPerPage']))
		$itemsPerPage = 10;
	else
		$itemsPerPage = intval($_POST['itemsPerPage']);

	if(isset($_POST['page']))
		$pageNumber = intval($_POST['page']);
	else
		$pageNumber = 1;

	if($itemsPerPage == 0 || $pageNumber == 0){ //intval return 0 if failed
		$_SESSION['error_messages'][] = 'Arguments of page and items per page expected to be integer > 0';
		exit;
	}

	$data['nbUnits'] = intval(countUnits()['total']);

	if(isset($_POST['nbUnits'])){
		if(intval($_POST['nbUnits']) != $data['nbUnits']){
			$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
			$pageNumber = max(min($nbPages,$pageNumber),1);
		}
	}

	$offset = ($pageNumber - 1) * $itemsPerPage;
	$data['units'] = getUnits($itemsPerPage,$offset);
	$data['page'] = $pageNumber;
	echo json_encode($data);
}

function deleteView(){

	$inputs = array();
	$inputs['id'] = 'ID on delete not specified!';
	$inputs['page'] = 'Page where delete happens not specified';
	$inputs['itemsPerPage'] = 'Items per page not specified';
	if(!checkInputs($_POST, $inputs)){
 			//SEASION ERRORS inside checkInputs  
		exit;
	}
	$itemsPerPage = $_POST['itemsPerPage'];

	if($id = intval($_POST['id']) == 0){
		$_SESSION['error_messages'][] = 'Unit provided not valid';
		exit;
	}

	$data['success'] = deleteUnit($_POST['id']);
	if($data['success'] == 'Success'){

		$page = intval($_POST['page']);
		$data['nbUnits'] = intval(countUnits()['total']);
		if($page == 0 || $data['nbUnits'] == 0){ //intval return 0 if failed
			$_SESSION['error_messages'][] = 'Arguments of page and number of units expected to be integer > 0'; 
			exit;
		}

		$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
		if($page > $nbPages)
			$data['page'] = max($page - 1,1);
		else
			$data['page'] = $page;

		$offset = ($data['page'] - 1) * $itemsPerPage;
		$data['units'] = getUnits($itemsPerPage,$offset);
	}
	echo json_encode($data);
}

function checkInputs($post, $inputs){
  $result = true;
  foreach($inputs as $key => $value)
    if(!isset($post[$key])){
      $_SESSION['error_messages'][] = $value;
      $result = false;
    }

  return $result;
}
?>
