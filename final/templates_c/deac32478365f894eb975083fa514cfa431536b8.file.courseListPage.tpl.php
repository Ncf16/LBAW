<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 13:58:54
         compiled from "C:\xampp\htdocs\LBAW\final\templates\course\courseListPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:286555758087e4058b5-25009562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'deac32478365f894eb975083fa514cfa431536b8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\course\\courseListPage.tpl',
      1 => 1465386849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '286555758087e4058b5-25009562',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'activeCourses' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5758087e4f7bf0_74092678',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5758087e4f7bf0_74092678')) {function content_5758087e4f7bf0_74092678($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/courseList.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/search.css" rel="stylesheet">
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/search.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/pagination.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/courseList.js"></script>


<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Course List</h2>
<input type="hidden" id="pageCount" value="<?php echo $_smarty_tpl->tpl_vars['activeCourses']->value[0]['nrPages'];?>
">
<?php echo $_smarty_tpl->tpl_vars['activeCourses']->value[0]['nrPages'];?>

<p>
  A course may take up to 3 years if it is a Bachelor's Degree or 5 years if it is a Master's or PhD. <br>Futhermore each course contains multiple curricular units grouped by year.
</p>
<?php echo $_smarty_tpl->getSubTemplate ('common/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('course/courseList.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="clearfix"></div>
  <ul class="pagination pull-right">
  </ul>

</div>
<!-- END OF CONTAINER -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
