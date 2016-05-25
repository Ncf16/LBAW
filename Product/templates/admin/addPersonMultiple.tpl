<form class="well form-horizontal" action="#" method="post" id="account_form_multiple">

	<!-- NAME -->
	<div class="form-group">
		<label class="col-md-3 control-label">Student JSON File</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">

				<input id="input_open" class="input_file" type="file">
				
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-asterisk">
					</span>
				</span>
			</div>
		</div>
	</div>

	<div class="row">
		<strong>
			<span class="glyphicon glyphicon-asterisk"></span> 
			Required Field
		</strong>
	</div>

	<div class="form-group">
		<div class="col-md-4 col-md-offset-1">
			<button id="submit_individual" type="submit" class="btn btn-primary">ADD</button>
		</div>
		<!-- SUCCESS MESSAGE -->        
		<div id="creation_success" class="col-md-4 col-md-offset-1">
			Accounts Created.
		</div>
		<!-- FAILURE MESSAGE -->
		<div id="creation_failure" class="col-md-4 col-md-offset-1">
			
		</div>

	</div>


	<div id="creation_success_multiple" class="col-md-4 col-md-offset-1">
		
	</div>

	<div id="creation_failure_multiple" class="col-md-4 col-md-offset-1">
		STUFF IS HERE
	</div>
</form>