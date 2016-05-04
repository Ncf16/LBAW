<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 22:56:04
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\course\courseListPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13459572a60d4cfed03-48291982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29845d1e147b15907f5cc622201d75dc4e61443d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\course\\courseListPage.tpl',
      1 => 1462395362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13459572a60d4cfed03-48291982',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572a60d4d3f954_47905778',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572a60d4d3f954_47905778')) {function content_572a60d4d3f954_47905778($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/courseList.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/search.css" rel="stylesheet">
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/search.js"></script>


<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Course List</h2>
<p>
  A course may take up to 3 years if it is a Bachelor's Degree or 5 years if it is a Master's or PhD. <br>Futhermore each course contains multiple curricular units grouped by year.
</p>
<?php echo $_smarty_tpl->getSubTemplate ('common/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('course/courseList.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




</div>
<!-- END OF CONTAINER -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
