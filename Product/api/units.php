<?php
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once('../config/init.php');
	include_once($BASE_DIR . 'database/unit.php');

	$data = array();

	if(!isset($_POST['action'])){
		$_SESSION['error_messages'][] = 'Action not especified';    
		exit;
	}

	if($_POST['action']=='list'){

		if(!isset($_POST['itemsPerPage']))
			$itemsPerPage = 10;
		else
			$itemsPerPage = intval($_POST['itemsPerPage']);

		if(!isset($_POST['nbUnits'])){
			$totalUnits = countUnits();
			$data['nbUnits'] = intval($totalUnits['total']);
		}
		else $data['nbUnits'] = intval($_POST['nbUnits']);

		if(isset($_POST['page'])){
			if(!is_numeric($_POST['page']))
				die('Page especified not correct');
			$pageNumber = intval($_POST['page']);
		}
		else
			$pageNumber = 1;

		$offset = ($pageNumber - 1) * $itemsPerPage;
		$data['units'] = getUnits($itemsPerPage,$offset);
		$data['page'] = $pageNumber;
		echo json_encode($data);
	}

	if($_POST['action']=='delete'){
		if(!isset($_POST['id'])){
			$_SESSION['error_messages'][] = 'ID on delete not especified!';    
			exit;
		}
		if(!isset($_POST['page'])){
			$_SESSION['error_messages'][] = 'page on delete not especified!';    
			exit;
		}
		if(!isset($_POST['itemsPerPage'])){
			$_SESSION['error_messages'][] = 'items per page on delete not especified!';    
			exit;
		}
		else
			$itemsPerPage = $_POST['itemsPerPage'];
		if(!isset($_POST['nbUnits'])){
			$_SESSION['error_messages'][] = 'units on delete not especified!';    
			exit;
		}

		$data['success'] = deleteUnit($_POST['id']);
		if($data['success'] == 'Success'){

			$page = intval($_POST['page']);
			$data['nbUnits'] = $_POST['nbUnits']-1;
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
	else{
		$_SESSION['error_messages'][] = 'Unknow Action';    
		exit;
	}
}
?>