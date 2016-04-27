<?php /* Smarty version Smarty-3.1.15, created on 2016-04-27 20:59:24
         compiled from "C:\xampp\htdocs\LBAW\frmk\templates\common\menu_logged_out.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1771257210c0cd74214-95037029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45f4e864f1401ab70dc899dc534d2528f60166ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\frmk\\templates\\common\\menu_logged_out.tpl',
      1 => 1461783544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1771257210c0cd74214-95037029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57210c0cd78e49_15176180',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57210c0cd78e49_15176180')) {function content_57210c0cd78e49_15176180($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php">Register</a>
<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">
  <input type="text" placeholder="username" name="username">
  <input type="password" placeholder="password" name="password">
  <input type="submit" value=">">
</form>
<?php }} ?>
