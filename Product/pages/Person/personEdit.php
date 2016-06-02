<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/person.php');

$username=$_POST['username'];
unset($_POST['username']);
var_dump(createUpdateQuery($_POST,$username,"username"));
?>
