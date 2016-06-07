<?php
    session_set_cookie_params(3600, '/LBAW/Product'); //FIXME
  session_start();

  error_reporting(E_ERROR | E_WARNING); // E_NOTICE by default

  $BASE_DIR = 'C:/Users/Filipe/Desktop/FEUP/XAMPP/htdocs/LBAW/Product/'; //FIXME
  $BASE_URL = '/LBAW/Product/'; //FIXME
 
  $conn = new PDO('pgsql:host=localhost;dbname=work', 'postgres', '1'); //FIXME
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->exec('SET SCHEMA \'proto\''); //FIXME?

  include_once($BASE_DIR . 'lib/smarty/Smarty.class.php'); 
  

  $smarty = new Smarty;
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
  $smarty->assign('BASE_URL', $BASE_URL);
  
               // SMARTY FORMATS CONFIG HERE
  $config['requestDate'] ='%B %e, %Y %H:%M:%S';
  $smarty->assign('config', $config);

  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);  
  $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
  $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
  $smarty->assign('USERNAME', $_SESSION['username']);
  $smarty->assign('USERID', $_SESSION['userID']);
  $smarty->assign('ACCOUNT_TYPE', $_SESSION['account_type']);
  $smarty->assign('STUDENT_COURSE', $_SESSION['student_course']);
  
  unset($_SESSION['success_messages']);
  unset($_SESSION['error_messages']);  
  unset($_SESSION['field_errors']);
  unset($_SESSION['form_values']);
?>
