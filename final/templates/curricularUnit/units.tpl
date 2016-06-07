{include file='common/header.tpl'}
<link href="{$BASE_URL}css/listTables.css" rel="stylesheet">

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-header">Curricular Units
      </h2>
    </div>
    <div class="col-sm-2">
        <a href="{$BASE_URL}pages/curricularUnit/createUnit.php">
          <button class="btn btn-primary" id="createUnit">Create New Unit</button>
        </a>
      </div>
    </div>

  <div class="row">
    <br>
  	<table id="mytable" class="table table-striped">
  		<thead>
  			<th class="col-md-5">Name</th>
  			<th class="col-md-3">Area</th>
  			<th class="col-md-2">Credits</th>
  			<th class="col-md-1">Edit</th>
  			<th class="col-md-1">Delete</th>
  		</thead>
  		<tbody id="units">
  		</tbody>
  	</table>

  	<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  	</ul>
  </div>
</div>

<script src="{$BASE_URL}js/Pagination.js"></script>
<script src="{$BASE_URL}js/units.js"></script>

{include file='common/footer.tpl'}