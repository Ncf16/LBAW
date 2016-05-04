<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');

  // form handler
  if($_POST && isset($_POST['unitSubmit'])){

    if(!isset($_POST['unit_name'])){
      $_SESSION['error_messages'][] = 'Must provide a name';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }
    if(!isset($_POST['unit_area'])){
      $_SESSION['error_messages'][] = 'Must provide an area';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }
    if(!isset($_POST['unit_credits'])){
      $_SESSION['error_messages'][] = 'Credits must be set';
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
    if(!isset($id)|| strlen($id) == 0){
      try {
        createUnit($name,$area['areaid'],$credits);
      }
      catch (PDOException $e) {
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Error creating unit: ' . $e->getMessage();
        exit;
      }
    }
    else{
      try{
        updateUnit($_POST['unit_id'],$name,$area['areaid'],$credits);
      }
      catch (PDOException $e) {
        $_SESSION['form_values'] = $_POST;
        $_SESSION['error_messages'][] = 'Error creating unit: ' . $e->getMessage();
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