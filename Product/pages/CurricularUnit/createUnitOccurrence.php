<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');

$courses = getCourses();
$years = getYears();

$smarty->assign('courses', $courses);
$smarty->assign('years', $years);
$smarty->display('curricularUnit/createUnitOccurrence.tpl');
?>