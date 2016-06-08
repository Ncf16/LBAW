<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 13:18:32
         compiled from "C:\xampp\htdocs\LBAW\final\templates\person\personalPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135185757ff085697d4-07129516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80181fbcfbcd21fd98f9fdad19e342b00113bea2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\person\\personalPage.tpl',
      1 => 1465267803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135185757ff085697d4-07129516',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'privateName' => 0,
    'person' => 0,
    'seeUnits' => 0,
    'viewerType' => 0,
    'student' => 0,
    'courseCode' => 0,
    'privatePhone' => 0,
    'privateDate' => 0,
    'privateAddr' => 0,
    'privateNat' => 0,
    'USERNAME' => 0,
    'currentCourse' => 0,
    'courses' => 0,
    'course' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5757ff0876f130_61529231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5757ff0876f130_61529231')) {function content_5757ff0876f130_61529231($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="personalPage">
   <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/personalPage.css" rel="stylesheet">
   <!-- Page Content -->
   <div class="container">
      <!-- Portfolio Item Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Personal Page
            <?php if ($_smarty_tpl->tpl_vars['privateName']->value==false) {?>
               <small><?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>
  (<?php echo $_smarty_tpl->tpl_vars['person']->value['persontype'];?>
)</small>
               <?php }?>
               <?php if ($_smarty_tpl->tpl_vars['seeUnits']->value==true) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/editPerson.php?personUsr=<?php echo $_smarty_tpl->tpl_vars['person']->value['username'];?>
" class="btn btn-xs btn-primary">Edit Page</a> 
                 <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Student/signingToCU.php?student=<?php echo $_smarty_tpl->tpl_vars['person']->value['username'];?>
" class="btn btn-xs btn-primary">Sign up</a> 
                <?php }?>

                  <?php if ($_smarty_tpl->tpl_vars['person']->value['persontype']=='Student'&&$_smarty_tpl->tpl_vars['viewerType']->value=='Admin') {?>
                <a  data-toggle="modal" href="#studentCourseEdit" class="btn btn-xs btn-primary">Change Student Course</a>
                <?php }?>
            </h1>
         </div>
      </div>
      <!-- /.row -->
      <!-- Portfolio Item Row -->
      <div class="row">
         <div class="col-md-3">
            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/Students/avatar.png" alt="studentImg"> <!--  src="http://placehold.it/750x500"-->
         </div>
           <?php if ($_smarty_tpl->tpl_vars['person']->value['persontype']=='Student'&&$_smarty_tpl->tpl_vars['student']->value['currentyear']!==null) {?>
         <div class="col-md-2">
           
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/coursePage.php?course=<?php echo $_smarty_tpl->tpl_vars['courseCode']->value;?>
"> <h3>Course: <?php echo $_smarty_tpl->tpl_vars['student']->value['coursename'];?>
 </h3></a>
            <ul>
               <li>Current Year: <?php echo $_smarty_tpl->tpl_vars['student']->value['currentyear'];?>
</li>
               <li>Starting Year: <?php echo $_smarty_tpl->tpl_vars['student']->value['startyear'];?>
</li>
            </ul>
           
         </div>
           <?php }?>
         <div class="col-md-3">
            <h3>Personal Details</h3>
            <ul>
              <?php if ($_smarty_tpl->tpl_vars['privatePhone']->value==false) {?>
               <li>Mobile Phone: <?php echo $_smarty_tpl->tpl_vars['person']->value['phonenumber'];?>
</li>
               <?php }?>
               <li>Current Status:
                   <?php if (isset($_smarty_tpl->tpl_vars['person']->value['finishyear'])&&$_smarty_tpl->tpl_vars['person']->value['coursegrade']>10) {?>
                   Course completed
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['person']->value['finishyear'])) {?>
                  Not valid
                  <?php } else { ?>
                  Valid
                   <?php }?>
                </li>
            </ul>
         </div>
         <div class="col-md-4" >
            <div class="panel-group" id="accordion">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#info">Sociodemographic Data</a>
                     </h4>
                  </div>
                  <div id="info" class="panel-collapse collapse">
                     <div class="panel-body">
                        <p>
                         <?php if ($_smarty_tpl->tpl_vars['privateDate']->value==false) {?>
                              Birth Date: <?php echo $_smarty_tpl->tpl_vars['person']->value['birthdate'];?>

                           <br>
                         <?php }?>
                     
                         <?php if ($_smarty_tpl->tpl_vars['privateAddr']->value==false) {?>
                            Address: <?php echo $_smarty_tpl->tpl_vars['person']->value['address'];?>

                           <br>
                         <?php }?>
         
                         <?php if ($_smarty_tpl->tpl_vars['privateNat']->value==false) {?>
                             Nationality: <?php echo $_smarty_tpl->tpl_vars['person']->value['nationality'];?>

                         <?php }?>
                        </p>
                     </div>
                  </div>
               </div>
            </div >
         </div>
      </div>
      <!-- /.row                <h3>Sociodemographic data </h3>	 -->
         
         <?php if ($_smarty_tpl->tpl_vars['person']->value['username']==$_smarty_tpl->tpl_vars['USERNAME']->value) {?>

            <?php if ($_smarty_tpl->tpl_vars['person']->value['persontype']=='Student') {?>
         <!-- Related Projects Row -->
         <div class="row"  id="personalPageBtnContainer">
            <div class="col-lg-12">
               <h3 class="page-header">Personal Links</h3>
            </div>
            <div class="col-sm-3 col-xs-5" >
               <a href="#" class="btn btn-primary btn-primary" >Main Page </a>
            </div>
            <div class="col-sm-3 col-xs-5">
               <a href="#" class="btn btn-primary btn-primary">Curricular Units</a>
            </div>
            <div class="col-sm-3 col-xs-5">
               <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Request/requestList.php" class="btn btn-primary btn-primary"> Submitted Requests</a>
            </div>
            <div class="col-sm-3 col-xs-5">
               <a href="#" class="btn btn-primary btn-primary">Currical Units Taken</a>
            </div>
            <!--   -->
             </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['person']->value['persontype']=='Admin') {?>
            <div class="row"  id="personalPageBtnContainer">
               <div class="col-sm-12 col-xs-5 text-center" >
                  <a href= "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Admin/admin.php" class="btn btn-primary btn-primary" > Admin Page </a>
               </div>
             </div>
             <?php }?>

         <?php }?>
         <!-- /.row -->
            <?php if ($_smarty_tpl->tpl_vars['person']->value['persontype']=='Student'&&$_smarty_tpl->tpl_vars['seeUnits']->value==true) {?>
          <div class="row" id="studentsGrades">
            <h2>Curricular Units</h2>
              <input hidden value="<?php echo $_smarty_tpl->tpl_vars['student']->value['academiccode'];?>
" id="studentID"/>
         <input hidden value="<?php echo $_smarty_tpl->tpl_vars['courseCode']->value;?>
" id="courseID"/>
          
         <div id="cuResponse">
         </div>
         </div>
            <?php }?>
   </div>
