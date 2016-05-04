<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 18:38:00
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\admin\addPerson.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6744572a1cd32d55a1-01320198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba10eba5df8d983250706ebda947f6167d200e75' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\admin\\addPerson.tpl',
      1 => 1462379305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6744572a1cd32d55a1-01320198',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572a1cd33b4be0_13820114',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572a1cd33b4be0_13820114')) {function content_572a1cd33b4be0_13820114($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



    
<div class="container">
    <h2 class="page-header">Account Creation</h2>
    <div class="well">

      <div class="well well-sm">
    	 <div id="creation_toggle" data-toggle="buttons">
  			 <label class="btn btn-primary active">
    			 <input  type="radio" name="quantity" value="individual" checked> Individual
  			 </label>
  			 <label class="btn btn-primary">
    			 <input type="radio" name="quantity" value="multiple"> Multiple
  			 </label>
		    </div>
      </div>

    <form class="well form-horizontal" action="#" method="post" id="account_form_individual">
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
                  		<input name="password" placeholder="Ex: Ghost" class="form-control" type="password" required>
                		
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
        <!-- SUCCESS MESSAGE -->      	
        <div id="creation_success" class="col-md-4 col-md-offset-1">
    				Account Created.
    				<a  href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personalPage.php?person="> User Account </a>
    		</div>
        <!-- FAILURE MESSAGE -->
    		<div id="creation_failure" class="col-md-4 col-md-offset-1">
    				hi
    		</div>

      </div>
    </form>

    <form class="well form-horizontal" action="#" method="post" id="account_form_multiple">

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
            <a  href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personalPage.php?person="> User Account </a>
          </div>

          <div id="creation_failure" class="col-md-4 col-md-offset-1">
            hi
          </div>
            </div>
    </form>
    </div>
</div>



<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
