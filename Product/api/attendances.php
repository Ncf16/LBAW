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

	include_once($BASE_DIR . 'database/attendance.php');

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

		if(isset($_POST['page']))
			$pageNumber = intval($_POST['page']);
		else
			$pageNumber = 1;

		if($itemsPerPage == 0 || $pageNumber == 0){ //intval return 0 if failed
			$_SESSION['error_messages'][] = 'Arguments of page and items per page expected to be integer > 0';
			exit;
		}

		if($_POST['classid']){
			$data['nbAttendances'] = intval(countClassAttendances($_POST['classid'])['total']);

			if(isset($_POST['nbAttendances'])){
				if(intval($_POST['nbAttendances']) != $data['nbAttendances']){
					$nbPages = ceil($data['nbAttendances'] / $itemsPerPage);
					$pageNumber = max(min($nbPages,$pageNumber),1);
				}
			}

			$offset = ($pageNumber - 1) * $itemsPerPage;
			$data['attendances'] = getClassesAttendances($_POST['classid'],$itemsPerPage,$offset);
		}
		else if ($_POST['student']){
			/*
			$data['nbAttendances'] = intval(countTeacherClass($_POST['teacher'])['total']);

			if(isset($_POST['nbAttendances'])){
				if(intval($_POST['nbAttendances']) != $data['nbAttendances']){
					$nbPages = ceil($data['nbAttendances'] / $itemsPerPage);
					$pageNumber = max(min($nbPages,$pageNumber),1);
				}
			}

			$offset = ($pageNumber - 1) * $itemsPerPage;
			$data['classes'] = getTeacherClasses($_POST['teacher'],$itemsPerPage,$offset);
			*/
		}
		else{
			$_SESSION['error_messages'][] = 'Parameters not especified';
			exit;
		}

		foreach ($data['attendances'] as &$attendance)
			$attendance['id'] = $attendance['classid'] . '.' . $attendance['academiccode'];
		unset($attendance);

		$smarty->clearAssign('class');
		$data['page'] = $pageNumber;
		echo json_encode($data);
	}

	else if($_POST['action']=='delete'){

		$inputs = array();
		$inputs['id'] = 'ID on delete not especified!';
		$inputs['page'] = 'Page where delete happens not specified';
		$inputs['itemsPerPage'] = 'Items per page not specified';
 		if(!checkInputs($_POST, $inputs)){
 			//SEASION ERRORS inside checkInputs  
			exit;
		}

		$itemsPerPage = $_POST['itemsPerPage'];

		if($id = intval($_POST['id']) == 0){
			$_SESSION['error_messages'][] = 'Attendance provided not valid';
			exit;
		}

		$data['success'] = deleteAttendance($_POST['id']);
		if($data['success'] == 'Success'){

			$page = intval($_POST['page']);

			if(isset($_POST['class'])){
				$data['nbAttendances'] = intval(countClassAttendances($_POST['classid'])['total']);

				$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
				if($page > $nbPages)
					$data['page'] = max($page - 1,1);
				else
					$data['page'] = $page;

				$offset = ($data['page'] - 1) * $itemsPerPage;
				$data['classes'] = getClassesAttendances($_POST['classid'],$itemsPerPage,$offset);
			}
			else if(isset($_POST['student'])){
				/*
				$data['nbAttendances'] = intval(countTeacherClass($_POST['teacher'])['total']);

				$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
				if($page > $nbPages)
					$data['page'] = max($page - 1,1);
				else
					$data['page'] = $page;

				$offset = ($data['page'] - 1) * $itemsPerPage;
				$data['classes'] = getTeacherClasses($_POST['teacher'],$itemsPerPage,$offset);
				*/
			}
			else{
				$_SESSION['error_messages'][] = 'Parameters not especified';
				exit;
			}
		}

		foreach ($data['attendances'] as &$attendance)
			$attendance['id'] = $attendance['classid'] . '.' . $attendance['classid'];
		unset($attendance);

		$smarty->clearAssign('class');
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
?>
