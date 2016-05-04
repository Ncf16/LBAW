
$(document).ready(function() {
	// Login form submition
	$('#frm').on('submit', loginButtonHandler);

	// Course page syllabus selection
	$('#syllabus_year').change(syllabusYearHandler); 
	$('#syllabus_year').change();

	// Person creation toggle and form submition
	$('#creation_toggle label').click(creationToggleHandler);
	$('#account_form_individual').on('submit', individualCreationHandler);


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

function creationToggleHandler(event){

	var selected = $(this).find('input');

	// Only does something if the button wasn't selected yet.
	if(!$(this).find('input').is(':checked')){
		console.log(selected.val());
		var value = selected.val();

		if (value == 'individual'){
			$('#account_form_multiple').hide();
			$('#account_form_individual').show();
		}else if (value == 'multiple'){
			$('#account_form_individual').hide();
			$('#account_form_multiple').show();
		}
	}
}

function individualCreationHandler(event){
	event.preventDefault();
	event.stopPropagation();
	
	// FAZER VERIFICAÇÕES MANUAIS DOS CAMPOS!
	/*
	var boolean noErrors = true;
	var errors = [];
	errors["name"] = verifyName();
	errors["address"] = verifyAddress();
	errors["nationality"] = verifyNationality();
	errors["phone"] = verifyPhone();
	errors["nif"] = verifyNIF();
	errors["birth"] = verifyBirth();
	errors["account"] = verifyAccountType();
	errors["password"] = verifyPassword();

	// Percorrer tudo. Se alguma nao tiver "", é porque tem erro, e dá-se skip ao pedido ajax
	// dando os erros instead
	*/			

	console.log("was clicked!");
	$("#submit_individual").blur();

	$.ajax({
		url: '../../api/addPerson.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: new FormData(this),
		cache: false,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {		
					console.log(data);
				//var response = JSON.parse(data);

				
				if (data !== 'false') {
					$("#creation_failure").hide();

					var new_href = $("#creation_success a").attr("href") + data;

					$("#creation_success a").attr("href", new_href);
					$("#creation_success").show();
				} else {
					$("#creation_success").hide();
					$("#creation_failure").empty();
					$("#creation_failure").prepend("Could not create user. Already exists?");
					$("#creation_failure").show();
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

function verifyName(name){

}
function verifyAddress(address){
	
}
function verifyNationality(nationality){
	
}
function verifyPhone(phone){
	
}
function verifyNIF(nif){
	
}
function verifyBirth(birthdate){
	
}
function verifyAccountType(type){
	
}
function verifyPassword(password){
	
}