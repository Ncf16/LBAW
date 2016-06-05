var jsonFileContents;
var isJsonLoaded = false;
var jsonParsed = false;
var jsonValid = false;

$(document).ready(function() {

	// Person creation toggle and form submition
	$('#creation_toggle label').click(creationToggleHandler);

	$("#input_open").change(onOpenChange);

	$('#account_form_individual').on('submit', individualCreationHandler);
	$('#account_form_multiple').on('submit', multipleCreationHandler);

});


function clearErrors(){
	$("#creation_success").empty();
	$("#creation_failure").empty();
	$("#creation_success_multiple").empty();
	$("#creation_failure_multiple").empty();
}

function displayErrorsMultiple(errors){
	clearErrors();

	var z;

	for(z in errors){
		if(errors[z] !== true){
			$("#creation_failure_multiple").show();
			$("#creation_failure_multiple").prepend(errors[z] + "<br>");
		}
	}
}

function displaySuccessMultiple(success){
	$("#creation_success").empty();
	$("#creation_success_multiple").empty();

	var u;

	for(u in success){
		$("#creation_success_multiple").show();
		$("#creation_success_multiple").prepend(success[u] + "<br>");
	}

}

function verifyPersonJSON(person){
	var errors = [];

	//The verify functions return true when val'id
	
	errors["name"] = verifyName(person['name']);
	errors["address"] = verifyAddress(person['address']);
	errors["nationality"] = verifyNationality(person['nationality']);
	errors["phone"] = verifyPhone(person['phone']);
	errors["nif"] = verifyNIF(person['nif']);
	errors["birth"] = verifyBirth(person['birth']);
	errors["account"] = verifyAccountType(person['account']);
	errors["password"] = verifyPassword(person['password']);
	
	var error = false;
	for(y in errors){
		if(errors[y] !== true){

			error = true;
			//console.log(errors[y]);
			$("#creation_failure").prepend(errors[y] + "<br>");
			$("#creation_failure").show();

		}
	}
	return error;
}

