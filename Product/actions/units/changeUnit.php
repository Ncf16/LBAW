<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');
include_once($BASE_DIR . 'database/area.php');

  // form handler
  if($_POST && isset($_POST['unitSubmit'])){

    $inputs = array();
    $inputs['unit_name'] = 'Must provide a name';
    $inputs['unit_area'] = 'Must provide an area';
    $inputs['unit_credits'] = 'Credits must be set';
    if(!checkInputs($_POST, $inputs)){
      //SEASION ERRORS inside checkInputs
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $name = $_POST['unit_name'];
    $area = getAreaID($_POST['unit_area']);
    if(!$area){
      $_SESSION['form_values'] = $_POST;
      $_SESSION['error_messages'][] = 'Couldn\'t find an area with that name';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $credits = intval($_POST['unit_credits']);
    if($credits == 0){
      $_SESSION['error_messages'][] = 'Credits not a number';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }

    $id = $_POST['unit_id'];
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
?>