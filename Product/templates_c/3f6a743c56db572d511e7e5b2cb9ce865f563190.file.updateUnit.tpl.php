<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 10:36:09
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\curricularUnit\updateUnit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7255729a9db2eb639-02204695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f6a743c56db572d511e7e5b2cb9ce865f563190' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\curricularUnit\\updateUnit.tpl',
      1 => 1462348343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7255729a9db2eb639-02204695',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5729a9db9b1dd8_53828916',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729a9db9b1dd8_53828916')) {function content_5729a9db9b1dd8_53828916($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="modal-body">
<div class="container">
  <div class="row">
  	<div class="col-lg-12">
  		<h2 class="page-header">Update Curricular Unit</h2>
  	</div>
  </div>

  <?php echo $_smarty_tpl->getSubTemplate ('curricularUnit/changeUnit.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  
	  	<div class="form-group">
	  		<div class="col-md-4 col-md-offset-4">
	  			<button type="submit" name="unitSubmit" class="btn btn-primary">Update Curricular Unit</button>
	  		</div>
	  	</div>
	  </div>
  </form>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
