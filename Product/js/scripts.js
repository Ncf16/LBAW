
$(document).ready(function() {

	// Login form submition
	$('#frm').on('submit', loginButtonHandler);
	// Course page syllabus selection
	$('#syllabus_year').change(syllabusYearHandler);
	$('#syllabus_year').change();

	//check if exists
	if($('#cu_response').length > 0) {
 	 	 curricularUnitsHandler();
	}
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
				var elem = $(data);
				console.log(elem);
				$('#course_syllabus').html(elem);

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
function curricularUnitsHandler(){
	var student = $('#studentID').val();
	var course = $('#courseID').val();

	$.ajax({
		url: '../../api/studentCurricularUnits.php',
		type: 'POST',
		data: {course: course,student: student},
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {		
				$('#cu_response').html(data);

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

