<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 09:50:51
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\curricularUnit\changeUnit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191785729a9dbba5e49-77948661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e844ccb85003df99040b1f3758ced1f1b231269' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\curricularUnit\\changeUnit.tpl',
      1 => 1462348213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191785729a9dbba5e49-77948661',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'FORM_VALUES' => 0,
    'areas' => 0,
    'area' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5729a9dbce2513_32608220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729a9dbce2513_32608220')) {function content_5729a9dbce2513_32608220($_smarty_tpl) {?><form class="well form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/units/changeUnit.php" method="post" id="unit_form">
  	
  	<input name="unit_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_id'];?>
">

  	<div class="row">
	  	<div class="form-group">
	  		<label class="col-md-2 control-label">Name</label>
	  		<div class="col-md-9 inputGroupContainer">
	  			<div class="input-group">
	  				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  				<input name="unit_name" placeholder="Curricular Unit Name" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_name'];?>
" class="form-control" type="text" required>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="form-group">
	  		<label class="col-md-2 control-label">Area</label>  
	  		<div class="col-md-9 inputGroupContainer">
	  			<div class="input-group">
	  				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  				<input name="unit_area" placeholder="Curricular Unit Area" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_area'];?>
" list="areas" class="form-control" type="text" required>
	  				<datalist id="areas">
	  					<?php  $_smarty_tpl->tpl_vars['area'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['area']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['areas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['area']->key => $_smarty_tpl->tpl_vars['area']->value) {
$_smarty_tpl->tpl_vars['area']->_loop = true;
?>
	  					<option value="<?php echo $_smarty_tpl->tpl_vars['area']->value['area'];?>
"></option>
	  					<?php } ?>
	  				</datalist>
	  			</div>
	  		</div>
	  	</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Credits</label>  
			<div class="col-md-9 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
					<input name="unit_credits" placeholder="0" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['unit_credits'];?>
" class="form-control" type="number" min="1" max="10" required>
				</div>
			</div>
	    </div><?php }} ?>
