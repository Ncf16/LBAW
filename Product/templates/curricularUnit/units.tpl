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
  			<th>Name</th>
  			<th>Area</th>
  			<th>Credits</th>
  			<th>Edit</th>
  			<th>Delete</th>
  		</thead>
  		<tbody>
  			{foreach $units as $unit}
  			<tr>
  				<td>{$unit.name}</td>
  				<td>{$unit.area}</td>
  				<td>{$unit.credits}</td>
  				<td><p data-placement="top" data-toggle="tooltip" title="Edit">
  					<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
  						<span class="glyphicon glyphicon-pencil"></span>
  					</button>
  				</p></td>
  				<td><p data-placement="top" data-toggle="tooltip" title="Delete">
  					<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
  						<span class="glyphicon glyphicon-remove"></span>
  					</button>
  				</p></td>
  			</tr>
  			{/foreach}
  		</tbody>
  	</table>

  	<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  		<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  		<li class="active"><a href="#">1</a></li>
  		<li><a href="#">2</a></li>
  		<li><a href="#">3</a></li>
  		<li><a href="#">4</a></li>
  		<li><a href="#">5</a></li>
  		<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
  	</ul>
  </div>
</div>
{include file='common/footer.tpl'}