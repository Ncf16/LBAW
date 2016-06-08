<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 14:01:17
         compiled from "C:\xampp\htdocs\LBAW\final\templates\person\personListPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177475757fefdb58c89-52066496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acddaae10642389db38849125d7a50da4e1293c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\person\\personListPage.tpl',
      1 => 1465386850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177475757fefdb58c89-52066496',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5757fefdc08903_65248347',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5757fefdc08903_65248347')) {function content_5757fefdc08903_65248347($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 
 <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/personList.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/search.css" rel="stylesheet">
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/search.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/pagination.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/personList.js"></script>

<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Person List</h2>

<?php echo $_smarty_tpl->getSubTemplate ('common/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('person/personList.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  	</ul>

</div>
<!-- END OF CONTAINER -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
