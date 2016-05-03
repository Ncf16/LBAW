<?php /* Smarty version Smarty-3.1.15, created on 2016-05-03 23:08:20
         compiled from "C:\Users\Filipe\Desktop\FEUP\XAMPP\htdocs\LBAW\Product\templates\course\courseCreation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59465728c76ac98b22-17124490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e8fc2d3707899b4af917f136af64cfd1b39270a' => 
    array (
      0 => 'C:\\Users\\Filipe\\Desktop\\FEUP\\XAMPP\\htdocs\\LBAW\\Product\\templates\\course\\courseCreation.tpl',
      1 => 1462309697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59465728c76ac98b22-17124490',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5728c76acc0067_43334532',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'teachers' => 0,
    'teacher' => 0,
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5728c76acc0067_43334532')) {function content_5728c76acc0067_43334532($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/courseFormValidation.js"></script>
<div class="container">
<div class="row">
   <div class="col-md-6">
      <h2 class="page-header">Create Course</h2>
      <form id="courseForm" class="well form-horizontal" action="#" method="post" id="courseCreation_form">
         <?php if (isset($_GET['courseID'])) {?>
         <input id="Action" name="Action" hidden value="Edit">
         <?php $_smarty_tpl->tpl_vars['edit'] = new Smarty_variable(true, null, 0);?>
         <?php } else { ?>
         <input id="Action" name="Action" hidden value="Create">
         <?php $_smarty_tpl->tpl_vars['edit'] = new Smarty_variable(false, null, 0);?>
         <?php }?>
         <div class="form-group">
            <label class="col-md-3 control-label">Name</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input name="course_name" id="course_name" placeholder="Course Name" class="form-control" type="text" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Abbreviation</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input name="course_abbreviation" maxlength="5" id="course_abbreviation" placeholder="Abbreviation" class="form-control" type="text" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Director</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <select name="course_director" id="course_director" placeholder="Course Director" class="form-control" required>
                     <?php $_smarty_tpl->tpl_vars['teachers'] = new Smarty_variable(getAllTeachers(), null, 0);?>
                     <option value="0" selected="selected">Select Course Director</option>
                     <?php  $_smarty_tpl->tpl_vars['teacher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['teacher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teachers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->key => $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->_loop = true;
?>
                     <option value=<?php echo $_smarty_tpl->tpl_vars['teacher']->value['academiccode'];?>
><?php echo $_smarty_tpl->tpl_vars['teacher']->value['name'];?>
</option>
                     <?php } ?> 
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Creation Date</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="date" name="course_fundate" id="course_fundate" class="form-control"  required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Duration</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  <input name="course_duration" id="course_duration" placeholder="0" class="form-control" type="number" min="1" max="6" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Degree</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                  <select name="course_degree" id="course_degree" class="form-control" required>
                     <option selected="selected">Select Academic Degree</option>
                     <option>Bachelor</option>
                     <option>Masters</option>
                     <option>PhD</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Description</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <textarea class="form-control"  name="course_description" id="course_description" cols="50" row="5"  ></textarea>
               </div>
            </div>
         </div>
         
         <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
               <button id="submitNewCourse" type="submit" class="btn btn-primary">Create New Course</button>
            </div>
         </div>
         <div id="message_status">
         </div>
         <div id="error_messages">
            <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
            <div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<a class="close" href="#">X</a></div>
            <?php } ?>
         </div>
         <div id="success_messages">
            <?php  $_smarty_tpl->tpl_vars['success'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['success']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['success']->key => $_smarty_tpl->tpl_vars['success']->value) {
$_smarty_tpl->tpl_vars['success']->_loop = true;
?>
            <div class="success"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
<a class="close" href="#">X</a></div>
            <?php } ?>
         </div>
      </form>
   </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- 
<input name="course_students" placeholder="Course Director" class="form-control" type="hidden">
--><?php }} ?>
