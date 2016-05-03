{include file='common/header.tpl'} 
<script src="{$BASE_URL}js/courseFormValidation.js"></script>
<div class="container">
<div class="row">
   <div class="col-md-6">
      <h2 class="page-header">Create Course</h2>
      <form id="courseForm" class="well form-horizontal" action="#" method="post" id="courseCreation_form">
         {if isset($smarty.get.courseID) }
         <input id="Action" name="Action" hidden value="Edit">
         {$edit=true}
         {else}
         <input id="Action" name="Action" hidden value="Create">
         {$edit=false}
         {/if}
         <div class="form-group">
            <label class="col-md-3 control-label">Name</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input name="course_name" id="course_name" placeholder="Course Name" class="form-control" type="text" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Abbreviation</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input name="course_abbreviation" maxlength="5" id="course_abbreviation" placeholder="Abbreviation" class="form-control" type="text" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Director</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <select name="course_director" id="course_director" placeholder="Course Director" class="form-control" required>
                     {$teachers=getAllTeachers()}
                     <option value="0" selected="selected">Select Course Director</option>
                     {foreach from=$teachers item=teacher}
                     <option value={$teacher.academiccode}>{$teacher.name}</option>
                     {/foreach} 
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Creation Date</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="date" name="course_fundate" id="course_fundate" class="form-control"  required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Duration</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  <input name="course_duration" id="course_duration" placeholder="0" class="form-control" type="number" min="1" max="6" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Degree</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                  <select name="course_degree" id="course_degree" class="form-control" required>
                     <option selected="selected">Select Academic Degree</option>
                     <option>Bachelor</option>
                     <option>Masters</option>
                     <option>PhD</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Description</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <textarea class="form-control"  name="course_description" id="course_description" cols="50" row="5"  ></textarea>
               </div>
            </div>
         </div>
         
         <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
               <button id="submitNewCourse" type="submit" class="btn btn-primary">Create New Course</button>
            </div>
         </div>
         <div id="message_status">
         </div>
         <div id="error_messages">
            {foreach $ERROR_MESSAGES as $error}
            <div class="error">{$error}<a class="close" href="#">X</a></div>
            {/foreach}
         </div>
         <div id="success_messages">
            {foreach $SUCCESS_MESSAGES as $success}
            <div class="success">{$success}<a class="close" href="#">X</a></div>
            {/foreach}
         </div>
      </form>
   </div>
</div>
{include file='common/footer.tpl'}

<!-- 
<input name="course_students" placeholder="Course Director" class="form-control" type="hidden">
-->