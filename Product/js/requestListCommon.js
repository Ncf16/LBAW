// GLOBAL STUFF

BASE_URL = window.location.pathname;
var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

$(document).ready(function() {
	userID = $('input[name="userID"').val();
	//$('th').on('click', 'a.requestItem', requestItemHandler);
	//&('th').on('click', 'a.requestItem', requestItemHandler);
	//$('a.requestItem').on('click', requestItemHandler);
	//$('a.requestItem').click(requestItemHandler);


});

function requestItemHandler(event){

	event.preventDefault();

	var request = JSON.parse($(this).children('span').text());
	fillModal(request);
		
}

function fillModal(requestInfo) {


	$.ajax({
		url: '../../api/exploreTemplate.php',           //TODO: MIGHT HAVE TO FIX THIS
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
	var requestID = $('.modal-header input').val();

	$.post(
		BASE_URL + "api/requestAction.php",
		{
			action: 'approve',
			requestID: requestID
		},
		function (data) {
			//console.log(data.units);
			addItens(data.units);
			currentPagination.addPagination(data.page, data.nbUnits, pagination.nbItemsPerPage);
		}, 'json');


	console.log("approved");
}

function rejectRequestHandler(event){
	var requestID = $('.modal-header input').val();

	$.post(
		BASE_URL + "api/requestAction.php",
		{
			action: 'reject',
			requestID: requestID
		},
		function (data) {
			//console.log(data.units);
			addItens(data.units);
			currentPagination.addPagination(data.page, data.nbUnits, pagination.nbItemsPerPage);
		}, 'json');

	console.log("rejected");
}

function cancelRequestHandler(event){
	var requestID = $('.modal-header input').val();

	$.post(
		BASE_URL + "api/requestAction.php",
		{
			action: 'cancel',
			requestID: requestID
		},
		function (data) {
			//console.log(data.units);
			addItens(data.units);
			currentPagination.addPagination(data.page, data.nbUnits, pagination.nbItemsPerPage);
		}, 'json');

	console.log("canceled");
}