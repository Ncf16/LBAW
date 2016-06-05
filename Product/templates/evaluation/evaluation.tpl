  {include file='common/header.tpl'} 
  <script src="{$BASE_URL}js/evaluation.js"></script>
<div class="container">
<div class="row">
   <div class="col-md-12">
     {if $edit==true }
     <h2 class="page-header">Edit Evaluation</h2>
     {else}
      <h2 class="page-header">Create Evaluation</h2>
      {/if}
      <form id="evaluationForm" class="well form-horizontal" action="#" method="post">
        <input hidden id="CUO" name="CUO" value="{$CUO}" />
         {if $edit==true  }
         <!-- check the get -->
         <input hidden id="evaluationID" name="evaluationID" value="{$evaluation.evaluationid}" />
         <input id="Action" name="Action" hidden value="Edit">
         {else}
         <input id="Action" name="Action" hidden value="Create">
         {/if}
         <div class="form-group">
            <label class="col-md-3 control-label">Evaluation Date</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                 <input type=date name="evaluationDay" id="evaluationDay" class="form-control"> 
				
                   {if $edit==true }
                  <script >
                    fillField("evaluationDay","{$dateDay}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label">Evaluation Time</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input type=time name="evaluationTime" id="evaluationTime" min=9:00 max=17:00 step=900 class="form-control"> <!--15m increments -->
				
                   {if $edit==true }
                  <script >
                    fillField("evaluationTime","{$dateTime}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
       
          <div class="form-group">
            <label class="col-md-3 control-label">Evaluation Weight</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input type=number id="weight" name="weight" min=1 max=100 step=1 class="form-control"> <!--15m increments -->
                   {if $edit==true }
                  <script >
                    fillField("weight","{$evaluation['weight']}");
                  </script>
                  {/if}
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
           
             <div class="form-group">
            <label class="col-md-3 control-label">Evaluation Type</label>  
            <div class="col-md-8 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  
                	<select name="evaluationType" id="evaluationType" class="form-control" required>
                 
                     <option value="" disabled selected>Select Evaluation Type</option>
                     {foreach from=$evalTypes item=type}
                     <option value={$type.unnest}>{$type.unnest}</option>
                     {/foreach} 
                  </select>
                    {if $edit==true }
                  <script >
                  fillField("evaluationType","{$evaluation['evaluationtype']}")
                  evaluationTypeChangeHandler();
                  disableSelect("evaluationType");
                  </script>
                  {/if}
                  
                   <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
               </div>
            </div>
         </div>
       <div id=evalType>
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
                <button id="submitNewEvaluation" type="submit" class="btn btn-primary">Edit Evaluation</button>
              {else}
               <button id="submitNewEvaluation" type="submit" class="btn btn-primary">Create New Evaluation</button>
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