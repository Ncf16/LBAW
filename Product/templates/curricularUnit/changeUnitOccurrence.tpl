<form class="well form-horizontal" action="{$BASE_URL}actions/units/changeUnitOccurrence.php" method="post" id="unitCreation_form">

	<input name="unit_id" type="hidden" value="{$FORM_VALUES.unit_id}">
  	
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
  		<div class="col-md-12">
  			<h3>Descriptions</h3>
  			<hr>
  		</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Learning Objectives and Competences</label>
  		<div class="col-md-9">
	  		<textarea id="unit_learning" placeholder="Objectives and Competences" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Pre-Requirements and Co-Requirements</label>
  		<div class="col-md-9">
	  		<textarea id="unit_requirements" placeholder="Pre-Requirements and Co-Requirements" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Curricular Programme</label>
  		<div class="col-md-9">
	  		<textarea id="unit_programme" placeholder="Curricular Programme" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Evaluation</label>
  		<div class="col-md-9">
	  		<textarea id="unit_evaluations" placeholder="Evaluation" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Bibliography</label>
  		<div class="col-md-9">
	  		<textarea id="unit_bibliography" placeholder="Bibliography" rows="3" class="form-control"></textarea>
	  	</div>
  	</div>