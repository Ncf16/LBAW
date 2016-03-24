<?php
include_once("templates/header.html");
?>

<div class="container">
  <div class="row">
  	<div class="col-lg-12">
  		<h2 class="page-header">Create Curricular Unit</h2>
  	</div>
  </div>

  <form class="well form-horizontal" action="#" method="post" id="unitCreation_form">
  	
  	<div class="row">
  		<div class="col-md-12">
  			<h3>Information</h3>
  			<hr>
  		</div>
  	</div>
  	<div class="row">
	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-2 control-label">Name</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_name" placeholder="Curricular Unit Name" class="form-control" type="text" required>
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="col-md-2 control-label">Initials</label>  
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_abbr" placeholder="Shortname for Curricular Unit" class="form-control" type="text" required>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-2 control-label">External Links</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<textarea id="unit_links" placeholder="Pages Pointing to External Resources" class="form-control"></textarea>
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="col-md-2 control-label">Area</label>  
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_area" placeholder="Area" class="form-control" type="text">
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-2 control-label">Languague</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_links" placeholder="Classes Languague" class="form-control" type="text"></textarea>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	</div>
	<div class="row">
  		<div class="col-md-8">
  			<h3>Teaching</h3>
  			<hr>
  		</div>
  		<div class="col-md-2">
  			<button type="button" class="btn btn-default">Add New Teaching Method</button>
  		</div>
  	</div>

  	<div class="form-group">
	  	<div class="col-md-4">
	  		<label class="col-md-2 control-label">Type</label>
	  		<div class="col-md-9 inputGroupContainer">
	  			<div class="input-group">
	  				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  				<select name="unit_type" placeholder="Course Director" class="form-control" required>
				        <option selected="selected">Select Type</option>
				        <option>Lectures</option>
				        <option>Laboratory Practice</option>
				    </select>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="col-md-4">
	  		<label class="col-md-2 control-label">Classes</label>  
	  		<div class="col-md-9 inputGroupContainer">
	  			<div class="input-group">
	  				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  				<input name="unit_classes" placeholder="Number of classes" class="form-control" type="text">
	  			</div>
	  		</div>
	  	</div>
	  	<div class="col-md-4">
	  		<label class="col-md-2 control-label">Hours</label>  
	  		<div class="col-md-9 inputGroupContainer">
	  			<div class="input-group">
	  				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  				<input name="unit_hours" placeholder="Number of classes" class="form-control"  type="number" min="1" max="6">
	  			</div>
	  		</div>
	  	</div>
	</div>

  	<div class="row">
  		<div class="col-md-12">
  			<h3>Descriptions</h3>
  			<hr>
  		</div>
  	</div>

  	<div class="row">

  	</div>
  	<div class="form-group">
  		<label class="col-md-2 control-label">Learning Objectives and Competences</label>
  		<div class="col-md-9">
	  		<textarea id="unit_learning" placeholder="Objectives and Competences" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Requirements</label>
  		<div class="col-md-9">
	  		<textarea id="unit_requirements" placeholder="Requirements" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Curricular Programme</label>
  		<div class="col-md-9">
	  		<textarea id="unit_programme" placeholder="Curricular Programme" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Evaluations</label>
  		<div class="col-md-9">
	  		<textarea id="unit_evaluations" placeholder="Evaluations" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Bibliography</label>
  		<div class="col-md-9">
	  		<textarea id="unit_bibliography" placeholder="Bibliography" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
      <div class="col-md-4 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Create New Curricular Unit</button>
      </div>
    </div>

  </form>
</div>

<?php
include_once("templates/footer.html");
?>