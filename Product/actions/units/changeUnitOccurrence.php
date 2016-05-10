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

    $course = getCourseID($_POST['unit_course']);//code
    if(!$course){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a course with given name';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $year = explode('/', $_POST['unit_year']);
    if(!isset($year[0])){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a syllabus year with given School year';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $syllabus = getSyllabusID($course['code'],intval($year[0]));//syllabusid
    if(!$syllabus){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a syllabus with given course and year';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $unit = getUnitID($_POST['unit_name']);//curricularid
    if(!$unit){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find a unit with that name';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $teacher = explode(':',$_POST['unit_teacher']);
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
    }

    $language = $_POST['language'];

    $curricularYear = intval($_POST['unit_curricularyear']);
    if($curricularYear < 1 || $curricularYear > 7){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Invalid course year';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $curricularSemester = intval($_POST['unit_curricularsemester']);
    if($curricularSemester != 1 && $curricularSemester != 2){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Invalid course semester';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $id = $_POST['unit_id'];
    if(!isset($id) || strlen($id) == 0){
      try{
        $unit = createUnitOccurrence($syllabus['syllabusid'],$unit['curricularid'],$teacher['academiccode'],
          $_POST['unit_bibliography'],$_POST['unit_competences'],$curricularSemester,$curricularYear,
          $_POST['unit_evaluations'],$_POST['unit_links'],$language,$_POST['unit_programme'],$_POST['unit_requirements']);
      }
      catch (PDOException $e){
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Error creating unit occurrence: ' . $e->getMessage();
        header("Location:".$_SERVER['HTTP_REFERER']);
        exit;
      }
    }
    else{
      /*
      try{
        updateUnitOccurrence(intval($_POST['unit_id']),$syllabus['syllabusid'],$unit['curricularid'],$teacher['academiccode'],
          $_POST['unit_bibliography'],$_POST['unit_competences'],$curricularSemester,$curricularYear,
          $_POST['unit_evaluations'],$_POST['unit_links'],$language,$_POST['unit_programme'],$_POST['unit_requirements']);
      }
      catch (PDOException $e){
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Error updating unit occurrence: ' . $e->getMessage();
        header("Location:".$_SERVER['HTTP_REFERER']);
        exit;
      }
      */
    }

    $smarty->clearAssign('courses');
    $smarty->clearAssign('years');
    $smarty->clearAssign('teachers');
    $smarty->clearAssign('units');
    header("Location:" . $BASE_URL . 'pages/CurricularUnit/viewUnitOccurrence.php?uc=' . $unit['cuoccurrenceid']);
    exit;
  }
  else{
    $_SESSION['error_messages'][] = 'Server couldn\'t respond';
    //header("Location:".$_SERVER['HTTP_REFERER']);
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