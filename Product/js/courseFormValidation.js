$(document).ready(function() {
console.log("HELLO");
 $("#courseForm").submit( submitNewCourseHandler);
});
 function submitNewCourseHandler(event){
	event.preventDefault();
	event.stopPropagation();
	event.target.blur();

	$.ajax({
		url: '../../api/courseEdit.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: new FormData(this),
		cache: false,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			console.log("HELLLLLO");
			if (typeof data.error === 'undefined') {		
					console.log(data);
								
				if (data == 'true') {
					//location.reload();
					//window.location.replace("../../index.php");
				} else {
					//emptyStatus();
					//$("#message_status").prepend("Username/Password combination not found.");
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