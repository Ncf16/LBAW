<?php
include_once('../config/init.php');

$account_type = $_SESSION['account_type'];
if(!$account_type && $account_type != 'Admin' && $account_type != 'Teacher'){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once($BASE_DIR . 'database/unit.php');
	include_once($BASE_DIR . 'database/unitOccurrence.php');
	include_once($BASE_DIR . 'database/course.php');

	$data = array();
	$inputs = array();
	$input['action'] = 'Action not especified';
	$input['type'] = 'Type of list not especified';
	if(!checkInputs($_POST, $inputs)){
      //SEASION ERRORS inside checkInputs
      exit;
    }
	$type = $_POST['type'];

	if($_POST['action']=='list'){

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
	
		if($type == 0){
			$data['nbUnits'] = intval(countUnitOccurrences()['total']);
			if(isset($_POST['nbUnits'])){
				if(intval($_POST['nbUnits']) != $data['nbUnits']){
					$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
					$pageNumber = max(min($nbPages,$pageNumber),1);
				}
			}

			$offset = ($pageNumber - 1) * $itemsPerPage;
			$data['units'] = getUCOlist($itemsPerPage,$offset);
		}
		else{
			if(!isset($_POST['course'])){
				$_SESSION['error_messages'][] = 'Type of list doesn\'t match arguments';
				exit;
			}
			$course = getCourseID($_POST['course']);//code
			if(!$course){
			    $_SESSION['form_values'] = $_POST;
			    $_SESSION['error_messages'][] = 'Couldn\'t find a course with that name';
			    exit;
			}
			else if($type == 1){
				$data['nbUnits'] = intval(countUnitOccurrencesC($course['code'])['total']);
				if(isset($_POST['nbUnits'])){
					if(intval($_POST['nbUnits']) != $data['nbUnits']){
						$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
						$pageNumber = max(min($nbPages,$pageNumber),1);
					}
				}

				$offset = ($pageNumber - 1) * $itemsPerPage;
				$data['units'] = getUCOlistCourse($course['code'],$itemsPerPage,$offset);
			}
			else if ($type == 2){
				if(!isset($_POST['year'])){
					$_SESSION['error_messages'][] = 'Couldn\'t find a syllabus year';
					exit;
				}
				$year = explode('/', $_POST['year']);
				if(!isset($year[0])){
				    $_SESSION['error_messages'][] = 'Couldn\'t find a syllabus year with given School year';
				    exit;
				}
				$data['nbUnits'] = intval(countUnitOccurrencesCY($course['code'],$year[0])['total']);
				if(isset($_POST['nbUnits'])){
					if(intval($_POST['nbUnits']) != $data['nbUnits']){
						$nbPages = ceil($data['nbUnits'] / $itemsPerPage);
						$pageNumber = max(min($nbPages,$pageNumber),1);
					}
				}
				
				$offset = ($pageNumber - 1) * $itemsPerPage;	
				$data['units'] = getUCOlistYear($course['code'],$year[0],$itemsPerPage,$offset);
			}
		}
		
		foreach ($data['units'] as &$unit)
			$unit['year'] = $unit['year'] . '/' . ($unit['year'] + 1);
		unset($unit);

		clearAssigns($smarty);
		$data['page'] = $pageNumber;
		echo json_encode($data);
	}
	
	else if($_POST['action']=='delete'){

		$inputs['id'] = 'Unit on delete not especified!';
		$inputs['page'] = 'Page on Delete not especified!';
		$inputs['itemsPerPage'] = 'Items per page not specified';

		if(!checkInputs($_POST, $inputs)){
			//SEASION ERRORS inside checkInputs
		    exit;
		}
		$itemsPerPage = $_POST['itemsPerPage'];

		$data['success'] = deleteUnitOccurrence($_POST['id']);
		if($data['success'] == 'Success'){

			$page = intval($_POST['page']);

			if($type == 0){
				$data['nbUnits'] = intval(countUnitOccurrences()['total']);
				$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
				if($page > $nbPages)
					$data['page'] = max($page - 1,1);
				else
					$data['page'] = $page;

				$offset = ($data['page'] - 1) * $itemsPerPage;
				$data['units'] = getUCOlist($itemsPerPage,$offset);
			}
			else{
				if(!isset($_POST['course'])){
					$_SESSION['error_messages'][] = 'Type of list doesn\'t match arguments';
					exit;
				}
				$course = getCourseID($_POST['course']);
				if(!$course){
				    $_SESSION['form_values'] = $_POST;
				    $_SESSION['error_messages'][] = 'Couldn\'t find a course with that name';
				    exit;
				}
				else if($type == 1){
					$data['nbUnits'] = intval(countUnitOccurrencesC($course['code'])['total']);
					$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
					if($page > $nbPages)
						$data['page'] = max($page - 1,1);
					else
						$data['page'] = $page;

					$offset = ($data['page'] - 1) * $itemsPerPage;
					$data['units'] = getUCOlistCourse($course['code'],$itemsPerPage,$offset);
				}
				else if ($type == 2){
					if(!isset($_POST['year'])){
						$_SESSION['error_messages'][] = 'Couldn\'t find a syllabus year with given School year';
						exit;
					}
					$year = explode('/', $_POST['year']);
				    if(!isset($year[0])){
				      $_SESSION['error_messages'][] = 'Couldn\'t find a syllabus year with given School year';
				      exit;
				    }
					$data['nbUnits'] = intval(countUnitOccurrencesCY($course['code'],$year[0])['total']);
					$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
					if($page > $nbPages)
						$data['page'] = max($page - 1,1);
					else
						$data['page'] = $page;
				
					$offset = ($data['page'] - 1) * $itemsPerPage;	
					$data['units'] = getUCOlistYear($course['code'],$year[0],$itemsPerPage,$offset);
				}
			}

			foreach ($data['units'] as &$unit)
				$unit['year'] = $unit['year'] . '/' . ($unit['year'] + 1);
			unset($unit);
		}		

		clearAssigns($smarty);
		echo json_encode($data);
	}
	else{
		$_SESSION['error_messages'][] = 'Unknow Action';    
		exit;
	}
}
?>

<?php
function checkInputs($post, $inputs){
  $result = true;
  foreach($inputs as $key => $value)
    if(!isset($post[$key])){
      $_SESSION['error_messages'][] = $value;
      $result = false;
    }

  return $result;
}

function clearAssigns(&$smarty){

	$smarty->clearAssign('courses');
	$smarty->clearAssign('years');
}
?>