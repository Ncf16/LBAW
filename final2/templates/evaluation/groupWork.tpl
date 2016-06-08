     {if $edit==true }
     <h4 class="page-header">Edit Group Work</h4>
     {else}
      <h4 class="page-header">Create Group Work</h4>
      {/if}
          <div class="form-group">
            <label class="col-md-3 control-label">Minimum Elements</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input type=number id="minElements" name="minElements" min=2 step=1 class="form-control"> <!--15m increments -->
                   {if $edit==true }
                  <script >
                    fillField("minElements","{$groupWork['minelements']}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
               <div class="form-group">
            <label class="col-md-3 control-label">Maximum Elements</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input type=number id="maxElements" name="maxElements" min=2 step=1 class="form-control"> <!--15m increments -->
                   {if $edit==true }
                  <script >
                    fillField("maxElements","{$groupWork['maxelements']}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
