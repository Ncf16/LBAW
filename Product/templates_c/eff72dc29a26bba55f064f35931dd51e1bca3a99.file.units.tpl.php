<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 00:30:53
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\curricularUnit\units.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77055728afc99420f2-74336181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eff72dc29a26bba55f064f35931dd51e1bca3a99' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\curricularUnit\\units.tpl',
      1 => 1462314604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77055728afc99420f2-74336181',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5728afc9a0d324_52260259',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5728afc9a0d324_52260259')) {function content_5728afc9a0d324_52260259($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Curricular Units</small>
      </h2>
    </div>
  </div>

  <div class="row">
  	<table id="mytable" class="table table-bordred table-striped">
  		<thead>
  			<th class="col-md-5">Name</th>
  			<th class="col-md-3">Area</th>
  			<th class="col-md-2">Credits</th>
  			<th class="col-md-1">Edit</th>
  			<th class="col-md-1">Delete</th>
  		</thead>
  		<tbody id="units">
  		</tbody>
  	</table>

  	<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  	</ul>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/units.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
