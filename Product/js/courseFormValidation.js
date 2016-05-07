BASE_URL = '/LBAW/Product/';

$(document).ready(function() {
 $("#courseForm").submit( submitNewCourseHandler);
 $("#course_degree").change(updateDuration);
});
function fillField(fieldID,value){
	$("#"+fieldID).val(value);
}
function updateDuration(){
	$("#course_duration").val(courseTypeToYears($("#course_degree").val()));
}
function courseTypeToYears(type){
  switch (type) {
  case 'PhD':
    return 5;
  case 'Masters':
    return 5;
  case 'Bachelor':
    return 3;
  default:
  return 0;
  }
   
}
 function submitNewCourseHandler(event){
	event.preventDefault();
	event.stopPropagation();
	event.target.blur();

	$.ajax({
		url: '../../api/courseEdit.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: new FormData(this),
		cache: false,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {	
					$("#message_status").text("");	
					console.log("DATA: "+data);	
				if (data.indexOf("true") > -1) {
					var course=data.replace(/[^0-9\.]/g, '');
					console.log(course);
					console.log( BASE_URL + "pages/Course/coursePage.php?course="+course);
					  window.location.href =  BASE_URL + "pages/Course/coursePage.php?course="+course;
				} else {
					console.log("Erro");
					 
					 $("#message_status").append(data);
					// console.log(data.search(/\w+_\w+_key/));
					// console.log(data.substring(130,data.length))
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