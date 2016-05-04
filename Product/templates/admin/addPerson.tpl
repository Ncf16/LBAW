{include file='common/header.tpl'}

<div class="col-md-6">
    <h2 class="page-header">Account Creation</h2>
    <div class="container well">

    <div class="well well-sm col-md-8">
    	<div id="creation_toggle" data-toggle="buttons">
  			<label class="btn btn-primary active">
    			<input  type="radio" name="quantity" value="individual" checked> Individual
  			</label>
  			<label class="btn btn-primary">
    			<input type="radio" name="quantity" value="multiple"> Multiple
  			</label>
		</div>
    </div>

    <form class="well form-horizontal col-md-8" action="#" method="post" id="account_form_individual">
            <!-- NAME -->
            <div class="form-group">
                <label class="col-md-3 control-label">Name</label>  
                <div class="col-md-8 inputGroupContainer">
                	<div class="input-group">
                  		<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  		<input name="name" placeholder="Ex: Jon Snow" class="form-control" type="text" required>

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
                  		<input name="address" placeholder="Ex: The Wall" class="form-control" type="text" >

                  		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                	</div>
              	</div>
            </div>

            <!-- NATIONALITY -->
            <div class="form-group">
                <label class="col-md-3 control-label">Nationality</label>  
                <div class="col-md-8 inputGroupContainer">
                	<div class="input-group">
                  		<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  		<input name="nationality" placeholder="Ex: Westerosi" class="form-control" type="text" >

                  		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                	</div>
              	</div>
            </div>

            <!-- PHONE NUMBER -->
            <div class="form-group">
                <label class="col-md-3 control-label">Phone Number</label>  
                <div class="col-md-8 inputGroupContainer">
                	<div class="input-group">
                  		<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  		<input name="phone" placeholder="Ex: There are no phones in GoT" class="form-control" type="number" >

                  		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                	</div>
              	</div>
            </div>

            <!-- NIF -->
            <div class="form-group">
                <label class="col-md-3 control-label">NIF</label>  
                <div class="col-md-8 inputGroupContainer">
                	<div class="input-group">
                  		<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  		<input name="nif" placeholder="Ex: 123456789" class="form-control" type="number" >

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
                  		<input  name="birth_date" placeholder="Ex: When Snow was born" class="form-control" type="date" min="1900-01-01" max="2016-01-01" value="2000-01-01">

                  		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                	</div>
              	</div>
            </div>

            <div class="form-group">
              	<label class="col-md-3 control-label">Account Type</label>  
              	<div class="col-md-8 inputGroupContainer">
                	<div class="input-group">
                  		<span class="input-group-addon"><i class="glyphicon glyphicon-option-vertical"></i></span>
                		<select name="account_type" class="form-control">
  							<option value="Student" selected="selected">Student</option>
  							<option value="Teacher">Teacher</option>
  							<option value="Admin">Admin</option>
						</select>

                  		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                	</div>
              	</div>
            </div>

            <!-- NIF -->
            <div class="form-group">
                <label class="col-md-3 control-label">Password</label>  
                <div class="col-md-8 inputGroupContainer">
                	<div class="input-group">
                  		<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  		<input name="password" placeholder="Ex: Ghost" class="form-control" type="text" required>
                		
                  		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
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
              	<div id="creation_success" class="col-md-4 col-md-offset-1">
    				Account Created.
    				<a  href="{$BASE_URL}pages/Person/personalPage.php?person="> User Account </a>
    			</div>

    			<div id="creation_failure" class="col-md-4 col-md-offset-1">
    				hi
    			</div>
            </div>
    </form>

    <form class="well form-horizontal col-md-8" action="#" method="post" id="account_form_multiple">
            NOT YET IMPLEMENTED
            <!-- NAME -->
            <div class="form-group">
                <label class="col-md-3 control-label">Name</label>  
                <div class="col-md-8 inputGroupContainer">
                	<div class="input-group">
                  		<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                  		<input name="name" class="form-control" type="text" required>

                  		 <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                	</div>
              	</div>
            </div>
            <div class="form-group">
              	<div class="col-md-4 col-md-offset-1">
                	<button id="submit_individual" type="submit" class="btn btn-primary">ADD</button>
              	</div>
              	<div id="creation_message_status" class="col-md-4 col-md-offset-1">
    			
    			</div>
            </div>
    </form>
    
    </div>
</div>


{include file='common/footer.tpl'}