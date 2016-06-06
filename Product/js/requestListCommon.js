// GLOBAL STUFF

BASE_URL = window.location.pathname;
var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var ACTION_MODAL_TIMEOUT = 500;
var SUCCESS_CREATION_TIMEOUT = 800;
var FAILURE_CREATION_TIMEOUT = 2000;

$(document).ready(function() {
	userID = $('input[name="userID"').val();

	$('#requestSubmitBtn').on('click', requestCreationHandler);

	$("#requestCreationModal").on("hidden.bs.modal", function(){

		$(this).find('form')[0].reset();
		clearModalErrors();
	});

});

function requestCreationHandler(event){
	event.preventDefault();
	event.stopPropagation();
	event.stopImmediatePropagation();
	$(this).blur();

	$.ajax({
		url: BASE_URL + "api/createRequest.php",
		type: 'POST',
		data: $('#createRequestForm').serialize(),
		success: function (data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {

				clearModalErrors();

				if(data == "true"){
					$("#creation_success").prepend("<strong>Request submitted successfully. Updating List. </strong>" + "<br>");

					// If successful, close in 3 seconds
					setTimeout(function(){
						clearModalErrors();
						$("#requestCreationModal").modal('hide');
						loadTab();
					}, SUCCESS_CREATION_TIMEOUT);

				}else{
					// FAILURE
					$("#creation_failure").prepend("<strong>Failed to submit request. " + data +"</strong>"+ "<br>");


					$("#creation_failure").delay(FAILURE_CREATION_TIMEOUT).fadeOut("slow");
					$("#creation_failure").show();

				}

			} else {
				// Handle errors here
				console.log('ERRORS: ' + data.error);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			// Handle errors here
			console.log('ERRORS: ' + textStatus);
			// STOP LOADING SPINNER
		}
	});




}

// This handler is installed on the other JS script that loads the elements that activate it
function requestItemHandler(event){

	event.preventDefault();

	var request = JSON.parse($(this).children('span').text());
	fillModal(request);
		
}

function fillModal(requestInfo) {


	$.ajax({
		url: '../../api/exploreTemplate.php',           
		type: 'POST',
		data: {
			template: "modal",
			units: requestInfo
		},
		success: function (data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {
				var elem = $(data);

				// Refresh modal with the new data
				$('#myModal').replaceWith(elem);

				// Install accept and refuse button handlers here
				$('#approve_btn').click(approveRequestHandler);
				$('#reject_btn').click(rejectRequestHandler);
				$('#cancel_btn').click(cancelRequestHandler);

				// Show the modal
				$("#myModal").modal("show");

			} else {
				// Handle errors here
				console.log('ERRORS: ' + data.error);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			// Handle errors here
			console.log('ERRORS: ' + textStatus);
			// STOP LOADING SPINNER
		}
	});
};

function approveRequestHandler(event){
	var requestID = $('.modal-header input[name="requestID"]').val();
	var userID =  $('.modal-header input[name="userID"]').val();

	$.post(
		BASE_URL + "api/requestAction.php",
		{
			action: 'approve',
			requestID: requestID,
			userID: userID
		},
		function (data) {
			setTimeout(loadTab, ACTION_MODAL_TIMEOUT);
		}, 'json');


	//console.log("approved");
}

function rejectRequestHandler(event){
	var requestID = $('.modal-header input[name="requestID"]').val();
	var userID =  $('.modal-header input[name="userID"]').val();

	$.post(
		BASE_URL + "api/requestAction.php",
		{
			action: 'reject',
			requestID: requestID,
			userID: userID
		},
		function (data) {
			setTimeout(loadTab, ACTION_MODAL_TIMEOUT);
		}, 'json');


	//console.log("rejected");
}

function cancelRequestHandler(event){
	var requestID = $('.modal-header input[name="requestID"]').val();
	var userID =  $('.modal-header input[name="userID"]').val();

	$.post(
		BASE_URL + "api/requestAction.php",
		{
			action: 'cancel',
			requestID: requestID,
			userID: userID
		},
		function (data) {
			setTimeout(loadTab, ACTION_MODAL_TIMEOUT);
			//console.log(data);
		}, 'json');


	//console.log("canceled");
}

function clearModalErrors() {
	$("#creation_success").empty();
	$("#creation_failure").empty();
}