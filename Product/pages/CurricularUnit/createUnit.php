<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');

$areas = getAreas();

$smarty->assign('areas', $areas);
$smarty->display('curricularUnit/createUnit.tpl');
?>