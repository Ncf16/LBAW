<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 19:37:56
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\admin\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26647572a31e0ac4471-52834746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '999e754a44f384b3fc25f77600629339e0eb9de1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\admin\\admin.tpl',
      1 => 1462383141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26647572a31e0ac4471-52834746',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572a31e0b39b28_19442632',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572a31e0b39b28_19442632')) {function content_572a31e0b39b28_19442632($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
         <div class="col-sm-2 col-xs-4 text-center" >
            <a href="#" class="btn btn-primary btn-primary" >Main Page </a>
         </div>

      <div class="col-sm-2 col-xs-4 text-center">
               <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Admin/addPerson.php" class="btn btn-primary btn-primary" >Create Accounts</a>
         </div>
   
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="#" class="btn btn-primary btn-primary">Remove Accounts 	</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="#" class="btn btn-primary btn-primary">Create Course</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center ">
            <a href="#" class="btn btn-primary btn-primary">Create Curricular Unit</a>
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
