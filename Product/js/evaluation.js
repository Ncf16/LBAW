$(document).ready(function() {
	 $("#evaluationType").change(evaluationTypeChangeHandler);
	  $("#evaluationForm").submit( evaluationSubmitForm);
});

 function evaluationTypeChangeHandler(){
 	console.log("clicked");
 	event.preventDefault();
	event.stopPropagation();
	event.target.blur();
	console.log("was clicked!");
	$url ='../../api/';
    $link= $("#evaluationType option:selected" ).text().toLowerCase();
	$link=$link.concat(".php");
	$url=$url.concat($link);
	$.ajax({
		url:$url  ,           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {		
					$("#evalType").empty();
					$("#evalType").html(data);
			} else {
				// Handle errors here
				console.log('ERRORS: ' + data.error);
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log('ERRORS: ' + textStatus);
		}
	}); 
 }
  function evaluationSubmitForm(){
 	event.preventDefault();
	event.stopPropagation();
	event.target.blur();
	console.log("was clicked!");

	$.ajax({
		url: '../../api/evaluation.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: new FormData(this),
		cache: false,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {		
				console.log(data);

			/*	if (data == 'true') {
					//location.reload();
					window.location.replace("../../index.php");
				} else {
					emptyStatus();
					$("#message_status").prepend("Username/Password combination not found.");
				}
			} else {
				// Handle errors here
				console.log('ERRORS: ' + data.error);
			*/}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			// Handle errors here
			console.log('ERRORS: ' + textStatus);
			// STOP LOADING SPINNER
		}
	});

 }
 