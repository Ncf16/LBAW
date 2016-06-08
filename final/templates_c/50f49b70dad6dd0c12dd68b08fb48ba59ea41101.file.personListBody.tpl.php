<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 13:18:22
         compiled from "C:\xampp\htdocs\LBAW\final\templates\person\personListBody.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276045757fefebc82e6-25415431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50f49b70dad6dd0c12dd68b08fb48ba59ea41101' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\person\\personListBody.tpl',
      1 => 1465182326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276045757fefebc82e6-25415431',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'people' => 0,
    'BASE_URL' => 0,
    'person' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5757fefec646e7_00413658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5757fefec646e7_00413658')) {function content_5757fefec646e7_00413658($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['people']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value) {
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
     <tr>
      <th scope="row">
        <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personalPage.php?person=<?php echo $_smarty_tpl->tpl_vars['person']->value['username'];?>
'> <?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>

        </a>
      </th>
      <td>
        <?php echo $_smarty_tpl->tpl_vars['person']->value['persontype'];?>

      </td>
    </tr>
<?php } ?><?php }} ?>
