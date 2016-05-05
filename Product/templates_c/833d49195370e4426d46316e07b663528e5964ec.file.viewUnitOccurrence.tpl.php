<?php /* Smarty version Smarty-3.1.15, created on 2016-05-05 01:04:02
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\curricularUnit\viewUnitOccurrence.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26565572a2a36b26a69-63031243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '833d49195370e4426d46316e07b663528e5964ec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\curricularUnit\\viewUnitOccurrence.tpl',
      1 => 1462402769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26565572a2a36b26a69-63031243',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572a2a36b70df1_76753843',
  'variables' => 
  array (
    'unit' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572a2a36b70df1_76753843')) {function content_572a2a36b70df1_76753843($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="unitPage" class="container">
  <div class="row">
    <div class="col-sm-10">
      <h1 class="page-header hidden-sm hidden-xs"><?php echo $_smarty_tpl->tpl_vars['unit']->value['name'];?>
</h1>
     
    </div>
    <div class="col-sm-2">
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" id="actionsButton" type="button" data-toggle="dropdown">Actions
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="classes.php">Classes</a></li>
          <li><a href="#">Attendance</a></li>
          <li><a href="#">Content</a></li>
          <li><a href="unitEvaluations.php">Evaluations</a></li>
          <li><a href="#">Create Evaluation</a></li>         
        </ul>
      </div>
    </div>
    
  </div>

      <hr>
  <div class="row">

    <div class="col-md-5 col-md-offset-1 ">
      <div class="text-center">
        <h2>General Information</h2>
      </div>
      <table class="table table-responsive ucInfo">
          <tr>
            <td>Course: <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/coursePage.php?course=<?php echo $_smarty_tpl->tpl_vars['unit']->value['courseid'];?>
"><?php echo $_smarty_tpl->tpl_vars['unit']->value['course'];?>
</a></td>
          </tr>
          <tr>
            <td>School Year: <?php echo $_smarty_tpl->tpl_vars['unit']->value['year'];?>
</td>
          </tr>
          <tr>
            <td>Area: <?php echo $_smarty_tpl->tpl_vars['unit']->value['area'];?>
</td>
          </tr>
           <tr>
            <td>Credits: <?php echo $_smarty_tpl->tpl_vars['unit']->value['credits'];?>
</td>
          </tr>
          <tr>
            <td>Course Year: <?php echo $_smarty_tpl->tpl_vars['unit']->value['curricularyear'];?>
</td>
          </tr>
          <tr>
            <td>Course Semester: <?php echo $_smarty_tpl->tpl_vars['unit']->value['curricularsemester'];?>
</td>
          </tr>
       </table>
    </div>
    <div class="col-md-5">
      <div class="text-center">
        <h2>Teaching Information</h2>
      </div>
      <!-- teachers table-->
      <table class="table table-responsive ucInfo">
        <tr>
          <td>Regent: <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personalPage.php?person=<?php echo $_smarty_tpl->tpl_vars['unit']->value['regent'];?>
"><?php echo $_smarty_tpl->tpl_vars['unit']->value['regentname'];?>
</a></td>
        </tr>
        <tr>
          <td>Language: Português</td>
        </tr>
        <tr>
          <td>Page: <a href="<?php echo $_smarty_tpl->tpl_vars['unit']->value['externalpage'];?>
"><?php echo $_smarty_tpl->tpl_vars['unit']->value['externalpage'];?>
</a> </td>
        </tr>
      </table>
      <!-- teachers table end-->
    </div>
  </div>

  <br>
  <p>
  <hr>
    <ul class="nav nav-pills ucNavPills">
      <li class="active"><a href="#competences" data-toggle="tab">Learning Competences</a></li>
      <li><a href="#stuff2" data-toggle="tab">Requirements</a></li>
      <li><a href="#stuff3" data-toggle="tab">Curricular Programme</a></li>
      <li><a href="#stuff4" data-toggle="tab">Evaluation</a></li>
      <li><a href="#stuff5" data-toggle="tab">Bibliography</a></li>
    </ul>

    <div class="tab-content">
      <div class="row tab-pane fade in active" id="competences">
        <div class="col-lg-12 ">
          <h2>Learning Objectives and Competences</h2>
          <p><?php echo $_smarty_tpl->tpl_vars['unit']->value['competences'];?>
</p>
          
        </div>
      </div>

    
      <div class="row tab-pane fade" id="stuff2">
        <div class="col-lg-12">
          <h2>Pre-Requirements and Co-Requirements</h2>
          <p><?php echo $_smarty_tpl->tpl_vars['unit']->value['requirements'];?>
</p>
          
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff3">
        <div class="col-lg-12">
         <h2>Curricular Programme</h2>
          <p><?php echo $_smarty_tpl->tpl_vars['unit']->value['programme'];?>
</p>
          
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff4">
        <div class="col-lg-12">
          <h2>Evaluation</h2>
          <p><?php echo $_smarty_tpl->tpl_vars['unit']->value['evaluation'];?>
</p>
          
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff5">
        <div class="col-lg-12">
          <h2>Bibliography</h2>
          <p><?php echo $_smarty_tpl->tpl_vars['unit']->value['bibliography'];?>
</p>
          <hr>
        </div>
      </div>
    </div>
  </p>
  <?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
