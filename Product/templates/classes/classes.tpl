{include file='common/header.tpl'}
<link href="{$BASE_URL}css/classes.css" rel="stylesheet">

<div class="container" id="classesPage">
   <div class="row">
      <div class="col-md-12">
         <h2 class="page-header">
            Classes
            {if $classes.unitInformation}
            <small>{$classes.unitInformation}</small>
            {elseif $classes.teacherInformation}
            <small>{$classes.teacherInformation}</small>
            {/if}
         </h2>
      </div>
   </div>

  <div class="row">
      <br>
      <table id="mytable" class="table table-bordred table-striped">
         <thead>
            <th class="col-md-1">View</th>
            {if $classes.unitInformation}
            <th class="col-md-3">Date</th>
            <th class="col-md-4">Teacher</th>
            {elseif $classes.teacherInformation}
            <th class="col-md-3">Date</th>
            <th class="col-md-4">Unit</th>
            {else}
            <th class="col-md-2">Date</th>
            <th class="col-md-3">Teacher</th>
            <th class="col-md-2">Unit</th>
            {/if}
            <th class="col-md-2">Room</th>
            <th class="col-md-1">Edit</th>
            <th class="col-md-1">Delete</th>
         </thead>
         <tbody id="classes">
         </tbody>
      </table>

      <div class="clearfix"></div>
      <ul class="pagination pull-right">
      </ul>
   </div>
</div>

<script src="{$BASE_URL}js/classes.js"></script>

{include file='common/footer.tpl'}