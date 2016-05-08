<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');

  // form handler
  if($_POST && isset($_POST['unitSubmit'])){

    $inputs = array();
    $inputs['unit_name'] = 'Must provide a name';
    $inputs['unit_course'] = 'Must provide a course';
    $inputs['unit_year'] = 'Must provide a School year';
    $inputs['unit_curricularyear'] = 'Must provide a Course year';
    $inputs['unit_curricularsemester'] = 'Must provide a Course semester';
    $inputs['unit_teacher'] = 'Must provide a teacher';
    $inputs['unit_language'] = 'Must provide a language';
    if(!checkInputs($_POST, $inputs)){
      header("Location:".$_SERVER['HTTP_REFERER']);
      exit;
    }
    
    $default = array();
    $default['unit_links'] = '';
    $default['unit_competences'] = '';
    $default['unit_requirements'] = '';
    $default['unit_programme'] = '';
    $default['unit_evaluations'] = '';
    $default['unit_bibliography'] = '';
    checkDefault($_POST, $default);

    $course = getCourseID($_POST['unit_course'])['code'];
    if(!$course){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a course with given name';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $year = explode('/', $_POST['unit_year'])[0];
    $syllabus = getSyllabusID($course,$year);
    if(!$syllabus){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a syllabus with given course and year';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $unit = getUnitID($_POST['unit_name']);
    if(!$unit){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a unit with that name';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }



    /*
    $name = $_POST['unit_name'];
    $area = getAreaID($_POST['unit_area']);
    if(!$area){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find an area with that name';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $credits = intval($_POST['unit_credits']);
    if(!isset($id)|| strlen($id) == 0){
      try {
        createUnit($name,$area['areaid'],$credits);
      }
      catch (PDOException $e) {
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Error creating unit: ' . $e->getMessage();
        header("Location:".$_SERVER['HTTP_REFERER']);
        exit;
      }
    }
    else{
      try{
        updateUnit($_POST['unit_id'],$name,$area['areaid'],$credits);
      }
      catch (PDOException $e) {
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'No changes made to be unit: ' . $e->getMessage();
        header("Location:".$_SERVER['HTTP_REFERER']);
        exit;
      }
    }

    $smarty->clearAssign('areas');
    header("Location:" . $BASE_URL . 'pages/CurricularUnit/units.php');
    exit;
    */
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