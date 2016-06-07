BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

$(document).ready(function() {
	
	$('#syllabusUnit').on('click', setSyllabus);
});

function setSyllabus(){

	var course = $('#course_code').val();
	$.post(BASE_URL + "api/syllabusUnits.php", {courseid : course}, function(data){
			processSyllabus(data);
	}, 'json');
}

function processSyllabus(data){

	document.location.href = BASE_URL + "pages/CurricularUnit/createUnitOccurrence.php?syllabus="
	+ data.syllabusid + "&course=" + data.coursecode + "&year=" + data.calendaryear;
}