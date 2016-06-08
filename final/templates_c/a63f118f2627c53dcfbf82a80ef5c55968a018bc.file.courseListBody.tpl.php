<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 13:58:56
         compiled from "C:\xampp\htdocs\LBAW\final\templates\course\courseListBody.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3043857580880628e62-75434873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a63f118f2627c53dcfbf82a80ef5c55968a018bc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\course\\courseListBody.tpl',
      1 => 1465386849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3043857580880628e62-75434873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'activeCourses' => 0,
    'BASE_URL' => 0,
    'course' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575808806f7f14_20860630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575808806f7f14_20860630')) {function content_575808806f7f14_20860630($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['course'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['course']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activeCourses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['course']->key => $_smarty_tpl->tpl_vars['course']->value) {
$_smarty_tpl->tpl_vars['course']->_loop = true;
?>
     <tr>
      <th scope="row">
        <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/coursePage.php?course=<?php echo $_smarty_tpl->tpl_vars['course']->value['code'];?>
'> <?php echo $_smarty_tpl->tpl_vars['course']->value['name'];?>

        </a>
      </th>
      <td>
        <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personalPage.php?person=<?php echo $_smarty_tpl->tpl_vars['course']->value['directorusername'];?>
'><?php echo $_smarty_tpl->tpl_vars['course']->value['directorname'];?>
</a> 
      </td>
      <td><?php echo $_smarty_tpl->tpl_vars['course']->value['creationdate'];?>
</td>
      
     <?php if ($_smarty_tpl->tpl_vars['course']->value['coursetype']=='Masters') {?>
      <td>5</td>
    <?php } elseif ($_smarty_tpl->tpl_vars['course']->value['coursetype']=='Bachelor') {?>
         <td>3</td>
    <?php } elseif ($_smarty_tpl->tpl_vars['course']->value['coursetype']=='PhD') {?>
         <td>5</td>
    <?php }?>
      
      <td><?php echo $_smarty_tpl->tpl_vars['course']->value['coursetype'];?>
</td>
    </tr>
   <?php } ?><?php }} ?>
