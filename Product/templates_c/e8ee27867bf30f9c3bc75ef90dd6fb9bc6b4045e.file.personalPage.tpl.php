<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 23:43:32
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\person\personalPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193405728df2b8c4421-92698472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8ee27867bf30f9c3bc75ef90dd6fb9bc6b4045e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\person\\personalPage.tpl',
      1 => 1462398211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193405728df2b8c4421-92698472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5728df2b9a2ed2_73046012',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'person' => 0,
    'student' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5728df2b9a2ed2_73046012')) {function content_5728df2b9a2ed2_73046012($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="personalPage">
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/personalPage.css" rel="stylesheet">
<!-- Page Content -->
<div class="container">
   <!-- Portfolio Item Heading -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Personal Page
            <small><?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>
  (<?php echo $_smarty_tpl->tpl_vars['person']->value['persontype'];?>
)</small>
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
         <?php if ($_smarty_tpl->tpl_vars['person']->value['persontype']=='Student') {?>
         <h3>Course</h3>
         <a href="CoursePage_MIEIC.html"><?php echo $_smarty_tpl->tpl_vars['student']->value['coursename'];?>
</a>
         <ul>
            <li>Current Year: <?php echo $_smarty_tpl->tpl_vars['student']->value['currentyear'];?>
</li>
            <li>Starting Year: <?php echo $_smarty_tpl->tpl_vars['student']->value['startyear'];?>
</li>
         </ul>
         <?php }?>
      </div>
      <div class="col-md-3">
         <h3>Personal Details</h3>
         <ul>
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
      
      <?php if ($_smarty_tpl->tpl_vars['person']->value['username']==$_smarty_tpl->tpl_vars['USERNAME']->value) {?>

         <?php if ($_smarty_tpl->tpl_vars['person']->value['persontype']=='Student') {?>
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
            <a href="#" class="btn btn-primary btn-primary"> Submitted Requests</a>
         </div>
         <div class="col-sm-3 col-xs-5">
            <a href="#" class="btn btn-primary btn-primary">Currical Units Taken</a>
         </div>
         <!--   -->
          </div>
         <?php }?>

         <?php if ($_smarty_tpl->tpl_vars['person']->value['persontype']=='Admin') {?>
         <div class="row"  id="personalPageBtnContainer">
            <div class="col-sm-12 col-xs-5 text-center" >
               <a href= "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Admin/admin.php" class="btn btn-primary btn-primary" > Admin Page </a>
            </div>
          </div>
          <?php }?>

      <?php }?>
      <!-- /.row -->
      
   </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
