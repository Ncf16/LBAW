<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 14:42:10
         compiled from "C:\xampp\htdocs\LBAW\final\templates\admin\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83555756c12281f0e2-80357731%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37d8916e6952815603ad2bf4239c87b6c4450399' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\admin\\admin.tpl',
      1 => 1465303194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83555756c12281f0e2-80357731',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5756c1228b3819_24071240',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5756c1228b3819_24071240')) {function content_5756c1228b3819_24071240($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="adminPersonalPage">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/graphs.js"></script>

<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/personalPage.css" rel="stylesheet">
<!-- Page Content -->
<div   class="container">
   <!-- Portfolio Item Heading -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Admin Page</h1>
      </div>
   </div>
   <!-- /.row -->
   <!-- Portfolio Item Row -->
   <div class="row">
           <div class="col-md-6 text-center" >
<div id="coursesContainer" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
   </div>
           <div class="col-md-6 text-center" >
<div id="containerTypeOfUser" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
</div>
      <!-- /.row                -->
      <!-- Related Projects Row -->
      <div class="row"  id="personalPageBtnContainer">
     
         <div class="col-lg-12 text-center">
            <h3 class="page-header">Admin Links</h3>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
               <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Admin/addPerson.php" class="btn btn-primary btn-primary" >Create Accounts</a>
         </div>
      
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/course.php" class="btn btn-primary btn-primary">Create Course</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/CurricularUnit/units.php" class="btn btn-primary btn-primary">Manage Curricular Units</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/CurricularUnit/unitOccurrences.php" class="btn btn-primary btn-primary">Manage Unit Occurrences</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Admin/rooms.php" class="btn btn-primary btn-primary">Manage Rooms</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Admin/areas.php" class="btn btn-primary btn-primary">Manage Areas</a>
         </div>
         <!--   -->
          </div>
      </div>
      <!-- /.row -->
      <hr>
   </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
