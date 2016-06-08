<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 14:40:48
         compiled from "C:\xampp\htdocs\LBAW\final\templates\person\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67705756c0d07b6cb6-71121834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1754609f5aafc10ffe3c9af15b8b6fc0e301b082' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\person\\login.tpl',
      1 => 1465182326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67705756c0d07b6cb6-71121834',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5756c0d0a991e9_63362667',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5756c0d0a991e9_63362667')) {function content_5756c0d0a991e9_63362667($_smarty_tpl) {?> <?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container login">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please Sign In</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form id="frm" accept-charset="UTF-8" role="form" >
                    	<fieldset>

			    	  		<div class="form-group">
			    		    	<input class="form-control" placeholder="Username" name="username" type="text">
			    			</div>

			    			<div class="form-group">
			    				<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    			</div>

			    			<input class="btn btn-lg btn-block" id="login_button" type="submit" value="Login">

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

			    		</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
