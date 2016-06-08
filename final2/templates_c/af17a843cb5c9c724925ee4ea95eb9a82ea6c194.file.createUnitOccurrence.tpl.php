<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 14:42:22
         compiled from "C:\xampp\htdocs\LBAW\final\templates\curricularUnit\createUnitOccurrence.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92275756c12e9c7a35-87648011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af17a843cb5c9c724925ee4ea95eb9a82ea6c194' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\curricularUnit\\createUnitOccurrence.tpl',
      1 => 1465182326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92275756c12e9c7a35-87648011',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5756c12eabdbf4_23097161',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5756c12eabdbf4_23097161')) {function content_5756c12eabdbf4_23097161($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="modal-body">
<div class="container">
  <div class="row">
  	<div class="col-lg-12">
  		<h2 class="page-header">Create Curricular Unit Occurrence</h2>
  	</div>
  </div>

<?php echo $_smarty_tpl->getSubTemplate ('curricularUnit/changeUnitOccurrence.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  
	  	<div class="form-group">
	  		<div class="col-md-4 col-md-offset-4">
	  			<button type="submit" name="unitSubmit" class="btn btn-primary">Create New Curricular Unit Occurrence</button>
	  		</div>
	  	</div>
	  </div>
  </form>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
