<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/syllabus.php');

echo 'Here';

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	

	if(!$_POST['courseid']){
		$_SESSION['error_messages'][] = 'Course not specified';
		exit;
	}

	$syllabus = getMostRecentSyllabus($_POST['courseid']);
	if(!$syllabus){
		$_SESSION['error_messages'][] = 'Syllabus not found';
		exit;
	}

	echo json_encode($syllabus);
}

