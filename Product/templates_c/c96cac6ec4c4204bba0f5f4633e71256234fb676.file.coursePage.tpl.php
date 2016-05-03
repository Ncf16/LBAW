<?php /* Smarty version Smarty-3.1.15, created on 2016-05-03 02:37:09
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\course\coursePage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138725727f2b564ced0-13252277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c96cac6ec4c4204bba0f5f4633e71256234fb676' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\course\\coursePage.tpl',
      1 => 1462235658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138725727f2b564ced0-13252277',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'course' => 0,
    'BASE_URL' => 0,
    'syllabusYears' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5727f2b568e1a3_64399865',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5727f2b568e1a3_64399865')) {function content_5727f2b568e1a3_64399865($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container ">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header"><?php echo $_smarty_tpl->tpl_vars['course']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['course']->value['abbreviation'];?>
)</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <h2>Description</h2>
      <p><?php echo $_smarty_tpl->tpl_vars['course']->value['description'];?>
</p>
    </div>
    <div class="col-md-4">
      <h2>Details</h2>
      <p>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
        <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personalPage.php?person=<?php echo $_smarty_tpl->tpl_vars['course']->value['directorusername'];?>
'>Director: <?php echo $_smarty_tpl->tpl_vars['course']->value['director'];?>
</a>
      </p>
      <p>
        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Creation Date: <?php echo $_smarty_tpl->tpl_vars['course']->value['creationdate'];?>

      </p>
      <p>
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Duration: 
        <?php echo $_smarty_tpl->tpl_vars['course']->value['courseYears'];?>

        years
      </p>
      <p>
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>Academic Degree: <?php echo $_smarty_tpl->tpl_vars['course']->value['coursetype'];?>

      </p>
       <p>
        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Number of Students: <?php echo $_smarty_tpl->tpl_vars['course']->value['studentcount'];?>

      </p>

    </div>
  </div>

  <p>
    <div class="row">
      <div class="col-lg-12">
        <h2>Syllabus</h2>
      </div>
    </div>
  </p>

  <div class="row">
    <div class="col-xs-2">
      <div class="form-group" >
        <input type="hidden" id="course_code" value="<?php echo $_smarty_tpl->tpl_vars['course']->value['code'];?>
">
        <label for="sel1">Year:</label>
        <select class="form-control" id="syllabus_year" >
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['syllabusYears']->value['nrYears']-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['syllabusYears']->value['nrYears']-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
          <option><?php echo $_smarty_tpl->tpl_vars['syllabusYears']->value[$_smarty_tpl->tpl_vars['i']->value]['year'];?>
</option>
        <?php }} ?>
        </select>
      </div>
    </div>
  </div>

  <div id="cu_response">
  </div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
