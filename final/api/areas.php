<?php
include_once('../config/init.php');


if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	$account_type = $_SESSION['account_type'];
	if(!$account_type || $account_type != 'Admin'){
		$_SESSION['error_messages'][] = 'Unauthorized Access';
	 	header("Location: " . $BASE_URL . "index.php");
	 	exit;
	}

	include_once($BASE_DIR . 'database/area.php');

	if(!isset($_POST['action'])){
		$_SESSION['error_messages'][] = 'Action not specified';
		exit;
	}

	switch($_POST['action']){
		case 'create':
			create();
			break;
		case 'update':
			update();
			break;
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

function create(){

	$inputs = array();
	$inputs['areaVal'] = 'Area value not specified';
	if(!checkInputs($_POST, $inputs)){
 			//SEASION ERRORS inside checkInputs  
		exit;
	}

	try{
		createArea($_POST['areaVal']);
		echo true;
	}
	catch (PDOException $e) {
		$_SESSION['error_messages'][] = 'No changes made to area: ' . $e->getMessage();
		exit;
	}
}

function update(){

	$inputs = array();
	$inputs['areaid'] = 'Area not specified';
	$inputs['areaVal'] = 'Area value not specified';
	if(!checkInputs($_POST, $inputs)){
 			//SEASION ERRORS inside checkInputs  
		exit;
	}

	try{
		updateArea($_POST['areaid'],$_POST['areaVal']);
		echo true;
	}
	catch (PDOException $e) {
		$_SESSION['error_messages'][] = 'No changes made to area: ' . $e->getMessage();
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

	$data['nbAreas'] = intval(countAreas()['total']);

	if(isset($_POST['nbAreas'])){
		if(intval($_POST['nbAreas']) != $data['nbAreas']){
			$nbPages = ceil($data['nbAreas'] / $itemsPerPage);
			$pageNumber = max(min($nbPages,$pageNumber),1);
		}
	}

	$offset = ($pageNumber - 1) * $itemsPerPage;
	$data['areas'] = getAreasList($itemsPerPage,$offset);
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
		$_SESSION['error_messages'][] = 'area provided not valid';
		exit;
	}

	$data['success'] = deleteArea($_POST['id']);
	if($data['success'] == 'Success'){

		$page = intval($_POST['page']);
		$data['nbAreas'] = intval(countAreas()['total']);
		if($page == 0 || $data['nbAreas'] == 0){ //intval return 0 if failed
			$_SESSION['error_messages'][] = 'Arguments of page and number of areas expected to be integer > 0'; 
			exit;
		}

		$nbPages = ceil($data['nbAreas'] / $_POST['itemsPerPage']);
		if($page > $nbPages)
			$data['page'] = max($page - 1,1);
		else
			$data['page'] = $page;

		$offset = ($data['page'] - 1) * $itemsPerPage;
		$data['areas'] = getAreasList($itemsPerPage,$offset);
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
