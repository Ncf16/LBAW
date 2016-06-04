<?php

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	include_once('../config/init.php');
	
	$data = array();

	if(!isset($_POST['target'])){
		$_SESSION['error_messages'][] = 'Action not specified'; 
		exit;
	}

	if($_POST['target']=='people'){

		//INCLUDE DB CONNECTION
		include_once($BASE_DIR . 'database/person.php');

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


		$data['nbUnits'] = intval(countPeople()['nrpeople']);

		if(!isset($_POST['nbUnits'])){
			if(intval($_POST['nbUnits']) != $data['nbUnits']){
				$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}


		// Finishing the data
		$offset = ($pageNumber - 1) * $itemsPerPage;
		$data['units'] = getPeople($itemsPerPage,$pageNumber);
		$data['page'] = $pageNumber;
		
		echo json_encode($data);
	}

	
	if($_POST['target']=='course'){

		
		//INCLUDE DB CONNECTION
		include_once($BASE_DIR . 'database/course.php');

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


		$data['nbUnits'] = intval(countCourses()['nrcourses']);

		if(!isset($_POST['nbUnits'])){
			if(intval($_POST['nbUnits']) != $data['nbUnits']){
				$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}


		// Finishing the data
		$offset = ($pageNumber - 1) * $itemsPerPage;
		$data['units'] = getVisibleCoursesFromPage($itemsPerPage,$pageNumber);
		$data['page'] = $pageNumber;
		
		echo json_encode($data);
	}
	
}
?>