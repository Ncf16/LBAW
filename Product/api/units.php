<?php
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once('../config/init.php');
	include_once($BASE_DIR . 'database/unit.php');

	$data = array();

	if(!isset($_POST['itemsPerPage']))
		$itemsPerPage = 1;
	else
		$itemsPerPage = $_POST['itemsPerPage'];

	if(!isset($_POST['pages'])){
		$totalUnits = countUnits();
		$nbPages = $totalUnits['total'] / $itemsPerPage;
		$data['pages'] = $nbPages;
	}
	else $data['pages'] = $_POST['pages'];

	if(isset($_POST['page'])){
		$pageNumber = $_POST['page'];
		if(!is_numeric($pageNumber))
			die('Page especified not correct');
	}
	else
		$pageNumber = 1;

	$offset = ($pageNumber - 1) * $itemsPerPage;
	$data['units'] = getUnits($itemsPerPage,$offset);
	$data['page'] = $pageNumber;
	$data['itemsPerPage'] = $itemsPerPage;
	echo json_encode($data);
}
?>