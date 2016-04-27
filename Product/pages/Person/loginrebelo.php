<?php
	include_once('config/init.php');

	$logged_in = checkSession($dbh);

	include_once('templates/header.php');
?>
<div id="content">
	<?php if ($logged_in) { ?>
		<div class="static_card" id="already_logged_in">
			<h3>Already logged in!</h3>

			<br><br>

			<a class="goto_button" href="index.php">Go to Homepage</a>
		</div>
	<?php } else { ?>
		<div class="static_card" id="not_logged_in" >
			<form action="action/login.php" method="post"> 
				<h1 id="title">Login</h1>
				<div id="status">
					<span id="status_message">Login Error</span>
				</div>
				<input type="hidden" id="token" name="token" value="<?=$token?>">
				<input class="material_textbox textbox" type="email" id="email" name="email" required="required" placeholder="e-mail"><br>
				<input class="material_textbox textbox" type="password" id="password" name="password" required="required" placeholder="password"><br>
				<input class="material_checkbox checkbox" type="checkbox" name="stay" id="stay" checked="checked"/><label class="material_checkbox_label" for="stay">Stay logged in</label><br>
				<input class="material_button green_button" type="submit" value="Login" id="login_btn">
			</form>
			<br>
			<a href="forgot.php">Forgot your password?</a>
			<br><br>
			Don't have an account? <br class="som"><br class="som"><a class="material_button blue_button" id="reg_btn" href="register.php">Register</a>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				function removeTextboxErrors() {
					$("#email").removeClass("textbox_error");
					$("#password").removeClass("textbox_error");
				}

				$('#email').on('input propertychange paste', function() {
					removeTextboxErrors();
				});

				$('#password').on('input propertychange paste', function() {
					removeTextboxErrors();
				});

				$("#login_btn").click(function() {
					var email = $("#email").val();
					var password = $("#password").val();
					var token = $("#token").val();

					if(email == '') {
						$("#email").addClass("textbox_error");
						$("#status_message").text('Please enter an email');
						$("#status").slideDown("fast");
						return false;
					}

					if(password == '') {
						$("#password").addClass("textbox_error");
						$("#status_message").text('Please enter a password');
						$("#status").slideDown("fast");
						return false;
					}

					stay = $("#stay").is(":checked");
					$("#status_message").text('Logging in...');
					$("#status").slideDown("fast");
					removeTextboxErrors();
					
					$.ajax({
						type: "POST",
						url: "action/login.php",

						data: "email=" + encodeURI(email) + "&token=" + token + "&password=" + encodeURI(password) + "&stay=" + stay,
						success: function(html) {
							if (html == '0') {
								window.location.replace("index.php");
							} else if(html == 'too_many_attempts') {
								$("#status_message").text("Too many login attempts. Please wait 30 seconds.");
							} else {
								$("#status_message").text("Invalid email or password.");
								$("#email").addClass("textbox_error");
								$("#password").addClass("textbox_error");
							}
						},
						error: function(xhr, textStatus, errorThrown) {
							$("#status_message").text('Couldn\'t connect to server.');
						}
					});
					return false;
				});
			});
		</script>
	<?php } ?>
</div>
<?php
	include_once('templates/footer.php');
?>
