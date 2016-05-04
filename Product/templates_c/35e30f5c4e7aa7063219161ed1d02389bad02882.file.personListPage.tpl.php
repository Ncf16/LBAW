<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 23:52:45
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\person\personListPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11201572a54368c9dd9-18823673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35e30f5c4e7aa7063219161ed1d02389bad02882' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\person\\personListPage.tpl',
      1 => 1462398763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11201572a54368c9dd9-18823673',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572a543691f449_77336371',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572a543691f449_77336371')) {function content_572a543691f449_77336371($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 
 <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/personList.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/search.css" rel="stylesheet">
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/search.js"></script>

<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Person List</h2>

<?php echo $_smarty_tpl->getSubTemplate ('common/search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('person/personList.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="page_buttons">

</div>

</div>
<!-- END OF CONTAINER -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
