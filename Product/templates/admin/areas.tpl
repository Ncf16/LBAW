{include file='common/header.tpl'}
<link href="{$BASE_URL}css/listTables.css" rel="stylesheet">

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-header">Areas
      </h2>
    </div>
    <div class="col-sm-2">
        <button class="btn btn-create">Create Area</button>
      </div>
    </div>

  <div class="row">
    <br>
  	<table id="mytable" class="table table-striped">
  		<thead>
        {for $table=1 to 3}
  			<th class="col-md-2">Area</th>
  			<th class="col-md-1">Edit</th>
  			<th class="col-md-1 {if $table <> 3}border{/if}">Delete</th>
        {/for}
  		</thead>
  		<tbody id="areas">
  		</tbody>
  	</table>

  	<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  	</ul>
  </div>
</div>

<script src="{$BASE_URL}js/pagination.js"></script>
<script src="{$BASE_URL}js/areas.js"></script>

{include file='common/footer.tpl'}