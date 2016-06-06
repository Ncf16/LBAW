<?php
include_once('../config/init.php');

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once($BASE_DIR . 'database/unitOccurrence.php');
	include_once($BASE_DIR . 'database/class.php');
	include_once($BASE_DIR . 'database/room.php');
	include_once($BASE_DIR . 'database/teacher.php');

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
	$inputs['classid'] = 'Class not specified';
	$inputs['field'] = 'No field set to be updated';
	$inputs['value'] = 'No value specified';
	if(!checkInputs($_POST, $inputs)){
 			//SEASION ERRORS inside checkInputs  
		exit;
	}

	$account_type = $_SESSION['account_type'];
	if(!$account_type || !($account_type == 'Admin' || 
		($account_type == 'Teacher' && hasTeacherClassAccess($_SESSION['userID'],$_POST['classid'])))){
		$_SESSION['error_messages'][] = 'Unauthorized Access';
		exit;
	}

	try{
		if($_POST['field'] == 'summary'){
			updateClassSummary($_POST['classid'],$_POST['value']);
			echo json_encode('Success');
		}
		else if($_POST['field'] == 'date'){
			updateClassDate($_POST['classid'],$_POST['value']);
			echo json_encode('Success');
		}
		else if($_POST['field'] == 'time'){
			updateClassTime($_POST['classid'],$_POST['value']);
			echo json_encode('Success');
		}
		else if($_POST['field'] == 'teacher'){
			$teacher = explode(':',$_POST['value']);
			if(!$teacher[1]){
				$_SESSION['error_messages'][] = 'Couldn\'t find the teacher username';
				exit;
			}
			$teacher = substr($teacher[1],1);
			if($teacher == false){
				$_SESSION['error_messages'][] = 'Couldn\'t find a teacher with given username';
				exit;
			}

			$teacher = getTeacherID($teacher);//academiccode
			if(!$teacher){
				$_SESSION['error_messages'][] = 'Couldn\'t find a teacher with given username';
				exit;
			}
			updateClassTeacher($_POST['classid'],$teacher['academiccode']);
			echo json_encode('Success');
		}
		else if($_POST['field'] == 'duration'){
			updateClassDuration($_POST['classid'],$_POST['value']);
			echo json_encode('Success');
		}
		else if($_POST['field'] == 'room'){
			$room = getRoomID($_POST['value']);
			updateClassRoom($_POST['classid'],$room['roomid']);
			echo json_encode('Success');
		}
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

	if($_POST['unit']){
		if(!$account_type || !($account_type == 'Admin' || 
			($account_type == 'Teacher' && hasTeacherUCOAccess($_SESSION['userID'],$_POST['unit'])) ||
			($account_type == 'Student' && hasStudentUCOAccess($_SESSION['userID'],$_POST['unit'])) )){

				$_SESSION['error_messages'][] = 'Unauthorized Access';
			exit;
		}

		$data['nbClasses'] = intval(countUCOClass($_POST['unit'])['total']);

		if(isset($_POST['nbClasses'])){
			if(intval($_POST['nbClasses']) != $data['nbClasses']){
				$nbPages = ceil($data['nbClasses'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}

		$offset = ($pageNumber - 1) * $itemsPerPage;
		$data['classes'] = getUCOClasses($_POST['unit'],$itemsPerPage,$offset);
	}

	else if ($_POST['teacher']){
		if(!$account_type || ($account_type == 'Teacher' && ($_POST['teacher'] == $_SESSION['userID']))){
			$_SESSION['error_messages'][] = 'teacher not found!';
			exit;
		}

		$data['nbClasses'] = intval(countTeacherClass($_POST['teacher'])['total']);

		if(isset($_POST['nbClasses'])){
			if(intval($_POST['nbClasses']) != $data['nbClasses']){
				$nbPages = ceil($data['nbClasses'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}

		$offset = ($pageNumber - 1) * $itemsPerPage;
		$data['classes'] = getTeacherClasses($_POST['teacher'],$itemsPerPage,$offset);
	}
	else{
		if(!$account_type || $account_type != 'Admin'){
		    $_SESSION['error_messages'][] = 'Unauthorized Access';
		    header("Location: " . $BASE_URL . "index.php");
		    exit;
		}

		$data['nbClasses'] = intval(countClass()['total']);

		if(isset($_POST['nbClasses'])){
			if(intval($_POST['nbClasses']) != $data['nbClasses']){
				$nbPages = ceil($data['nbClasses'] / $itemsPerPage);
				$pageNumber = max(min($nbPages,$pageNumber),1);
			}
		}

		$offset = ($pageNumber - 1) * $itemsPerPage;
		$data['classes'] = getClasses($itemsPerPage,$offset);
	}

	if(!isset($_POST['unit'])){
		foreach ($data['classes'] as &$class)
			$class['unit'] = $class['unit'] . ' : ' .$class['calendaryear'] . '/' . ($class['calendaryear'] + 1);
		unset($class);
	}

	$data['account'] = $account_type;
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

	$account_type = $_SESSION['account_type'];
	if(!$account_type || !($account_type == 'Admin' || 
		($account_type == 'Teacher' && hasTeacherClassAccess($_SESSION['userID'],$_POST['id'])))){
		$_SESSION['error_messages'][] = 'Unauthorized Access';
		exit;
	}

	$itemsPerPage = $_POST['itemsPerPage'];

	if($id = intval($_POST['id']) == 0){
		$_SESSION['error_messages'][] = 'Class provided not valid';
		exit;
	}

	$data['success'] = deleteClass($_POST['id']);
	if($data['success'] == 'Success'){

		$page = intval($_POST['page']);

		if(isset($_POST['unit'])){
			$data['nbClasses'] = intval(countUCOClass($_POST['unit'])['total']);

			$nbPages = ceil($data['nbClasses'] / $_POST['itemsPerPage']);
			if($page > $nbPages)
				$data['page'] = max($page - 1,1);
			else
				$data['page'] = $page;

			$offset = ($data['page'] - 1) * $itemsPerPage;
			$data['classes'] = getUCOClasses($_POST['unit'],$itemsPerPage,$offset);
		}
		else if(isset($_POST['teacher'])){
			$data['nbClasses'] = intval(countTeacherClass($_POST['teacher'])['total']);

			$nbPages = ceil($data['nbClasses'] / $_POST['itemsPerPage']);
			if($page > $nbPages)
				$data['page'] = max($page - 1,1);
			else
				$data['page'] = $page;

			$offset = ($data['page'] - 1) * $itemsPerPage;
			$data['classes'] = getTeacherClasses($_POST['teacher'],$itemsPerPage,$offset);
		}
		else{
			$data['nbClasses'] = intval(countClass()['total']);

			$nbPages = ceil($data['nbClasses'] / $_POST['itemsPerPage']);
			if($page > $nbPages)
				$data['page'] = max($page - 1,1);
			else
				$data['page'] = $page;

			$offset = ($data['page'] - 1) * $itemsPerPage;
			$data['classes'] = getClasses($itemsPerPage,$offset);
		}
	}

	if(!isset($_POST['unit'])){
		foreach ($data['classes'] as &$class)
			$class['unit'] = $class['unit'] . ' : ' .$class['calendaryear'] . '/' . ($class['calendaryear'] + 1);
		unset($class);
	}

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
