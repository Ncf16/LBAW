<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 14:43:18
         compiled from "C:\xampp\htdocs\LBAW\final\templates\curricularUnit\unitOccurrences.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317825756c129be5854-98819156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '800e39ef7c906dce6b7058107933d187d24a4663' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\curricularUnit\\unitOccurrences.tpl',
      1 => 1465303395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317825756c129be5854-98819156',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5756c129c7ddf2_28076602',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'FORM_VALUES' => 0,
    'courses' => 0,
    'course' => 0,
    'years' => 0,
    'year' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5756c129c7ddf2_28076602')) {function content_5756c129c7ddf2_28076602($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/listTables.css" rel="stylesheet">

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-header">Curricular Unit Occurrence
      </h2>
    </div>
    <div class="col-sm-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/CurricularUnit/createUnitOccurrence.php">
          <button class="btn btn-primary" id="createUnit">Create New Occurrence</button>
        </a>
      </div>
    </div>

    <div class="row">
      <br>
      <div class="form-group col-md-4">
        <label class="col-md-8 control-label">Course</label>
        <input name="uco_course" placeholder="List occurrences of a Course" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['course'];?>
" list="courses" class="form-control" type="text">
            <datalist id="courses">
              <?php  $_smarty_tpl->tpl_vars['course'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['course']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['courses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['course']->key => $_smarty_tpl->tpl_vars['course']->value) {
$_smarty_tpl->tpl_vars['course']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['course']->value['name'];?>
"></option>
              <?php } ?>
            </datalist>
      </div>
      <div class="form-group col-md-4">
        <label class="col-md-8 control-label">School Year</label>
        <input name="uco_year" placeholder="Specify the School year" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['year'];?>
" list="years" class="form-control" type="text">
            <datalist id="years">
              <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['years']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value) {
$_smarty_tpl->tpl_vars['year']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['year']->value['year'];?>
"></option>
              <?php } ?>
            </datalist>
      </div>
      <div class="col-md-1">
        <br>
        <button class="btn btn-primary pull-right" id="searchUnits">Go</button>
      </div>
    </div>

  <div class="row">
  	<table id="mytable" class="table table-bordred table-striped">
  		<thead>
  			<th class="col-md-1">View</th>
  			<th class="col-md-3">Name</th>
  			<th class="col-md-3">Course</th>
  			<th class="col-md-1">School Year</th>
        <th class="col-md-1">Course Year</th>
        <th class="col-md-1">Course Semester</th>
        <th class="col-md-1">Edit</th>
        <th class="col-md-1">Delete</th>
  		</thead>
  		<tbody id="units">
  		</tbody>
  	</table>

  	<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  	</ul>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/Pagination.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/unitOccurrences.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
