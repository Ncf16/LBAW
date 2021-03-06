<?php
include_once('../config/init.php');

/*
$account_type = $_SESSION['account_type'];
if(!$account_type && $account_type != 'Admin' && $account_type != 'Teacher'){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}
*/

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once($BASE_DIR . 'database/grade.php');
	include_once($BASE_DIR . 'database/unitOccurrence.php');
	include_once($BASE_DIR . 'database/class.php');
	include_once($BASE_DIR . 'database/evaluation.php');

	$data = array();

	if(!isset($_POST['action'])){
		$_SESSION['error_messages'][] = 'Action not specified';
		exit;
	}
	switch($_POST['action']){
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

function update(){

	$inputs = array();
	$inputs['evaluationid'] = 'Evaluation not specified';
	$inputs['student'] = 'Student not specified';
	$inputs['gradeVal'] = 'Grade value not specified';
	if(!checkInputs($_POST, $inputs)){
 			//SEASION ERRORS inside checkInputs  
		exit;
	}

	$account_type = $_SESSION['account_type'];
	if(!$account_type || !($account_type == 'Admin' || 
		($account_type == 'Teacher' && hasTeacherEvaluationAccess($_SESSION['userID'],$_POST['evaluationid'])))){
			$_SESSION['error_messages'][] = 'Unauthorized Access';
		exit;
	}

	try{
		$grade = updateGrade($_POST['student'],$_POST['evaluationid'],$_POST['gradeVal']);
		echo json_encode($grade);
	}
	catch (PDOException $e) {
		$_SESSION['error_messages'][] = 'No changes made to attendance: ' . $e->getMessage();
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

	$account_type = $_SESSION['account_type'];

	if($_POST['evaluationid']){
		if(!$account_type || !($account_type == 'Admin' || 
			($account_type == 'Teacher' && hasTeacherEvaluationAccess($_SESSION['userID'],$_POST['evaluationid'])) ||
			($account_type == 'Student' && hasStudentEvaluationAccess($_SESSION['userID'],$_POST['evaluationid'])) )){
				$_SESSION['error_messages'][] = 'Unauthorized Access';
				exit;
		}

		$data['nbGrades'] = intval(countEvaluationGrades($_POST['evaluationid'])['total']);

		if(isset($_POST['nbGrades'])){
			if(intval($_POST['nbGrades']) != $data['nbGrades']){
				$nbPages = ceil($data['nbGrades'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}

		$offset = ($pageNumber - 1) * $itemsPerPage;
		$data['grades'] = getEvaluationGrades($_POST['evaluationid'],$itemsPerPage,$offset);
	}
	/*else if ($_POST['student']){
			
			$data['nbGrades'] = intval(countTeacherClass($_POST['teacher'])['total']);

			if(isset($_POST['nbGrades'])){
				if(intval($_POST['nbGrades']) != $data['nbGrades']){
					$nbPages = ceil($data['nbGrades'] / $itemsPerPage);
					$pageNumber = max(min($nbPages,$pageNumber),1);
				}
			}

			$offset = ($pageNumber - 1) * $itemsPerPage;
			$data['grades'] = getTeachergrades($_POST['teacher'],$itemsPerPage,$offset);
			
		}*/
	else{
		$_SESSION['error_messages'][] = 'Parameters not specified';
		exit;
	}

	foreach ($data['grades'] as &$grade)
		$grade['id'] = $grade['evaluationid'] . '.' . $grade['academiccode'];
	unset($grade);

	$data['account'] = $account_type;
	$data['page'] = $pageNumber;
	echo json_encode($data);
}

function deleteView(){

	$inputs = array();
	$inputs['id'] = 'ID on delete not specified';
	$inputs['page'] = 'Page where delete happens not specified';
	$inputs['itemsPerPage'] = 'Items per page not specified';
	if(!checkInputs($_POST, $inputs)){
 			//SEASION ERRORS inside checkInputs  
		exit;
	}

	$account_type = $_SESSION['account_type'];
	if(!$account_type || !($account_type == 'Admin' || $account_type == 'Teacher')){
		$_SESSION['error_messages'][] = 'Unauthorized Access';
		exit;
	}

	$params = explode('.',$_POST['id']);
	if(count($params) != 2 || $id = intval($_POST['id']) == 0){
		$_SESSION['error_messages'][] = 'ID provided not valid';
		exit;
	}

	$itemsPerPage = $_POST['itemsPerPage'];

	$data['success'] = deleteGrade($params[1],$params[0]);
	if($data['success'] == 'Success'){

		$page = intval($_POST['page']);

		if(isset($_POST['evaluationid'])){
			$data['nbGrades'] = intval(countEvaluationGrades($_POST['evaluationid'])['total']);

			$nbPages = ceil($data['nbGrades'] / $_POST['itemsPerPage']);
			if($page > $nbPages)
				$data['page'] = max($page - 1,1);
			else
				$data['page'] = $page;

			$offset = ($data['page'] - 1) * $itemsPerPage;
			$data['grades'] = getEvaluationGrades($_POST['evaluationid'],$itemsPerPage,$offset);
		}
		/*else if(isset($_POST['student'])){
				/*
				$data['nbGrades'] = intval(countTeacherClass($_POST['teacher'])['total']);

				$nbPages = ceil($data['nbGrades'] / $_POST['itemsPerPage']);
				if($page > $nbPages)
					$data['page'] = max($page - 1,1);
				else
					$data['page'] = $page;

				$offset = ($data['page'] - 1) * $itemsPerPage;
				$data['grades'] = getTeachergrades($_POST['teacher'],$itemsPerPage,$offset);
				
			}*/
		else{
			$_SESSION['error_messages'][] = 'Parameters not specified';
			exit;
		}
	}

	foreach ($data['grades'] as &$grade)
		$grade['id'] = $grade['evaluationid'] . '.' . $grade['academiccode'];
	unset($grade);

	$data['account'] = $account_type;
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
