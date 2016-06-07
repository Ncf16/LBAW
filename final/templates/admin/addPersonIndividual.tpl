<form class="well form-horizontal" action="#" method="post" id="account_form_individual">
	<div class="row">
		<strong>
			<span class="glyphicon glyphicon-asterisk"></span>
			Required Field
		</strong>
	</div>
	<!-- NAME -->
	<div class="form-group">
		<label class="col-md-3 control-label">Name</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="name" placeholder="Write your name here. Ex: Martha Jones" class="form-control" type="text" required>

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
			</div>
		</div>
	</div>

	<!-- ADDRESS -->
	<div class="form-group">
		<label class="col-md-3 control-label">Address</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="address" placeholder="Write your address here. Ex: 88986 West Comoros Blvd." class="form-control" type="text" >


			</div>
		</div>
	</div>

	<!-- NATIONALITY -->
	<div class="form-group">
		<label class="col-md-3 control-label">Nationality</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="nationality" placeholder="Write your nationality here. Ex: Portugal" class="form-control" type="text" >

			</div>
		</div>
	</div>

	<!-- PHONE NUMBER -->
	<div class="form-group">
		<label class="col-md-3 control-label">Phone Number</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="phone" placeholder="Write your phone number here Ex: 212045867" class="form-control" type="number" >

			</div>
		</div>
	</div>

	<!-- NIF -->
	<div class="form-group">
		<label class="col-md-3 control-label">NIF</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="nif" placeholder="Write your NIF here. Must have 9 characters Ex: 123456789" class="form-control" type="number" required>

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
			</div>
		</div>
	</div>

	<!-- BIRTH DATE -->
	<div class="form-group">
		<label class="col-md-3 control-label">Birth Date</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				<input  name="birth_date" placeholder="Select your birth date." class="form-control" type="date" min="1900-01-01" max="2016-01-01" value="2000-01-01">

			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label">Account Type</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-option-vertical"></i></span>
				<select name="account_type" class="form-control" id="account_type_select">
					<option value="Student" selected="selected">Student</option>
					<option value="Teacher">Teacher</option>
					<option value="Admin">Admin</option>
				</select>

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
			</div>
		</div>
	</div>

	<!-- PASSWORD -->
	<div class="form-group">
		<label class="col-md-3 control-label">Password</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="password" placeholder="Input your password here. Ex: as2A4M2Asj8nsUY" class="form-control" type="password" required>

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
			</div>
		</div>
	</div> 


	<div class="form-group">
		<div class="col-md-4 col-md-offset-1">
			<button id="submit_individual" type="submit" class="btn btn-success">ADD</button>
		</div>
		<!-- SUCCESS MESSAGE -->        
		<div id="creation_success" class="col-md-4 col-md-offset-1"><strong>
			Account Created.
			<a  href="{$BASE_URL}pages/Person/personalPage.php?person="> User Account </a>
		</strong>
		</div>
		<!-- FAILURE MESSAGE -->
		<div id="creation_failure" class="col-md-4 col-md-offset-1">

		</div>

	</div>
</form>