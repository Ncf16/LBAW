
$(document).ready(function() {

	// Login form submition
	$('#signUpForm').on('submit', signUpHandler);
});

function signUpHandler(event){
	event.preventDefault();
	event.stopPropagation();
	event.target.blur();
	 var formData = new FormData(this);
	 
	 var BASE_URL = $("#url").val();
	$.ajax({
		url: '../../api/singUp.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data:  formData,
		cache: false,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {
			 	if(data.indexOf ('true')>-1){
			 		  window.location.href =  BASE_URL.concat("pages/Course/coursePage.php?course=".concat($("#cc").val()));
				}
				else {

			 		  window.location.href =  BASE_URL.concat("pages/Course/coursePage.php?course=".concat($("#cc").val()));
				$("#modalErrors").html( "<p id='returnError'> <br>"+data+"</p>");
				} 
			}  
		},
		error: function(jqXHR, textStatus, errorThrown) {
		}
}); 
}
