// In the future - separate files (as little as possible) or make ifs for each page, so not all the code runs


$(document).ready(function() {
	$('#frm').on('submit', loginButtonHandler);

	
	$('#syllabus_year').click(syllabusYearHandler); 
	$('#syllabus_year').click();

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
					console.log(data);
								
				if (data == 'true') {
					//location.reload();
					window.location.replace("../../index.php");
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

function syllabusYearHandler(event){
	var year = $('#syllabus_year').find(":selected").text();
	var course = $('#course_code').val();
	console.log("Course: " + course + " and year: " + year);

	$.ajax({
		url: '../../api/syllabus.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: {course: course, year: year},
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {		
				
				$('#cu_response').html(data);
				//console.log(data);
					
				/*			
				if (data == 'true') {
					//location.reload();
					window.location.replace("../../index.php");
				} else {
					emptyStatus();
					$("#message_status").prepend("Username/Password combination not found.");
				}
				*/
				

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
