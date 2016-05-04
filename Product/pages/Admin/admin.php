<?php
include_once('../../config/init.php');

//Check if account is an admin
if(!$_SESSION['account_type'] || $_SESSION['account_type'] != 'Admin'){
	header("Location: " . $BASE_DIR . "index.php");
	exit;
}

$smarty->display('admin/admin.tpl');
?>
