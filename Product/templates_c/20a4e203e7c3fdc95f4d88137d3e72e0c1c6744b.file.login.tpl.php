<?php /* Smarty version Smarty-3.1.15, created on 2016-04-28 06:05:17
         compiled from "/opt/lbaw/lbaw1562/public_html/proto/templates/person/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51703362257218bfd2fccf3-79933577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a4e203e7c3fdc95f4d88137d3e72e0c1c6744b' => 
    array (
      0 => '/opt/lbaw/lbaw1562/public_html/proto/templates/person/login.tpl',
      1 => 1461812737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51703362257218bfd2fccf3-79933577',
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
  'unifunc' => 'content_57218bfd3b6e91_37120914',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57218bfd3b6e91_37120914')) {function content_57218bfd3b6e91_37120914($_smarty_tpl) {?> <?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container login">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
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
