 {include file='common/header.tpl'}
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h2 class="page-header">{$student.name} Curricular Units To Sign Up </h2>
         <input hidden id="url" name="url" value="{$BASE_URL} ">
         <form id="signUpForm" class="well form-horizontal" action="#" method="post">
            <input hidden id="pc" name="pCode" value="{$student.username}"/>
            <input hidden  id="cc" name="cCode"  value="{$course.code}"/>
            {foreach from=$canSignUpTo key=myId item=year}
            {if $year|@count > 0}
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#year{$myId}"> <b>Year {$myId}</b> </a>
                  </h4>
               </div>
               <div id="year{$myId}" class="panel-collapse collapse">
                  <div class="panel-body">
                     <div class="panel-group" id="accordion{$myId}">
                        <div class="row">
                           {foreach from=$year item=cu}
                           <div class="form-group">
                              <label class="col-md-3 control-label">{$cu.name}</label>  
                              <div class="col-md-8 inputGroupContainer">
                                 <div class="input-group">
                                    <input type="checkbox"  name="CU_{$cu.name}" value="{$cu.cuoccurrenceid}"/>
                                 </div>
                              </div>
                           </div>
                           {/foreach}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            {/if}
            {/foreach}
            <div class="form-group">
               <div class="col-md-4 col-md-offset-4">
                  <button id="signUpFormSubmit" type="submit" class="btn btn-primary">Sign Up</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="{$BASE_URL}js/signUp.js"></script>
 {include file='common/footer.tpl'}