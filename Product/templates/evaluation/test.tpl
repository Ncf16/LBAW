     {if $edit==true }
     <h4 class="page-header">Edit Test</h4>
     {else}
      <h4 class="page-header">Create Test</h4>
      {/if}
          <div class="form-group">
            <label class="col-md-3 control-label">Test Exam Duration</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input type=number id="duration" name="duration"  min=1 max=100 step=1 class="form-control"> <!--15m increments -->
                   {if $edit==true }
                  <script >
                    fillField("duration","{$test['duration']}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
