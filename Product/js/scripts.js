
$(document).ready(function() {
	console.log("kk");
	$('#login_button').submit(loginButtonHandler);

});

function emptyStatus() {
	$("#message_status").empty();
}

function loginButtonHandler(event){
	event.preventDefault();
	event.stopPropagation();
	event.target.blur();
	console.log("was clicked!");

	$.ajax({
		url: '../../api/login.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: new FormData(this),
		cache: false,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {
						
				var loggedIn = JSON.parse(data);
				
				if (loggedIn) {
					//location.reload();
					//window.location.replace(document.referrer);
				} else {
					emptyStatus();
					$("#message_status").prepend("Username/Password combination not found.");
				}
				

			} else {
				// Handle errors here
				console.log('ERRORS: ' + data.error);
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			// Handle errors here
			console.log('ERRORS: ' + textStatus);
			// STOP LOADING SPINNER
		}
	});

}
