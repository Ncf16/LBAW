<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');

$courses = getCourses();
$years = getYears();
$teachers = getTeachers();

foreach ($years as &$year)
	$year['year'] = $year['year'] . '/' . ($year[year] + 1);
unset($year);

foreach ($teachers as &$teacher)
	$teacher['name'] = $teacher['name'] . ": " . $teacher['username'];
unset($teacher);

$smarty->assign('courses', $courses);
$smarty->assign('years', $years);
$smarty->assign('teachers', $teachers);
$smarty->display('curricularUnit/createUnitOccurrence.tpl');
?>