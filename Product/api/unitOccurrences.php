<?php
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once('../config/init.php');
	include_once($BASE_DIR . 'database/unit.php');

	$data = array();

	if(!isset($_POST['action'])){
		$_SESSION['error_messages'][] = 'Action not especified';    
		exit;
	}

	if(!isset($_POST['type'])){
		$_SESSION['error_messages'][] = 'Type of list not especified';    
		exit;
	}
	else
		$type = $_POST['type'];

	if($_POST['action']=='list'){

		if(!isset($_POST['itemsPerPage']))
			$itemsPerPage = 10;
		else
			$itemsPerPage = intval($_POST['itemsPerPage']);


		if(isset($_POST['page'])){
			if(!is_numeric($_POST['page'])){
				$_SESSION['error_messages'][] = 'Page especified not correct';
				exit;
			}
			$pageNumber = intval($_POST['page']);
		}
		else
			$pageNumber = 1;
		
		$offset = ($pageNumber - 1) * $itemsPerPage;
	
		if($type == 0){
			if(!isset($_POST['nbUnits']))
				$totalUnits = countUnitOccurrences();
			$data['units'] = getUCOlist($itemsPerPage,$offset);
		}
		else{
			if(!isset($_POST['course'])){
				$_SESSION['error_messages'][] = 'Type of list doesn\'t match arguments';
				exit;
			}
			$course = getCourseID($_POST['course'])['code'];
			if(!$course){
			    $_SESSION['form_values'] = $_POST;
			    $_SESSION['error_messages'][] = 'Couldn\'t find a course with that name';
			    exit;
			}
			else if($type == 1){
				if(!isset($_POST['nbUnits']))
					$totalUnits = countUnitOccurrencesC($course);
				$data['units'] = getUCOlistCourse($course,$itemsPerPage,$offset);
			}
			else if ($type == 2){
				$year = $_POST['year'];
				if(!isset($year)){
					$_SESSION['error_messages'][] = 'Type of list doesn\'t match arguments';
					exit;
				}
				if(!isset($_POST['nbUnits']))
					$totalUnits = countUnitOccurrencesCY($course,$year);
				$data['units'] = getUCOlistYear($course,$year,$itemsPerPage,$offset);
			}
		}
		if(!isset($_POST['nbUnits']))
			$data['nbUnits'] = intval($totalUnits['total']);
		else
			$data['nbUnits'] = intval($_POST['nbUnits']);
		
		foreach ($data['units'] as &$unit)
			$unit['year'] = $unit['year'] . '/' . ($unit[year] + 1);
		unset($unit);

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

		if(!isset($_POST['type'])){
			$_SESSION['error_messages'][] = 'Type of list not especified';    
			exit;
		}
		else
			$type = $_POST['type'];

		$data['success'] = deleteUnitOccurrence($_POST['id']);
		if($data['success'] == 'Success'){

			$page = intval($_POST['page']);
			$data['nbUnits'] = $_POST['nbUnits']-1;
			$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
			if($page > $nbPages)
				$data['page'] = max($page - 1,1);
			else
				$data['page'] = $page;

			$offset = ($data['page'] - 1) * $itemsPerPage;

			if($type == 0)
				$data['units'] = getUCOlist($itemsPerPage,$offset);
			else{
				if(!isset($_POST['course'])){
					$_SESSION['error_messages'][] = 'Type of list doesn\'t match arguments';
					exit;
				}
				$course = getCourseID($_POST['course'])['code'];
				if(!$course){
				    $_SESSION['form_values'] = $_POST;
				    $_SESSION['error_messages'][] = 'Couldn\'t find a course with that name';
				    exit;
				}
				else if($type == 1)
					$data['units'] = getUCOlistCourse($course,$itemsPerPage,$offset);
				else if ($type == 2){
					$year = $_POST['year'];
					if(!isset($year)){
						$_SESSION['error_messages'][] = 'Type of list doesn\'t match arguments';
						exit;
					}
					$data['units'] = getUCOlistYear($course,$year,$itemsPerPage,$offset);
				}
			}
		}
		echo json_encode($data);
	}
	else{
		$_SESSION['error_messages'][] = 'Unknow Action';    
		exit;
	}
}
?>