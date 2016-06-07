<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/evaluation.php');


if(!$_POST['eval'] || !is_numeric($_POST['eval'])){
 header("Location: " . $BASE_URL . "index.php");
	exit;
}
 deleteEvaluation($_POST['eval']);
exit;

?>