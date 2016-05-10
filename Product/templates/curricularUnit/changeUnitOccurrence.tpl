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
	  			<label class="col-md-3 control-label">Name</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_name" placeholder="Curricular Unit Name" value="{$FORM_VALUES.unit_name}" list="units" class="form-control" type="text" required>
	  					<datalist id="units">
	  						{foreach $units as $unit}
	  						<option value="{$unit.name}"></option>
	  						{/foreach}
	  					</datalist>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Course</label>  
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
	  					<input name="unit_course" placeholder="Curricular Course Name" value="{$FORM_VALUES.unit_course}" list="courses" class="form-control" type="text" required>
	  					<datalist id="courses">
	  						{foreach $courses as $course}
	  						<option value="{$course.name}"></option>
	  						{/foreach}
	  					</datalist>
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">School Year</label>  
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	  					<input name="unit_year" placeholder="Curricular Year" value="{$FORM_VALUES.unit_year}" list="years" class="form-control" type="text" required>
	  					<datalist id="years">
	  						{foreach $years as $year}
			              	<option value="{$year.year}"></option>
			              	{/foreach}
			            </datalist>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Course Year</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_curricularyear" placeholder="Course Year" value="{$FORM_VALUES.unit_curricularyear}" class="form-control" type="number" min="1" max="7" required>
	  				</div>
	  			</div>
	  		</div>
	  	
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Semester</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<select name="unit_curricularsemester" value="{$FORM_VALUES.unit_curricularsemester}" class="form-control">
	  						<option
	  						{if $FORM_VALUES.unit_curricularsemester == 1}
	  						selected="selected" {/if}>1</option>
	  						<option
	  						{if $FORM_VALUES.unit_curricularsemester == 2}
	  						selected="selected" {/if}>2</option>
	  					</select>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Regent</label>  
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_teacher" placeholder="Teacher name: username" value="{$FORM_VALUES.unit_teacher}" list="teachers" class="form-control" type="text" required>
	  					<datalist id="teachers">
	  						{foreach $teachers as $teacher}
			              	<option value="{$teacher.name}"></option>
			              	{/foreach}
			            </datalist>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div class="form-group">
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">Languague</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<select name="unit_language" value="{$FORM_VALUES.unit_curricularsemester}" class="form-control">
	  						{foreach from=$languages item=value key=key}
	  						<option value="{$key}">{$value}</option>
	  						{/foreach}
	  					</select>
	  				</div>
	  			</div>
	  		</div>
	  	
	  		<div class="col-md-6">
	  			<label class="col-md-3 control-label">External Links</label>
	  			<div class="col-md-9 inputGroupContainer">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  					<input name="unit_links" placeholder="Pages Pointing to External Resources" value='<a href="{$FORM_VALUES.unit_links}">{$FORM_VALUES.unit_links}</a>' class="form-control">
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
	  		<textarea name="unit_competences" placeholder="Objectives and Competences" rows="3" class="form-control">{$FORM_VALUES.unit_competences}</textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Pre-Requirements and Co-Requirements</label>
  		<div class="col-md-9">
	  		<textarea name="unit_requirements" placeholder="Pre-Requirements and Co-Requirements" rows="3" class="form-control">{$FORM_VALUES.unit_requirements}</textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Curricular Programme</label>
  		<div class="col-md-9">
	  		<textarea name="unit_programme" placeholder="Curricular Programme" rows="3" class="form-control">{$FORM_VALUES.unit_programme}</textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Evaluation</label>
  		<div class="col-md-9">
	  		<textarea name="unit_evaluations" placeholder="Evaluation" rows="3" class="form-control">{$FORM_VALUES.unit_evaluations}</textarea>
	  	</div>
  	</div>

  	<div class="form-group">
  		<label class="col-md-2 control-label">Bibliography</label>
  		<div class="col-md-9">
	  		<textarea name="unit_bibliography" placeholder="Bibliography" rows="3" class="form-control">{$FORM_VALUES.unit_bibliography}</textarea>
	  	</div>
  	</div>