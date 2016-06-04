<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/class.php');
include_once($BASE_DIR . 'database/room.php');
include_once($BASE_DIR . 'database/teacher.php');

if(isset($_GET['class'])){

   $class = getClass($_GET['class']);

   if(!$class){
    $_SESSION['error_messages'][] = 'class not found!';
    header("Location: " . $BASE_URL . "index.php");
    exit;
  }

   $class['calendaryear'] = $class['calendaryear'] . '/' . ($class['calendaryear'] + 1);
   $smarty->assign('class',$class);
}

$rooms = getRooms();
$teachers = getTeachers();

foreach ($teachers as &$teacher)
	$teacher['name'] = $teacher['name'] . ": " . $teacher['username'];
unset($teacher);


$smarty->assign('teachers', $teachers);
$smarty->assign('rooms', $rooms);
$smarty->display('classes/viewClass.tpl');
?>