function creationToggleHandler(event){

	var selected = $(this).find('input');

	// Only does something if the button wasn't selected yet.
	if(!$(this).find('input').is(':checked')){
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
	// verify functions return true if ok. therefore errors['something'] == true
	// means that 'something' field is valid

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
		//console.log(errors[x]);
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
	

	//console.log("was clicked!");
	$("#submit_individual").blur();

	$.ajax({
		url: '../../api/addPerson.php',
		type: 'POST',
		data: new FormData(this),
		cache: false,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {

				data = JSON.parse(data);
				// Fill errors array with PHP returned data info

				// Use same for as above, to show errors

				if (data[0] !== false) {
					$("#creation_failure").hide();
					//console.log(href);
					var new_href = $("#creation_success a").attr("href") + data;

					$("#creation_success a").attr("href", new_href);
					$("#creation_success").show();
				} else {
					$("#creation_success").hide();
					$("#creation_failure").empty();
					$("#creation_failure").prepend("<strong>"+ data[1]+ " Could not create user. </strong>");
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

function onOpenChange(e) {
	
	clearErrors();

	var fileTypes = ['json'];
	var files = event.target.files;
	var file;
	var errors = [];
	isJsonLoaded = false;

	// VALIDATION

	// Validate file existence
	if(files.length == 0)
		return;
	else
		file = files[0];

	// Check if it is a JSON file
	var extension = file.name.split('.').pop().toLowerCase();
	var isSuccess = fileTypes.indexOf(extension) > -1;

	// If it trully is a JSON file, check if contents are ok!
	if(isSuccess){
		var reader = new FileReader();
		reader.readAsText(files[0]);

		reader.onload = function(e) {

			isJsonLoaded = true; // is loaded but not yet parsed
			fileContent = e.target.result;

			// Will attempt to parse fileContent
			try {
				jsonFileContents = JSON.parse(fileContent);
				jsonValid = true;
			}catch (e) {
      			// IS INVALID -> UNLOADS FILE
      			jsonValid = false;
      			isJsonLoaded = false;

      			$('#input_open').val($('#input_open').defaultValue);
      			errors.push("JSON file is invalid.");
      			displayErrorsMultiple(errors);

      			//console.log("JSON file is invalid.");
      		}

      		jsonParsed = true;

      		//console.log(fileContent);
      	}
      }else{
      	$('#input_open').val($('#input_open').defaultValue);
      	errors.push("Invalid file type.");
      	displayErrorsMultiple(errors);
		//console.log("Invalid file type."); // put this on error stuffie
	}

}


function multipleCreationHandler(event){
	event.preventDefault();
	event.stopPropagation();
	
	var errors = [];
	var success = [];
	clearErrors();
	$("#submit_multiple").blur();

	if(isJsonLoaded){
		
		while(!jsonParsed){ // Wait for it to finish parsing, only then we know if it is valid
			// IS LOADED... BUT NOT FINISHED PARSING YET
		}
		
		if(jsonValid){
		// Verify Stuff ?
		var validUsers = [];
		var counter = 1;

		for(x in jsonFileContents){

			var error = verifyPersonJSON(jsonFileContents[x]);
			if(!error){
				validUsers.push(jsonFileContents[x]);

			}else{
				errors.push("JSON Object nr."+ counter + " is not valid.");
			}
			counter++;

		}

		//console.log(validUsers);


		$.ajax({
			url: '../../api/addMultiplePeople.php',
			type: 'POST',
			data: {
				people: validUsers
			},
			success: function(data, textStatus, jqXHR) {
				if (typeof data.error === 'undefined') {		
					data = JSON.parse(data);
					//console.log(data);

					for(var i = 0; i < data.length; i++){
						errors.push(data[i]);
					}

				// validUsers.length indicates how many were valid from JS verification
				// data.length indicates how many of those gave error when trying to be inserted
				if((validUsers.length-data.length) > 0){
					if(data.length == 0){
						success.push("Valid users were successfuly inserted into the database.");
					}else{
						success.push("Valid users were successfuly inserted into the database.");
					}
				}

				displayErrorsMultiple(errors); 
				displaySuccessMultiple(success);  
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


					// Send to PHP
				}

		//if it aint valid... too bad
		
	}else{
		errors = ['No valid file loaded.'];
		displayErrorsMultiple(errors);
		return;
	}
	
}

function verifyName(name2){

	if(name2 == '' || name2 == null){
		return 'Name cannot be empty';
	}

	var letters = /^[A-Za-z0-9'\.\-\s\,]+$/;  

	if(name2.match(letters))  
	{  
		return true;  
	}  
	else  
	{  
		//alert('Name must have alphabet characters only');   
		return 'Name must have alphabet characters only.'; 
	}

	return true;
}

function verifyAddress(address){

	var letters = /^[A-Za-z0-9'\.\-\s\,]*$/;

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
	var letters = /^[A-Za-z'\s\-\.]*$/;  
	if(nationality.match(letters))  
	{  
		return true;  
	}  
	else  
	{  
		return 'Nationality must have alphabet characters only.';
	}
}

function verifyPhone(phone){

	var numbers = /^[0-9]*$/;

	var phone = phone.toString();

	if(phone.match(numbers))  
	{  
		if(phone.length > 15){
			return 'Phone code must not be longer than 15 characters';
		}else
		return true;  
	}  
	else  
	{  
		return 'Phone code must have numeric characters only.'; 
	}  
}

function verifyNIF(nif){

	var nif = nif.toString();

	if(nif == '' || nif == null){
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
	return true;
}

function verifyAccountType(type){

	if (type != 'Student' && type != 'Admin' && type != 'Teacher')
		return 'Account type must be either Student, Admin or Teacher.';
	else
		return true;
}

function verifyPassword(password, minLen, maxLen){

	var password = password.toString();

	if(password == '' || password == null){
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