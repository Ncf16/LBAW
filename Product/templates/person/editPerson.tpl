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
				{if $person.privatename == false}
				<span class="input-group-addon"><input type="checkbox" id="privateName" name="privateName"/></span>
				{else}
				<span class="input-group-addon"><input type="checkbox" id="privateName" checked name="privateName"/></span>
				{/if}
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
				{if $person.privateaddr == false}
				<span class="input-group-addon"><input type="checkbox" id="privateAddr" name="privateAddr"/></span>
				{else}
				<span class="input-group-addon"><input type="checkbox" id="privateAddr" checked name="privateAddr"/></span>
				{/if}
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
				{if $person.privatenat == false}
				<span class="input-group-addon"><input type="checkbox" id="privateNat" name="privateNat"/></span>
				{else}
				<span class="input-group-addon"><input type="checkbox" id="privateNat" checked name="privateNat"/></span>
				{/if}
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
				{if $person.privatephone == false}
				<span class="input-group-addon"><input type="checkbox" id="privatePhone" name="privatePhone"/></span>
				{else}
				<span class="input-group-addon"><input type="checkbox" id="privatePhone" checked  name="privatePhone"/></span>
				{/if}
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
				{if $person.privatedate == false}
				<span class="input-group-addon"><input type="checkbox" id="privateDate" name="privateDate"/></span>
				{else}
				<span class="input-group-addon"><input type="checkbox" id="privateDate" checked name="privateDate"/></span>
				{/if}
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