</div>
<div id="studentCourseEdit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Change Course </h4>
            </div>
            <div class="modal-body">
                <p> Current Course: <?php echo $_smarty_tpl->tpl_vars['currentCourse']->value['name'];?>
 </p>
                <input hidden id="currentCourseCode" value="<?php echo $_smarty_tpl->tpl_vars['currentCourse']->value['code'];?>
" />
                 <input hidden value="<?php echo $_smarty_tpl->tpl_vars['student']->value['academiccode'];?>
" id="studentAcademicCode"/>
               <select name="chaneCourse" id="chaneCourse" class="form-control" required>
                     <option value="" disabled selected>Select Course</option>
                     <?php  $_smarty_tpl->tpl_vars['course'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['course']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['courses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['course']->key => $_smarty_tpl->tpl_vars['course']->value) {
$_smarty_tpl->tpl_vars['course']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['currentCourse']->value['code']==$_smarty_tpl->tpl_vars['course']->value['code']) {?>
                     <option value=<?php echo $_smarty_tpl->tpl_vars['course']->value['code'];?>
 disabled><?php echo $_smarty_tpl->tpl_vars['course']->value['name'];?>
:<?php echo $_smarty_tpl->tpl_vars['course']->value['abbreviation'];?>
</option>
                     <?php } else { ?>
                     <option value=<?php echo $_smarty_tpl->tpl_vars['course']->value['code'];?>
><?php echo $_smarty_tpl->tpl_vars['course']->value['name'];?>
:<?php echo $_smarty_tpl->tpl_vars['course']->value['abbreviation'];?>
</option>
                     <?php }?>
                     <?php } ?> 
                  </select>
                  <div id="modalErrors">
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submitNewCourseStudent" class="btn btn-default" data-dismiss="modal">Change Course</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Modal -->

 <?php }} ?>
