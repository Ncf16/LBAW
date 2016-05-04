<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 18:46:08
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\course\syllabus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4105572a2667f07cd0-54534479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e42467efeeee224da8cdbcb70a06c9f56edb5435' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\course\\syllabus.tpl',
      1 => 1462380364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4105572a2667f07cd0-54534479',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572a2668192843_21488884',
  'variables' => 
  array (
    'syllabus' => 0,
    'i' => 0,
    'BASE_URL' => 0,
    'j' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572a2668192843_21488884')) {function content_572a2668192843_21488884($_smarty_tpl) {?><div class="row">
    <div class="col-lg-12">
      <div class="panel-group" id="accordion">

		<!-- YEAR DIVISION -->
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['syllabus']->value['courseYears']+1 - (1) : 1-($_smarty_tpl->tpl_vars['syllabus']->value['courseYears'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>

        <div class="panel panel-default">

          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">Year <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
            </h4>
          </div>

          <div id="year<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion1">
                <div class="row">

                <!-- 1st SEMESTER -->
                 <div class="col-md-6">
                    <div class="panel panel-default">

                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#semester<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
1">1st Semester</a>
                        </h4>
                      </div>

                      <!-- CURRICULAT UNITS -->
                      <div id="semester<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
1" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                          	<?php $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['j']->step = 1;$_smarty_tpl->tpl_vars['j']->total = (int) ceil(($_smarty_tpl->tpl_vars['j']->step > 0 ? count($_smarty_tpl->tpl_vars['syllabus']->value[$_smarty_tpl->tpl_vars['i']->value][1])-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['syllabus']->value[$_smarty_tpl->tpl_vars['i']->value][1])-1)+1)/abs($_smarty_tpl->tpl_vars['j']->step));
if ($_smarty_tpl->tpl_vars['j']->total > 0) {
for ($_smarty_tpl->tpl_vars['j']->value = 0, $_smarty_tpl->tpl_vars['j']->iteration = 1;$_smarty_tpl->tpl_vars['j']->iteration <= $_smarty_tpl->tpl_vars['j']->total;$_smarty_tpl->tpl_vars['j']->value += $_smarty_tpl->tpl_vars['j']->step, $_smarty_tpl->tpl_vars['j']->iteration++) {
$_smarty_tpl->tpl_vars['j']->first = $_smarty_tpl->tpl_vars['j']->iteration == 1;$_smarty_tpl->tpl_vars['j']->last = $_smarty_tpl->tpl_vars['j']->iteration == $_smarty_tpl->tpl_vars['j']->total;?> 
                            <tr>
                              <td class="text-center">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/CurricularUnit/viewUnitOccurrence.php?uc=<?php echo $_smarty_tpl->tpl_vars['syllabus']->value[$_smarty_tpl->tpl_vars['i']->value][1][$_smarty_tpl->tpl_vars['j']->value]['cuoccurrenceid'];?>
"> 
                                <!-- syllabus[year][semester][CU][name] -->
                                	<?php echo $_smarty_tpl->tpl_vars['syllabus']->value[$_smarty_tpl->tpl_vars['i']->value][1][$_smarty_tpl->tpl_vars['j']->value]['name'];?>
 
                                </a>
                              </td>
                            </tr>
                            <?php }} ?>                            
                           </table>
                        </div>
                      </div>
                      <!-- END OF CURRICULAR UNITS -->

                    </div>
                </div>
                <!-- END OF 1st SEMESTER -->

                <!-- 2nd SEMESTER -->
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#semester<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
2">2nd Semester</a>
                        </h4>
                      </div>

                      <!-- CURRICULAR UNITS -->
                      <div id="semester<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table table-striped uc-table">
                            <?php $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['k']->step = 1;$_smarty_tpl->tpl_vars['k']->total = (int) ceil(($_smarty_tpl->tpl_vars['k']->step > 0 ? count($_smarty_tpl->tpl_vars['syllabus']->value[$_smarty_tpl->tpl_vars['i']->value][2])-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['syllabus']->value[$_smarty_tpl->tpl_vars['i']->value][2])-1)+1)/abs($_smarty_tpl->tpl_vars['k']->step));
if ($_smarty_tpl->tpl_vars['k']->total > 0) {
for ($_smarty_tpl->tpl_vars['k']->value = 0, $_smarty_tpl->tpl_vars['k']->iteration = 1;$_smarty_tpl->tpl_vars['k']->iteration <= $_smarty_tpl->tpl_vars['k']->total;$_smarty_tpl->tpl_vars['k']->value += $_smarty_tpl->tpl_vars['k']->step, $_smarty_tpl->tpl_vars['k']->iteration++) {
$_smarty_tpl->tpl_vars['k']->first = $_smarty_tpl->tpl_vars['k']->iteration == 1;$_smarty_tpl->tpl_vars['k']->last = $_smarty_tpl->tpl_vars['k']->iteration == $_smarty_tpl->tpl_vars['k']->total;?>
                            <tr>
                              <td class="text-center">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/CurricularUnit/viewUnitOccurrence.php?uc=<?php echo $_smarty_tpl->tpl_vars['syllabus']->value[$_smarty_tpl->tpl_vars['i']->value][2][$_smarty_tpl->tpl_vars['k']->value]['cuoccurrenceid'];?>
">			<!-- syllabus[year][semester][CU][name] -->
                                	<?php echo $_smarty_tpl->tpl_vars['syllabus']->value[$_smarty_tpl->tpl_vars['i']->value][2][$_smarty_tpl->tpl_vars['k']->value]['name'];?>

                                </a>
                              </td>
                            </tr>
                            <?php }} ?>
                           </table>
                        </div>
                      </div>
                      <!-- END OF CURRICULAR UNITS -->

                    </div>
                </div>
                <!-- END OF 2nd SEMESTER -->

                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }} ?>
        <!-- END OF YEAR -->

      </div>
    </div>
  </div><?php }} ?>
