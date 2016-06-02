<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/person.php');

$username=$_POST['username'];
unset($_POST['username']);
echo createUpdateQuery($_POST,$username,"username");
?>
