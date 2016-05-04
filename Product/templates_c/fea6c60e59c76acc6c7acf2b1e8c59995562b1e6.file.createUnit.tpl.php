<?php /* Smarty version Smarty-3.1.15, created on 2016-05-03 16:04:08
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\curricularUnit\createUnit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79025728afd8542026-49119321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fea6c60e59c76acc6c7acf2b1e8c59995562b1e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\curricularUnit\\createUnit.tpl',
      1 => 1462244511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79025728afd8542026-49119321',
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
  'unifunc' => 'content_5728afd85e6143_62955053',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5728afd85e6143_62955053')) {function content_5728afd85e6143_62955053($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="modal-body">
<div class="container">
  <div class="row">
  	<div class="col-lg-12">
  		<h2 class="page-header">Create Curricular Unit</h2>
  	</div>
  </div>

  <form class="well form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/units/createUnit.php" method="post" id="unitCreation_form">
  	
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
	    </div>
	  	<div class="form-group">
	  		<div class="col-md-4 col-md-offset-4">
	  			<button type="submit" name="unitSubmit" class="btn btn-primary">Create New Curricular Unit</button>
	  		</div>
	  	</div>
	  </div>
  </form>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
