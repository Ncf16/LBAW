{include file='common/header.tpl'} 
<script src="{$BASE_URL}js/courseFormValidation.js"></script>
<div class="container">
<div class="row">
   <div class="col-md-12">
     {if $edit==true }
     <h2 class="page-header">Edit Course</h2>
     {else}
      <h2 class="page-header">Create Course</h2>
      {/if}
      <form id="courseForm" class="well form-horizontal" action="#" method="post">
         {if $edit==true  }
         <input hidden id="courseID" name="courseID" value="{$infoToEdit.code}" />
         <input id="Action" name="Action" hidden value="Edit">
         {else}
         <input id="Action" name="Action" hidden value="Create">
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
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
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
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
          
         <div class="form-group">
            <label class="col-md-3 control-label">Director</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <select name="course_director" id="course_director" class="form-control" required>
                     <option value="" disabled selected>Select Course Director</option>
                     {foreach from=$teachers item=teacher}
                     <option value={$teacher.academiccode}>{$teacher.name}:{$teacher.username}</option>
                     {/foreach} 
                  </select>
                  {if $edit==true }
                  <script >
                    fillField("course_director","{$infoToEdit["teachercode"]}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
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
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
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
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Degree</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                  <select name="course_degree" id="course_degree" class="form-control" required>
                     <option value="" disabled selected>Select Academic Degree</option>
                     <option>Bachelor</option>
                     <option>Masters</option>
                     <option>PhD</option>
                  </select> 
                  {if $edit==true }
                  <script >
                    fillField("course_degree","{$infoToEdit["coursetype"]}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Description</label>  
               <div class="col-md-8">
                  <textarea class="form-control"  name="course_description" id="course_description" cols="50" ></textarea>
                  {if $edit==true }
                  <script >
                    fillField("course_description","{$infoToEdit["description"]}");
                  </script>
                  {/if}
            </div>
             <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
         </div>
           <div class="row">
         <span class="glyphicon glyphicon-asterisk"></span> 
             <strong>
         Required Field
      </strong>
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
</div>
{include file='common/footer.tpl'}