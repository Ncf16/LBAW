$(document).ready(function() {
	 $("#evaluationType").change(evaluationTypeChangeHandler);
	  $("#evaluationForm").submit( evaluationSubmitForm);
});

 function evaluationTypeChangeHandler(){
  
	$url ='../../api/';
    $link= $("#evaluationType option:selected" ).text().toLowerCase();
	$link=$link.concat(".php");
	$url=$url.concat($link);
	if($("#evaluationID").length>0)
		$evalID=$("#evaluationID").val();
	$.ajax({
		url:$url  ,           //TODO: MIGHT HAVE TO FIX THIS
		data:{evalID: $evalID},
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
  function evaluationSubmitForm(event){
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

		 	if (data.indexOf('false')==-1) {
					//location.reload();
					//window.location.replace($("#$BASE_URL").val()+"pages/Evaluation/");
					//TODO need to make redirect to created page
					console.log("worked");
				} else {
					emptyStatus();
					$("#message_status").prepend(data);
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
function fillField(fieldID,value){
	$("#"+fieldID).val(value);
}
function disableSelect(selectID){
	 $('#'+selectID).prop('disabled', 'disabled');
 }
