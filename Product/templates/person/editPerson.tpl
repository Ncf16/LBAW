 {include file='common/header.tpl'}
 <script src="{$BASE_URL}js/personEditValidation.js"></script>
<div class="container">
<div class="row">
   <div class="col-md-12">
      <h2 class="page-header">Edit Info</h2>
      <form id="personEditForm" class="well form-horizontal" enctype="text/plain">
        <div class="form-group">
		<label class="col-md-3 control-label">Name</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="name" value="{$person.name}" class="form-control" type="text" required>

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<span class="input-group-addon"><input type="checkbox" id="visibleName" name="visibleName"/></span>
			</div>
		</div>
	</div>
	<!-- ADDRESS -->
	<div class="form-group">
		<label class="col-md-3 control-label">Address</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="address" value="{$person.address}" class="form-control" type="text" >

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<span class="input-group-addon"><input type="checkbox" id="visibleAddr" name="visibleAddr"/></span>
			</div>
		</div>
	</div>

	<!-- NATIONALITY -->
	<div class="form-group">
		<label class="col-md-3 control-label">Nationality</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="nationality" value="{$person.nationality}" class="form-control" type="text" >

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<span class="input-group-addon"><input type="checkbox" id="visibleNat" name="visibleNat"/></span>
			</div>
		</div>
	</div>

	<!-- PHONE NUMBER -->
	<div class="form-group">
		<label class="col-md-3 control-label">Phone Number</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="phonenumber" value="{$person.phonenumber}" class="form-control" type="number" >

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<span class="input-group-addon"><input type="checkbox" id="visiblePhone" name="visiblePhone"/></span>
			</div>
		</div>
	</div>

	<!-- NIF -->
	<div class="form-group">
		<label class="col-md-3 control-label">NIF</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="nif" value="{$person.nif}" class="form-control" type="number" required>

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
			<span class="input-group-addon"><input type="checkbox" disabled /></span>
			</div>
		</div>
	</div>

	<!-- BIRTH DATE -->
	<div class="form-group">
		<label class="col-md-3 control-label">Birth Date</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				<input  name="birthdate" value="{$person.birthdate}" class="form-control" type="date" min="1900-01-01" max="2016-01-01">

				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				<span class="input-group-addon"><input type="checkbox" id="visibleDate" name="visibleDate"/></span>
			</div>
		</div>
	</div>
	<input hidden id="url" value="{$BASE_URL}"/>
	<input hidden id="personCode" value="{$person.username}"/>
	<!-- NIF -->
	<div class="form-group">
		<label class="col-md-3 control-label">Password</label>  
		<div class="col-md-8 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<input name="password" placeholder="New Password" class="form-control" type="password">

				<span class="input-group-addon"><span id="emptySpan"></span></span>
				<span class="input-group-addon"><input type="checkbox" disabled /></span>
			</div>
		</div>
	</div> 
     <div class="row">
         <span class="glyphicon glyphicon-asterisk"></span> 
             <strong>
         Required Field
      </strong>
      </div>
         <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <button id="editPersonSubmit" type="submit" class="btn btn-primary">Edit Person</button>
            </div>
         </div>
         <div id="message_status">
         </div>
         <div id="error_messages">
            {foreach $ERROR_MESSAGES as $error}
            <div class="error">{$error}<a class="close" href="#">X</a></div>
            {/foreach}
         </div>
         <div id="success_messages">
            {foreach $SUCCESS_MESSAGES as $success}
            <div class="success">{$success}<a class="close" href="#">X</a></div>
            {/foreach}
         </div>
      </form>
   </div>
</div>
</div>
 {include file='common/footer.tpl'}