<?php /* Smarty version Smarty-3.1.15, created on 2016-04-28 02:27:11
         compiled from "C:\Users\Filipe\Desktop\FEUP\XAMPP\htdocs\LBAW\Product\templates\course\courseList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3249157215028b4a841-44001610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8df4ebd54548778cb7813cb619e18af918137a8' => 
    array (
      0 => 'C:\\Users\\Filipe\\Desktop\\FEUP\\XAMPP\\htdocs\\LBAW\\Product\\templates\\course\\courseList.tpl',
      1 => 1461803103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3249157215028b4a841-44001610',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57215028bd2e89_38732342',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'activeCourses' => 0,
    'course' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57215028bd2e89_38732342')) {function content_57215028bd2e89_38732342($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/books.jpg" class="img-responsive" alt="CourseBooks">
 
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/courseList.css" rel="stylesheet">

<table class="table table-striped">
  <thead>
    <tr class="head">
      <th class="text-center">Courses</th>
      <th class="text-center">Director</th>
      <th class="text-center">Creation Date</th>
      <th class="text-center">Duration (years)</th>
	  <th class="text-center">Academic Degree </th>
      <th class="text-center">Number Of Students</th>
    </tr>
  </thead>
  <tbody class="courseListBody">

  <?php  $_smarty_tpl->tpl_vars['course'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['course']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activeCourses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['course']->key => $_smarty_tpl->tpl_vars['course']->value) {
$_smarty_tpl->tpl_vars['course']->_loop = true;
?>
     <tr>
      <th scope="row"><a href='coursePage.php' ><?php echo $_smarty_tpl->tpl_vars['course']->value['coursename'];?>
</a> </th>
      <td ><a href='personalPage.php'><?php echo $_smarty_tpl->tpl_vars['course']->value['diretorname'];?>
</a> </td>
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
      <td><?php echo $_smarty_tpl->tpl_vars['course']->value['count'];?>
</td>
    </tr>
   <?php } ?>
  
  
  </tbody>
</table>
<p>
	A course may take up to 3 years if it is a Bachelor or 5 years if it is a Master. Futhermore each course contains multiple curricular units grouped by year.
</p>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
