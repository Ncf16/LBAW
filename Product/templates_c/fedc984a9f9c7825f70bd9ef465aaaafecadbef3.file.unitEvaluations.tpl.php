<?php /* Smarty version Smarty-3.1.15, created on 2016-04-28 04:30:36
         compiled from "C:\Users\Filipe\Desktop\FEUP\XAMPP\htdocs\LBAW\Product\templates\curricularUnit\unitEvaluations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25610572175cc9725e6-04198585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fedc984a9f9c7825f70bd9ef465aaaafecadbef3' => 
    array (
      0 => 'C:\\Users\\Filipe\\Desktop\\FEUP\\XAMPP\\htdocs\\LBAW\\Product\\templates\\curricularUnit\\unitEvaluations.tpl',
      1 => 1461810635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25610572175cc9725e6-04198585',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572175cc9993d9_33962358',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572175cc9993d9_33962358')) {function content_572175cc9993d9_33962358($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Evaluations
      <small>Laboratório de Base de Dados e Aplicações Web</small>
      </h2>
    </div>
  </div>

<div class="row">
  <div class="col-md-3 col-sm-6">
      <div class="panel panel-default text-center">
          <div class="panel-heading">
              <span class="fa-stack fa-5x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-suitcase fa-stack-1x fa-inverse"></i>
              </span>
              <br>
              <h4>Group Work</h4>
          </div>
          <div class="panel-body">
              <p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Name: Project 1</p>
              <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date: 10 May</p>
              <p><span class="glyphicon glyphicon-sort" aria-hidden="true"></span> Final Grade Weight: 20%</p>
              <a href="#" class="btn btn-primary">More Info</a>
          </div>
      </div>
  </div>
  <div class="col-md-3 col-sm-6">
      <div class="panel panel-default text-center">
          <div class="panel-heading">
              <span class="fa-stack fa-5x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
              </span>
              <br>
              <h4>Assignment</h4>
          </div>
          <div class="panel-body">
              <p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Name: Assignement 1</p>
              <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date: 10 May</p>
              <p><span class="glyphicon glyphicon-sort" aria-hidden="true"></span> Final Grade Weight: 20%</p>
              <a href="#" class="btn btn-primary">More Info</a>
          </div>
      </div>
  </div>
  <div class="col-md-3 col-sm-6">
      <div class="panel panel-default text-center">
          <div class="panel-heading">
              <span class="fa-stack fa-5x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
              </span>
              <br>
              <h4>Assignment</h4>
          </div>
          <div class="panel-body">
              <p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Name: Assignement 2</p>
              <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date: 10 May</p>
              <p><span class="glyphicon glyphicon-sort" aria-hidden="true"></span> Final Grade Weight: 20%</p>
              <a href="#" class="btn btn-primary">More Info</a>
          </div>
      </div>
  </div>
  <div class="col-md-3 col-sm-6">
      <div class="panel panel-default text-center">
          <div class="panel-heading">
              <span class="fa-stack fa-5x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-book fa-stack-1x fa-inverse"></i>
              </span>
              <br>
              <h4>Exam</h4>
          </div>
          <div class="panel-body">
              <p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Name: Final Exam</p>
              <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date: 10 May</p>
              <p><span class="glyphicon glyphicon-sort" aria-hidden="true"></span> Final Grade Weight: 40%</p>
              <a href="#" class="btn btn-primary">More Info</a>
          </div>
      </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
