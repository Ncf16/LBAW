<?php /* Smarty version Smarty-3.1.15, created on 2016-05-03 06:40:10
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\curricularUnit\units.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5464572824c580e7f7-12685030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eff72dc29a26bba55f064f35931dd51e1bca3a99' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\curricularUnit\\units.tpl',
      1 => 1462250408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5464572824c580e7f7-12685030',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572824c58fcca7_16974733',
  'variables' => 
  array (
    'units' => 0,
    'unit' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572824c58fcca7_16974733')) {function content_572824c58fcca7_16974733($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
  			<th>Name</th>
  			<th>Area</th>
  			<th>Credits</th>
  			<th>Edit</th>
  			<th>Delete</th>
  		</thead>
  		<tbody>
  			<?php  $_smarty_tpl->tpl_vars['unit'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['unit']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['units']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['unit']->key => $_smarty_tpl->tpl_vars['unit']->value) {
$_smarty_tpl->tpl_vars['unit']->_loop = true;
?>
  			<tr>
  				<td><?php echo $_smarty_tpl->tpl_vars['unit']->value['name'];?>
</td>
  				<td><?php echo $_smarty_tpl->tpl_vars['unit']->value['area'];?>
</td>
  				<td><?php echo $_smarty_tpl->tpl_vars['unit']->value['credits'];?>
</td><td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
  				<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
  			</tr>
  			<?php } ?>
  		</tbody>
  	</table>

  	<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  		<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  		<li class="active"><a href="#">1</a></li>
  		<li><a href="#">2</a></li>
  		<li><a href="#">3</a></li>
  		<li><a href="#">4</a></li>
  		<li><a href="#">5</a></li>
  		<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
  	</ul>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
