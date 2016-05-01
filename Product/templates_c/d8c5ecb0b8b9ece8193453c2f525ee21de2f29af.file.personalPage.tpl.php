<?php /* Smarty version Smarty-3.1.15, created on 2016-04-28 06:09:20
         compiled from "/opt/lbaw/lbaw1562/public_html/proto/templates/person/personalPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76613931157218cf07bb8e4-62412269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8c5ecb0b8b9ece8193453c2f525ee21de2f29af' => 
    array (
      0 => '/opt/lbaw/lbaw1562/public_html/proto/templates/person/personalPage.tpl',
      1 => 1461812737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76613931157218cf07bb8e4-62412269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'person' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57218cf08dbab8_10981160',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57218cf08dbab8_10981160')) {function content_57218cf08dbab8_10981160($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<<?php ?>?php
include_once('../../config/init.php');
include_once($BASE_DIR . "templates/common/header.tpl");
?<?php ?>>
<div id="personalPage">
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/personalPage.css" rel="stylesheet">
<!-- Page Content -->
<div   class="container">
   <!-- Portfolio Item Heading -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Personal Page
            <small><?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>
</small>
             <a href="#" class="btn btn-xs btn-primary">Edit Page</a> 
         </h1>
      </div>
   </div>
   <!-- /.row -->
   <!-- Portfolio Item Row -->
   <div class="row">
      <div class="col-md-3">
         <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/Students/avatar.png" alt="studentImg"> <!--  src="http://placehold.it/750x500"-->
      </div>
      <div class="col-md-2">
         <h3>Course</h3>
         <a href="CoursePage_MIEIC.html"><?php echo $_smarty_tpl->tpl_vars['person']->value['coursename'];?>
</a>
      </div>
      <div class="col-md-3">
         <h3>Personal Details</h3>
         <ul>
            <li>Current Year: <?php echo $_smarty_tpl->tpl_vars['person']->value['currentyear'];?>
</li>
            <li>Starting Year: <?php echo $_smarty_tpl->tpl_vars['person']->value['startyear'];?>
</li>
            <li>Mobile Phone: <?php echo $_smarty_tpl->tpl_vars['person']->value['phonenumber'];?>
</li>
            <li>Current Status:
                <?php if (isset($_smarty_tpl->tpl_vars['person']->value['finishyear'])&&$_smarty_tpl->tpl_vars['person']->value['coursegrade']>10) {?>
                Course completed
               <?php } elseif (isset($_smarty_tpl->tpl_vars['person']->value['finishyear'])) {?>
               Not valid
               <?php } else { ?>
               Valid
                <?php }?>
             </li>
         </ul>
      </div>
      <div class="col-md-4" >
         <div class="panel-group" id="accordion">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#year1">Sociodemographic Data</a>
                  </h4>
               </div>
               <div id="year1" class="panel-collapse collapse">
                  <div class="panel-body">
                     <p>
                        Birth Date: <?php echo $_smarty_tpl->tpl_vars['person']->value['birthdate'];?>

                        <br>
                        Address: <?php echo $_smarty_tpl->tpl_vars['person']->value['address'];?>

                        <br>
                        NIF: <?php echo $_smarty_tpl->tpl_vars['person']->value['nif'];?>

                        <br>
                        Nationality: <?php echo $_smarty_tpl->tpl_vars['person']->value['nationality'];?>

                     </p>
                  </div>
               </div>
            </div>
         </div >
      </div>
      <!-- /.row                <h3>Sociodemographic data </h3>	 -->
      
      <?php if ($_smarty_tpl->tpl_vars['person']->value['academiccode']==$_smarty_tpl->tpl_vars['USERNAME']->value) {?>
      <!-- Related Projects Row -->
      <div class="row"  id="personalPageBtnContainer">
         <div class="col-lg-12">
            <h3 class="page-header">Personal Links</h3>
         </div>
         <div class="col-sm-3 col-xs-5" >
            <a href="#" class="btn btn-primary btn-primary" >Main Page </a>
         </div>
         <div class="col-sm-3 col-xs-5">
            <a href="#" class="btn btn-primary btn-primary">Curricular Units</a>
         </div>
         <div class="col-sm-3 col-xs-5">
            <a href="#" class="btn btn-primary btn-primary">Admin Requests</a>
         </div>
         <div class="col-sm-3 col-xs-5">
            <a href="#" class="btn btn-primary btn-primary">Currical Units Taken</a>
         </div>
         <!--   -->
          </div>
         <?php }?>
      </div>
      <!-- /.row -->
      <hr>
   </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
