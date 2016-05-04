<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 09:52:00
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\curricularUnit\createUnit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79025728afd8542026-49119321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fea6c60e59c76acc6c7acf2b1e8c59995562b1e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\curricularUnit\\createUnit.tpl',
      1 => 1462348181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79025728afd8542026-49119321',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5728afd85e6143_62955053',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5728afd85e6143_62955053')) {function content_5728afd85e6143_62955053($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="modal-body">
<div class="container">
  <div class="row">
  	<div class="col-lg-12">
  		<h2 class="page-header">Create Curricular Unit</h2>
  	</div>
  </div>

<?php echo $_smarty_tpl->getSubTemplate ('curricularUnit/changeUnit.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  
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
