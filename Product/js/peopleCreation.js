
$(document).ready(function() {

	// Person creation toggle and form submition
	$('#creation_toggle label').click(creationToggleHandler);

	$("#input_open").change(onOpenChange);

	$('#account_form_individual').on('submit', individualCreationHandler);
	$('#account_form_multiple').on('submit', multipleCreationHandler);


});


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

function onOpenChange(e) {
	
	console.log("changed");
	
	var filePath = $("#input_open").val();
    var startIndex = filePath.indexOf('\\') >= 0 ? filePath.lastIndexOf('\\') : filePath.lastIndexOf('/');
    var filename = filePath.substring(startIndex);
    if(filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        filename = filename.substring(1);
    }

	var fileContent = getTxt(filename);
	//var jsonData = JSON.parse(fileContent);
	
}

function getTxt(filename){
	/*
	$.ajax({
		url:filename,
		success: function (data){
			fileContent = data;           
			return data; 
		}
	});
	*/
}

function individualCreationHandler(event){
	event.preventDefault();
	event.stopPropagation();
	
	// FAZER VERIFICAÇÕES MANUAIS DOS CAMPOS!
	
	errors = [];
	errors["name"] = verifyName( $('#account_form_individual input[name="name"]').val() );
	errors["address"] = verifyAddress( $('#account_form_individual input[name="address"]').val() );
	errors["nationality"] = verifyNationality( $('#account_form_individual input[name="nationality"]').val() );
	errors["phone"] = verifyPhone( $('#account_form_individual input[name="phone"]').val() );
	errors["nif"] = verifyNIF( $('#account_form_individual input[name="nif"]').val() );
	errors["birth"] = verifyBirth( $('#account_form_individual input[name="birth_date"]').val() );
	errors["account"] = verifyAccountType( $('#account_type_select option:selected').val() );
	errors["password"] = verifyPassword( $('#account_form_individual input[name="password"]').val() );


	$("#creation_success").hide();
	$("#creation_failure").empty();

	var error = false;
	for(x in errors){
		console.log(errors[x]);
		if(errors[x] !== true){

			error = true;

			$("#creation_failure").prepend(errors[x] + "<br>");
			$("#creation_failure").show();

		}
	}

	if(error === true)  // If any gave an error, no point in even making an ajax call
		return;

	// Percorrer tudo. Se alguma nao tiver "", é porque tem erro, e dá-se skip ao pedido ajax
	// dando os erros instead
	

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

				// Fill errors array with PHP returned data info

				// Use same for as above, to show errors

				if (data !== 'false') {
					$("#creation_failure").hide();

					var new_href = $("#creation_success a").attr("href") + data;

					$("#creation_success a").attr("href", new_href);
					$("#creation_success").show();
				} else {
					$("#creation_success").hide();
					$("#creation_failure").empty();
					$("#creation_failure").prepend("Could not create user. Already exists or fields have been tampered with.");
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

function multipleCreationHandler(event){
	event.preventDefault();
	event.stopPropagation();
	
	console.log("multiple");

	/*
	
	errors = [];
	errors["name"] = verifyName( $('#account_form_individual input[name="name"]').val() );
	errors["address"] = verifyAddress( $('#account_form_individual input[name="address"]').val() );
	errors["nationality"] = verifyNationality( $('#account_form_individual input[name="nationality"]').val() );
	errors["phone"] = verifyPhone( $('#account_form_individual input[name="phone"]').val() );
	errors["nif"] = verifyNIF( $('#account_form_individual input[name="nif"]').val() );
	errors["birth"] = verifyBirth( $('#account_form_individual input[name="birth_date"]').val() );
	errors["account"] = verifyAccountType( $('#account_type_select option:selected').val() );
	errors["password"] = verifyPassword( $('#account_form_individual input[name="password"]').val() );


	$("#creation_success").hide();
	$("#creation_failure").empty();

	var error = false;
	for(x in errors){
		console.log(errors[x]);
		if(errors[x] !== true){

			error = true;

			$("#creation_failure").prepend(errors[x] + "<br>");
			$("#creation_failure").show();

		}
	}

	if(error === true)  // If any gave an error, no point in even making an ajax call
		return;

	// Percorrer tudo. Se alguma nao tiver "", é porque tem erro, e dá-se skip ao pedido ajax
	// dando os erros instead
	

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

				// Fill errors array with PHP returned data info

				// Use same for as above, to show errors

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
	*/
}

function verifyName(name2){

	if(name2 == ''){
		return 'Name cannot be empty';
	}

	var letters = /^[A-Za-z]+$/;  

	if(name2.match(letters))  
	{  
		return true;  
	}  
	else  
	{  
		//alert('Name must have alphabet characters only');   
		return 'Name must have alphabet characters only.'; 
	}
}

function verifyAddress(address){

	var letters = /^[0-9a-zA-Z]?$/;  

	if(address.match(letters))  
	{  
		return true;  
	}  
	else  
	{  
		return 'User address must have alphanumeric characters only.';   
	}
}

function verifyNationality(nationality){
	var letters = /^[A-Za-z]?$/;  
	if(name.match(letters))  
	{  
		return true;  
	}  
	else  
	{  
		return 'Nationality must have alphabet characters only.';
	}
}

function verifyPhone(phone){
	var numbers = /^[0-9]?$/;  
	if(phone.match(numbers))  
	{  
		return true;  
	}  
	else  
	{  
		return 'Phone code must have numeric characters only.'; 
	}  
}

function verifyNIF(nif){

	if(nif == ''){
		return 'NIF cannot be empty';
	}

	var numbers = /^\d{9}$/;  
	if(nif.match(numbers) || nif == '')  
	{  
		return true;  
	}  
	else  
	{  
		return 'NIF must have 9 numeric characters.';  
	}  
}

function verifyBirth(birthdate){

	// I'll finish this one later
	return true;

}

function verifyAccountType(type){

	console.log(type);
	if (type != 'Student' && type != 'Admin' && type != 'Teacher')
		return 'Account type must be either Student, Admin or Teacher.';
	else
		return true;
}

function verifyPassword(password, minLen, maxLen){

	if(password == ''){
		return 'Password cannot be empty';
	}

	// Check only characters and numbers?

	var passid_len = password.length;  
	if (passid_len == 0 || passid_len >= maxLen || passid_len < minLen)  
	{  
		return "Password should not be empty / length be between "+minLen+" to "+maxLen +"." ;
	}  
	return true; 
	
}