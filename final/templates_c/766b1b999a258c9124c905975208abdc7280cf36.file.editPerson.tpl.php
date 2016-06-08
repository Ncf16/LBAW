<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 15:06:22
         compiled from "C:\xampp\htdocs\LBAW\final\templates\person\editPerson.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162755758184e94b5c0-84673490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '766b1b999a258c9124c905975208abdc7280cf36' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\person\\editPerson.tpl',
      1 => 1465386850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162755758184e94b5c0-84673490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'person' => 0,
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5758184ec3d4f1_68241198',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5758184ec3d4f1_68241198')) {function content_5758184ec3d4f1_68241198($_smarty_tpl) {?> <?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/personEditValidation.js"></script>
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/personEdit.css" rel="stylesheet">
<div class="container">
<div class="row">
   <div class="col-md-12">
      <h2 class="page-header">Edit Info</h2>
      <form id="personEditForm" class="well form-horizontal" enctype="text/plain">
        <div class="form-group">
		<label class="col-md-3 control-label">Name</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="name" value="<?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>
" class="form-control" type="text" required>

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<?php if ($_smarty_tpl->tpl_vars['person']->value['privatename']==false) {?>
				<span class="input-group-addon"><input type="checkbox" id="privateName" name="privateName"/></span>
				<?php } else { ?>
				<span class="input-group-addon"><input type="checkbox" id="privateName" checked name="privateName"/></span>
				<?php }?>
			</div>
		</div>
	</div>
	<!-- ADDRESS -->
	<div class="form-group">
		<label class="col-md-3 control-label">Address</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="address" value="<?php echo $_smarty_tpl->tpl_vars['person']->value['address'];?>
" class="form-control" type="text" >

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<?php if ($_smarty_tpl->tpl_vars['person']->value['privateaddr']==false) {?>
				<span class="input-group-addon"><input type="checkbox" id="privateAddr" name="privateAddr"/></span>
				<?php } else { ?>
				<span class="input-group-addon"><input type="checkbox" id="privateAddr" checked name="privateAddr"/></span>
				<?php }?>
			</div>
		</div>
	</div>

	<!-- NATIONALITY -->
	<div class="form-group">
		<label class="col-md-3 control-label">Nationality</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="nationality" value="<?php echo $_smarty_tpl->tpl_vars['person']->value['nationality'];?>
" class="form-control" type="text" >

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<?php if ($_smarty_tpl->tpl_vars['person']->value['privatenat']==false) {?>
				<span class="input-group-addon"><input type="checkbox" id="privateNat" name="privateNat"/></span>
				<?php } else { ?>
				<span class="input-group-addon"><input type="checkbox" id="privateNat" checked name="privateNat"/></span>
				<?php }?>
			</div>
		</div>
	</div>

	<!-- PHONE NUMBER -->
	<div class="form-group">
		<label class="col-md-3 control-label">Phone Number</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="phonenumber" value="<?php echo $_smarty_tpl->tpl_vars['person']->value['phonenumber'];?>
" class="form-control" type="number" >

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<?php if ($_smarty_tpl->tpl_vars['person']->value['privatephone']==false) {?>
				<span class="input-group-addon"><input type="checkbox" id="privatePhone" name="privatePhone"/></span>
				<?php } else { ?>
				<span class="input-group-addon"><input type="checkbox" id="privatePhone" checked  name="privatePhone"/></span>
				<?php }?>
			</div>
		</div>
	</div>

	<!-- NIF -->
	<div class="form-group">
		<label class="col-md-3 control-label">NIF</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="nif" value="<?php echo $_smarty_tpl->tpl_vars['person']->value['nif'];?>
" class="form-control" type="number" required>
				 
				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<span class="input-group-addon"><input type="checkbox" disabled /></span>
			</div>
		</div>
	</div>

	<!-- BIRTH DATE -->
	<div class="form-group">
		<label class="col-md-3 control-label">Birth Date</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				<input  name="birthdate" value="<?php echo $_smarty_tpl->tpl_vars['person']->value['birthdate'];?>
" class="form-control" type="date" min="1900-01-01" max="2016-01-01">

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<?php if ($_smarty_tpl->tpl_vars['person']->value['privatedate']==false) {?>
				<span class="input-group-addon"><input type="checkbox" id="privateDate" name="privateDate"/></span>
				<?php } else { ?>
				<span class="input-group-addon"><input type="checkbox" id="privateDate" checked name="privateDate"/></span>
				<?php }?>
			</div>
		</div>
	</div>
	<input hidden id="url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
"/>
	<input hidden id="personCode" value="<?php echo $_smarty_tpl->tpl_vars['person']->value['username'];?>
"/>
	<!-- NIF -->
	<div class="form-group">
		<label class="col-md-3 control-label">Password</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="password" placeholder="New Password" class="form-control" type="password">

				<span class="input-group-addon"><span id="emptySpan"></span></span>
				<span class="input-group-addon"><input type="checkbox" disabled /></span>
			</div>
		</div>
	</div> 
     <div class="row">
         <span class="glyphicon glyphicon-asterisk"></span> 
             <strong>
         Required Field
      </strong>
      </div>
         <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <button id="editPersonSubmit" type="submit" class="btn btn-primary">Edit Person</button>
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
</div>
 <?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
