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
         {$infoToEdit=getCourseInfo($smarty.get.courseID)}
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
                   {if $edit==true }
                  <script >
                    fillField("course_name","{$infoToEdit["name"]}");
                  </script>
                  {/if}
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Abbreviation</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input name="course_abbreviation" maxlength="5" id="course_abbreviation" placeholder="Abbreviation" class="form-control" type="text" required>
                  {if $edit==true }
                  <script >
                    fillField("course_abbreviation","{$infoToEdit["abbreviation"]}");
                  </script>
                  {/if}
               </div>
            </div>
         </div>
          
         <div class="form-group">
            <label class="col-md-3 control-label">Director</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <!--
                  <input name="course_director" id="course_director" placeholder="Course Director" value="" list="course_director_list" class="form-control" type="text" required >
                  <datalist name="course_director_list" id="course_director_list" >
                     {$teachers=getAllTeachers()}
                     <option value="0" selected="selected">Select Course Director</option>
                     {foreach from=$teachers item=teacher}
                     <option value={$teacher.academiccode}>{$teacher.name}</option>
                     {/foreach} 
                  </datalist>
                    -->
                  <select name="course_director" id="course_director" placeholder="Course Director" class="form-control" required>
                     {$teachers=getAllTeachers()}
                     <option value="0" selected="selected">Select Course Director</option>
                     {foreach from=$teachers item=teacher}
                     <option value={$teacher.academiccode}>{$teacher.name}</option>
                     {/foreach} 
                  </select>
                  {if $edit==true }
                  <script >
                    fillField("course_director","{$infoToEdit["teachercode"]}");
                  </script>
                  {/if}
                 
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Creation Date</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="date" name="course_fundate" id="course_fundate" class="form-control"  required>
                  {if $edit==true }
                  <script >
                    fillField("course_fundate","{$infoToEdit["creationdate"]}");
                  </script>
                  {/if}
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Duration</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  <input name="course_duration" id="course_duration" placeholder="0" class="form-control" type="number" min="1" max="6" readonly>
                  {if $edit==true }
                  <script >
                    fillField("course_duration","{$infoToEdit["courseYears"]}");
                  </script>
                  {/if}
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
                  {if $edit==true }
                  <script >
                    fillField("course_degree","{$infoToEdit["coursetype"]}");
                  </script>
                  {/if}
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Description</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <textarea class="form-control"  name="course_description" id="course_description" cols="50" row="5"  ></textarea>
                  {if $edit==true }
                  <script >
                    fillField("course_description","{$infoToEdit["description"]}");
                  </script>
                  {/if}
               </div>
            </div>
         </div>
         
         <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
              {if $edit==true }
                <button id="submitNewCourse" type="submit" class="btn btn-primary">Edit Course</button>
              {else}
               <button id="submitNewCourse" type="submit" class="btn btn-primary">Create New Course</button>
              {/if}
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