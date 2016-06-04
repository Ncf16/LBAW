<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');
include_once($BASE_DIR . 'database/unitOccurrence.php');
include_once($BASE_DIR . 'database/room.php');
include_once($BASE_DIR . 'database/teacher.php');
include_once($BASE_DIR . 'database/class.php');

  // form handler
  if($_POST && isset($_POST['classSubmit'])){

    $inputs = array();
    if(!isset($_POST['class_uco'])){
      $inputs['class_unit'] = 'Must provide a curricular unit';
      $inputs['class_unit_year'] = 'Must provide the curricular school year';
    }
    $inputs['class_date'] = 'Must provide a class date';
    $inputs['class_time'] = 'Must provide a class time';
    $inputs['class_teacher'] = 'Must provide a class time';
    $inputs['class_duration'] = 'Must provide a class duration';
    $inputs['class_room'] = 'Must provide a class room';
    if(!checkInputs($_POST, $inputs)){
      //SEASION ERRORS inside checkInputs
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $default = array();
    $default['class_summary'] = '';
    checkDefault($_POST, $default);

    if(isset($_POST['class_uco'])){
      $uco['cuoccurrenceid'] = $_POST['class_uco'];
    }
    else{
      $year = explode('/', $_POST['class_unit_year']);
      if(!isset($year[0])){
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Couldn\'t find a syllabus year with given School year';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
      }

      $unit = getUnitID($_POST['class_unit']);//curricularid
      if(!$unit){
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Couldn\'t find a unit with that name';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
      }

      $uco = getUCOID($unit['curricularid'],$year[0]);//cuoccurrenceid
      if(!uco){
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Couldn\'t find a uco with given unit and year';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
      }
    }

    $timestamp = $_POST['class_date'] . ' ' . $_POST['class_time'];

    $teacher = explode(':',$_POST['class_teacher']);
    if(!isset($teacher[1])){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find the teacher username';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }
    $teacher = substr($teacher[1],1);

    if($teacher == false){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a teacher with given username';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $teacher = getTeacherID($teacher);//academiccode
    if(!$teacher){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a teacher with given username';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }
 
    $room = getRoomID($_POST['class_room']);//roomid
    if(!$room){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find an room with that name';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $duration = intval($_POST['class_duration']);
    if($duration == 0){
      $_SESSION['error_messages'][] = 'Duration not a number';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $smarty->clearAssign('years');
    $smarty->clearAssign('rooms');
    $smarty->clearAssign('teachers');
    $smarty->clearAssign('units');

    try {
      $class = createClass($uco['cuoccurrenceid'],$teacher['academiccode'],$duration,$room['roomid'],$timestamp,$_POST['class_summary']);
      header("Location:" . $BASE_URL . 'pages/Class/viewClass.php?class='. $class['classid']);
    }
    catch (PDOException $e) {
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Error creating class: ' . $e->getMessage();
      header("Location:".$_SERVER['HTTP_REFERER']);
      exit;
    }
    exit;
  }
  else{
    $_SESSION['error_messages'][] = 'Server couldn\'t respond';
    header("Location:".$_SERVER['HTTP_REFERER']);
    exit;
  }
?>

<?php
function checkInputs($post, $inputs){
  $result = true;
  foreach($inputs as $key => $value)
    if(!isset($post[$key])){
      $_SESSION['error_messages'][] = $value;
      $result = false;
    }

  return $result;
}

function checkDefault($post, $default){
   foreach($default as $key => $value)
    if(!isset($post[$key])){
      $post[$key] = '';
      $result = false;
    }
}
?>