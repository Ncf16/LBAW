 {include file='common/header.tpl'}

<div class="container login">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form id="frm" accept-charset="UTF-8" role="form" >
                    	<fieldset>

			    	  		<div class="form-group">
			    		    	<input class="form-control" placeholder="Username" name="username" type="text">
			    			</div>

			    			<div class="form-group">
			    				<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    			</div>

			    			<input class="btn btn-lg btn-block" id="login_button" type="submit" value="Login">

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

			    		</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
{include file='common/footer.tpl'}