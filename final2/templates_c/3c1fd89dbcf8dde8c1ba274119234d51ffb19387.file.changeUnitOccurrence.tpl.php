<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 14:42:22
         compiled from "C:\xampp\htdocs\LBAW\final\templates\curricularUnit\changeUnitOccurrence.tpl" */ ?>
<?php /*%%SmartyHeaderCode:253205756c12eaf46f7-18313215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c1fd89dbcf8dde8c1ba274119234d51ffb19387' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\curricularUnit\\changeUnitOccurrence.tpl',
      1 => 1465255333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253205756c12eaf46f7-18313215',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'FORM_VALUES' => 0,
    'syllabus' => 0,
    'units' => 0,
    'unit' => 0,
    'courses' => 0,
    'course' => 0,
    'years' => 0,
    'year' => 0,
    'teachers' => 0,
    'teacher' => 0,
    'languages' => 0,
    'value' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5756c12ebcb4a5_80170732',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5756c12ebcb4a5_80170732')) {function content_5756c12ebcb4a5_80170732($_smarty_tpl) {?><form class="well form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/units/changeUnitOccurrence.php" method="post" id="unitCreation_form">

	<input name="unit_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_id'];?>
">
	<input name="unit_syllabus" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['syllabus']->value;?>
">
  	
  	<div class="row">
  		<div class="col-md-12">
  			<h3>Information</h3>
  			<hr>
  		</div>
  	</div>
  	<div class="row">
	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Name</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_name" placeholder="Curricular Unit Name" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_name'];?>
" list="units" class="form-control" type="text" required>
	  					<datalist id="units">
	  						<?php  $_smarty_tpl->tpl_vars['unit'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['unit']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['units']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['unit']->key => $_smarty_tpl->tpl_vars['unit']->value) {
$_smarty_tpl->tpl_vars['unit']->_loop = true;
?>
	  						<option value="<?php echo $_smarty_tpl->tpl_vars['unit']->value['name'];?>
"></option>
	  						<?php } ?>
	  					</datalist>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Course</label>  
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
	  					<input name="unit_course" placeholder="Curricular Course Name" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_course'];?>
" list="courses" class="form-control" type="text" required <?php if ($_smarty_tpl->tpl_vars['syllabus']->value) {?>disabled<?php }?>>
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
	  			</div>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">School Year</label>  
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	  					<input name="unit_year" placeholder="Curricular Year" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_year'];?>
" list="years" class="form-control" type="text" required <?php if ($_smarty_tpl->tpl_vars['syllabus']->value) {?>disabled<?php }?>>
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
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Course Year</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_curricularyear" placeholder="Course Year" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_curricularyear'];?>
" class="form-control" type="number" min="1" max="7" required>
	  				</div>
	  			</div>
	  		</div>
	  	
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Semester</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<select name="unit_curricularsemester" class="form-control">
	  						<option
	  						<?php if ($_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_curricularsemester']==1) {?>
	  						selected="selected" <?php }?>>1</option>
	  						<option
	  						<?php if ($_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_curricularsemester']==2) {?>
	  						selected="selected" <?php }?>>2</option>
	  					</select>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Regent</label>  
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_teacher" placeholder="Teacher name: username" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_teacher'];?>
" list="teachers" class="form-control" type="text" required>
	  					<datalist id="teachers">
	  						<?php  $_smarty_tpl->tpl_vars['teacher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['teacher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teachers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->key => $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->_loop = true;
?>
			              	<option value="<?php echo $_smarty_tpl->tpl_vars['teacher']->value['name'];?>
"></option>
			              	<?php } ?>
			            </datalist>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Languague</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<select name="unit_language" class="form-control">
	  						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
	  						<option <?php if ($_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_language']==$_smarty_tpl->tpl_vars['value']->value) {?>
	  						selected="selected" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option>
	  						<?php } ?>
	  					</select>
	  				</div>
	  			</div>
	  		</div>
	  	
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">External Links</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_links" placeholder="Pages Pointing to External Resources" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_links'];?>
" class="form-control">
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	</div>

  	<div class="row">
  		<div class="col-md-12">
  			<h3>Descriptions</h3>
  			<hr>
  		</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Learning Objectives and Competences</label>
  		<div class="col-md-9">
	  		<textarea name="unit_competences" placeholder="Objectives and Competences" rows="3" class="form-control"><?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_competences'];?>
</textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Pre-Requirements and Co-Requirements</label>
  		<div class="col-md-9">
	  		<textarea name="unit_requirements" placeholder="Pre-Requirements and Co-Requirements" rows="3" class="form-control"><?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_requirements'];?>
</textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Curricular Programme</label>
  		<div class="col-md-9">
	  		<textarea name="unit_programme" placeholder="Curricular Programme" rows="3" class="form-control"><?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_programme'];?>
</textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Evaluation</label>
  		<div class="col-md-9">
	  		<textarea name="unit_evaluations" placeholder="Evaluation" rows="3" class="form-control"><?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_evaluations'];?>
</textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Bibliography</label>
  		<div class="col-md-9">
	  		<textarea name="unit_bibliography" placeholder="Bibliography" rows="3" class="form-control"><?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_bibliography'];?>
</textarea>
	  	</div>
  	</div><?php }} ?>
