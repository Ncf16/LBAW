<?php /* Smarty version Smarty-3.1.15, created on 2016-05-02 03:07:49
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\course\coursePage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:638057264431e91479-05566031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c96cac6ec4c4204bba0f5f4633e71256234fb676' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\course\\coursePage.tpl',
      1 => 1462151268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '638057264431e91479-05566031',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57264431ec3983_14394837',
  'variables' => 
  array (
    'course' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57264431ec3983_14394837')) {function content_57264431ec3983_14394837($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header"><?php echo $_smarty_tpl->tpl_vars['course']->value['name'];?>
</h2>
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
        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Creation Date: 2006/2007
      </p>
      <p>
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Duration: 5 years
      </p>
      <p>
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>Academic Degree: Master
      </p>
       <p>
        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Number of Students: 120
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
    <div class="col-lg-12">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year1">1 Year</a>
            </h4>
          </div>
          <div id="year1" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#semester11">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester11" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#semester12">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester12" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year2">2 Year</a>
            </h4>
          </div>
          <div id="year2" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion2">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion2" href="#semester21">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester21" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion2" href="#semester22">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester22" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year3">3 Year</a>
            </h4>
          </div>
          <div id="year3" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion3">
                 <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion3" href="#semester31">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester31" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion3" href="#semester32">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester32" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year4">4 Year</a>
            </h4>
          </div>
          <div id="year4" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion4">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion4" href="#semester41">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester41" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion4" href="#semester42">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester42" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year5">5 Year</a>
            </h4>
          </div>
          <div id="year5" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion5">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion5" href="#semester51">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester51" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion5" href="#semester52">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester52" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
