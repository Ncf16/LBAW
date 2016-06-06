{include file='common/header.tpl'}
<link href="{$BASE_URL}css/listTables.css" rel="stylesheet">

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
      {if $accountType <> 'Student'}
      <div class="col-sm-2">
        <a href="{$BASE_URL}pages/Class/createClass.php{if $classes.unit}?unit={$classes.unit}{/if}">
          <button class="btn btn-primary" id="createClass">Create New Class</button>
        </a>
      </div>
    </div>
    {/if}

  <div class="row">
      <br>
      <table id="mytable" class="table table-bordred table-striped">
         <thead>
            <th class="col-md-1">View</th>
            {if $classes.unitInformation}
            <th class="col-md-3">Date</th>
            <th {if $accountType eq 'Student'}
              class="col-md-6"
              {else}
              class="col-md-5"
              {/if}
              >Teacher</th>
            {elseif $classes.teacherInformation}
            <th class="col-md-3">Date</th>
            <th class="col-md-5">Unit</th>
            {else}
            <th class="col-md-2">Date</th>
            <th class="col-md-3">Teacher</th>
            <th class="col-md-3">Unit</th>
            {/if}
            <th class="col-md-2">Room</th>
            {if $accountType <> 'Student'}
            <th class="col-md-1">Delete</th>
            {/if}
         </thead>
         <tbody id="classes">
         </tbody>
      </table>

      <div class="clearfix"></div>
      <ul class="pagination pull-right">
      </ul>
   </div>
</div>

<script src="{$BASE_URL}js/pagination.js"></script>
<script src="{$BASE_URL}js/classes.js"></script>

{include file='common/footer.tpl'}