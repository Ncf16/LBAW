{include file='common/header.tpl'}

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Curricular Units</small>
      </h2>
    </div>
  </div>

  <div class="row">
  	<table id="mytable" class="table table-bordred table-striped">
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

<script src="{$BASE_URL}js/units.js"></script>

{include file='common/footer.tpl'}