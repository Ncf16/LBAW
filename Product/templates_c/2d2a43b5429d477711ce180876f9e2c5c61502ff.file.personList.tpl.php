<?php /* Smarty version Smarty-3.1.15, created on 2016-05-05 00:02:24
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\person\personList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14721572a414b91f0b6-24194299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d2a43b5429d477711ce180876f9e2c5c61502ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\person\\personList.tpl',
      1 => 1462399337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14721572a414b91f0b6-24194299',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572a414b9203d1_96668556',
  'variables' => 
  array (
    'people' => 0,
    'BASE_URL' => 0,
    'person' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572a414b9203d1_96668556')) {function content_572a414b9203d1_96668556($_smarty_tpl) {?><table class="table table-striped" >
  <thead>
    <tr class="head">
      <th>Name</th>
      <th>Account Type</th>
    </tr>
  </thead>
  <tbody class="courseListBody" id="person_list">
  <?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
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
   <?php } ?>
  </tbody>
</table><?php }} ?>
