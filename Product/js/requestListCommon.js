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

	console.log(requestInfo);

	$.ajax({
		url: '../../api/exploreTemplate.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: {
			template: "modal",
			units: requestInfo
		},
		success: function (data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {
				//var elem = $(data);

				//Install accept and refuse button handlers here
				//elem.find('a.requestItem').click(requestItemHandler);
				console.log(data);
				$('#myModal').replaceWith(data);

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