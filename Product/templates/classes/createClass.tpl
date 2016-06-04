{include file='common/header.tpl'}

<div class="modal-body">
<div class="container">
  <div class="row">
   <div class="col-lg-12">
      <h2 class="page-header">Create Class</h2>
   </div>
  </div>

<form class="well form-horizontal" action="{$BASE_URL}actions/class/changeClass.php" method="post" id="unit_form">
   
   <input name="class_uco" type="hidden" value="{$uco}">

   <div class="row">
      <div class="form-group">
         <label class="col-md-2 control-label">Name</label>
         <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
               <input name="class_unit" placeholder="Class Unit" value="{$FORM_VALUES.class_unit}" list="units" class="form-control" type="text" required {if $uco}disabled{/if}>
               <datalist id="units">
                  {foreach $units as $unit}
                  <option value="{$unit.name}"></option>
                  {/foreach}
               </datalist>
            </div>
         </div>
      </div>
      <div class="form-group">
         <label class="col-md-2 control-label">School Year</label>  
         <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input name="class_unit_year" placeholder="Class Unit Year" value="{$FORM_VALUES.class_unit_year}" list="years" class="form-control" type="text" required {if $uco}disabled{/if}>
                  <datalist id="years">
                     {foreach $years as $year}
                     <option value="{$year.year}"></option>
                     {/foreach}
                  </datalist>
            </div>
         </div>
      </div>
      <div class="form-group">
         <label class="col-md-2 control-label">Date</label>  
         <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
               <input name="class_date" value="{$FORM_VALUES.class_date}" class="form-control" type="date" required>
            </div>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label">Time</label>  
         <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
               <input name="class_time" value="{$FORM_VALUES.class_time}" class="form-control" type="time" required>
            </div>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label">Teacher</label>  
         <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  <input name="class_teacher" placeholder="Teacher name: username" value="{$FORM_VALUES.class_teacher}" list="teachers" class="form-control" type="text" required>
                  <datalist id="teachers">
                     {foreach $teachers as $teacher}
                     <option value="{$teacher.name}"></option>
                     {/foreach}
                  </datalist>
            </div>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label">Duration</label>  
         <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-hourglass"></i></span>
               <input name="class_duration" placeholder="0" value="{$FORM_VALUES.class_duration}" class="form-control" type="number" min="1" required>
            </div>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label">Room</label>  
         <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
               <input name="class_room" placeholder="Class Room" value="{$FORM_VALUES.class_room}" list="rooms" class="form-control" type="text" required>
               <datalist id="rooms">
                  {foreach $rooms as $room}
                  <option value="{$room.room}"></option>
                  {/foreach}
               </datalist>
            </div>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label">Summary</label>
         <div class="col-md-9">
            <textarea name="class_summary" placeholder="Description of Class occurrences" rows="3" class="form-control">{$FORM_VALUES.class_summary}</textarea>
         </div>
      </div>
  
      <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
            <button type="submit" name="classSubmit" class="btn btn-primary">Create New Class</button>
         </div>
      </div>
     </div>
  </form>
</div>
</div>

{include file='common/footer.tpl'}