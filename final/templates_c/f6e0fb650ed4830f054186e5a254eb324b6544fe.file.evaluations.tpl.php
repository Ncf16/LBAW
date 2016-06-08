<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 13:58:38
         compiled from "C:\xampp\htdocs\LBAW\final\templates\evaluation\evaluations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126095758086e838280-67276495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6e0fb650ed4830f054186e5a254eb324b6544fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\evaluation\\evaluations.tpl',
      1 => 1465386850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126095758086e838280-67276495',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'unit' => 0,
    'student' => 0,
    'evaluations' => 0,
    'evaluation' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5758086e9b3163_04772641',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5758086e9b3163_04772641')) {function content_5758086e9b3163_04772641($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">
        Evaluations
      <small><?php if ($_smarty_tpl->tpl_vars['unit']->value) {?><?php echo $_smarty_tpl->tpl_vars['unit']->value['name'];?>
 : <?php echo $_smarty_tpl->tpl_vars['unit']->value['year'];?>

        <?php } elseif ($_smarty_tpl->tpl_vars['student']->value) {?><?php echo $_smarty_tpl->tpl_vars['student']->value['name'];?>
 <?php }?></small>
      </h2>
    </div>
  </div>

<div class="row">
   
    <?php  $_smarty_tpl->tpl_vars['evaluation'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['evaluation']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['evaluations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['evaluation']->key => $_smarty_tpl->tpl_vars['evaluation']->value) {
$_smarty_tpl->tpl_vars['evaluation']->_loop = true;
?>
  <div class="col-md-3 col-sm-6">
      <div class="panel panel-default text-center">
          <div class="panel-heading">
              <span class="fa-stack fa-5x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa
                    <?php if ($_smarty_tpl->tpl_vars['evaluation']->value['evaluationtype']=='GroupWork') {?>fa-suitcase
                    <?php } elseif ($_smarty_tpl->tpl_vars['evaluation']->value['evaluationtype']=='Test') {?>fa-pencil
                    <?php } elseif ($_smarty_tpl->tpl_vars['evaluation']->value['evaluationtype']=='Exam') {?>fa-book
                    <?php } else { ?>fa-minus
                    <?php }?>
                    fa-stack-1x fa-inverse"></i>
              </span>
              <br>
              <h4><?php echo $_smarty_tpl->tpl_vars['evaluation']->value['evaluationtype'];?>
</h4>
          </div>
          <div class="panel-body">
             <?php if ($_smarty_tpl->tpl_vars['student']->value) {?>
              <p><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Curricular Unit: <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/CurricularUnit/viewUnitOccurrence.php?uc=<?php echo $_smarty_tpl->tpl_vars['evaluation']->value['cuoccurrenceid'];?>
"><?php echo $_smarty_tpl->tpl_vars['evaluation']->value['name'];?>
</a></p>
              <?php }?>
              <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date: <?php echo $_smarty_tpl->tpl_vars['evaluation']->value['evaluationdate'];?>
</p>
              <p><span class="glyphicon glyphicon-sort" aria-hidden="true"></span> Final Grade Weight: <?php echo $_smarty_tpl->tpl_vars['evaluation']->value['weight'];?>
</p>
              <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Evaluation/viewEvaluation.php?evaluationID=<?php echo $_smarty_tpl->tpl_vars['evaluation']->value['evaluationid'];?>
" class="btn btn-primary">More Info</a>
          </div>
      </div>
  </div>
  <?php } ?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
