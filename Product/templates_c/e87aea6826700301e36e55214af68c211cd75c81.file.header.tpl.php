<?php /* Smarty version Smarty-3.1.15, created on 2016-04-28 05:01:48
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\common\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1119057213884755018-99798640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e87aea6826700301e36e55214af68c211cd75c81' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\common\\header.tpl',
      1 => 1461812507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1119057213884755018-99798640',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57213884757977_06461362',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57213884757977_06461362')) {function content_57213884757977_06461362($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/modern-business.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/unitPage.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/custom_style.css" rel="stylesheet">
    <Title>AcademicManagement Page</Title>
    <!-- Custom Fonts -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navbar-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#CollapsibleMenu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

      <?php if (!isset($_SESSION['username'])) {?>
       <div class="col-sm-3 col-xs-5" >
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/login.php" class="btn btn-primary btn-primary" >Login </a>
         </div>
      <?php } else { ?>
       <ul class="nav navbar-nav navbar-left" style="max-width:160px;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teacher/Student<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/person/personalPage.php">Profile</a>
                            </li>
                             <li>
                                <a href="admin.php">Admin Area</a>
                            </li>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/login.php">Request</a>
                            </li>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">Logout <?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</a>
                            </li>
                        </ul>
                    </li>
                </ul>
      <?php }?>
                 
                 
                 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="CollapsibleMenu">
                <ul class="nav navbar-nav navbar-left">
                  
                    <li class="nav-brand">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
index.php">Home</a>
                    </li>

                    <li class="nav-brand">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/courseList.php">Courses</a>
                    </li>

                    <li class="nav-brand">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/CurricularUnit/unitEvaluations.php">Evaluations</a>
                    </li>

                    <li class="nav-brand">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/coursePage.php">My Course</a>
                    </li>

                    <li class="nav-brand">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/CurricularUnit/unitPage.php">My Curricular Units</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- jQuery --> 
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/jquery.js"></script>
    <!-- Other Scripts -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/scripts.js"></script>
   
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/bootstrap.min.js"></script><?php }} ?>
