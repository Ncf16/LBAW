     {if $edit==true }
     <h4 class="page-header">Edit Exam</h4>
     {else}
      <h4 class="page-header">Create Exam</h4>
      {/if}
         {if $edit==true  }
         <input hidden id="courseID" name="courseID" value="{$infoToEdit.code}" />
         <input id="Action" name="Action" hidden value="Edit">
         {else}
         <input id="Action" name="Action" hidden value="Create">
         {/if}
          <div class="form-group">
            <label class="col-md-3 control-label">Exam Duration</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input type=number id="duration" name="duration" min=1 max=100 step=1 class="form-control"> <!--15m increments -->
                   {if $edit==true }
                  <script >
                    fillField("course_name","{$infoToEdit["name"]}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
