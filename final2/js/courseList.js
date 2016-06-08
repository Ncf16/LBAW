// GLOBAL STUFF

BASE_URL = window.location.pathname;
var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var query = "";

var pagination = new Pagination();

$(document).ready(function() {
	loadPage();
	$('.pagination').on('click', 'a', changePage);

	$('#search_button').click(listSearch);
	$('#custom-search-input .search-query').keyup(listSearch);
});

function listSearch(event) {

	if (event.keyCode != 13 && event.keyCode != undefined) {
		return;
	}

	query = $('#custom-search-input .search-query').val();

	if(query != ""){
		loadPage(query);
	}

}

function loadPage(courseQuery){

	if(courseQuery == undefined)
		var courseQuery = "";

	$('.pagination').html('');
	pagination.updateNbItemsPerPage(10);

	$.post(
		BASE_URL + "api/exploreList.php", 
		{target: 'course',
			query: courseQuery,
			itemsPerPage : pagination.nbItemsPerPage},
		function(data){
			addItens(data.units);
			pagination.addPagination(data.page,data.nbUnits,data.nbItemsPerPage);
		}, 'json');
};

function changePage(event){

	event.preventDefault();
	var target = $(event.target);

	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	$('.pagination').html('');
	var newPage = pagination.updatePageNb(target);
	var nbItems = pagination.nbItems;
	var nbItemsPerPage = pagination.nbItemsPerPage;
	$.post(BASE_URL + "api/exploreList.php", 
		{target: 'course',
			query: query,
			itemsPerPage : nbItemsPerPage, page: newPage, nbUnits: nbItems},
		function(data){
			$('#units').html('');
			addItens(data.units);
			pagination.addPagination(data.page,data.nbUnits,data.nbItemsPerPage);
		}, 'json');
}

function addItens(units){

	$.ajax({
		url: '../../api/exploreTemplate.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: {template: "courseTable", units: units},
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {		
				
				$('#course_list').html(data);

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
};
