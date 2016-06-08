BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var pagination = new Pagination();

$(document).ready(function() {
	loadPage(0);
	$('#searchUnits').on('click',searchPage);
	$('.pagination').on('click', 'a', changePage);
	$('#units').on('click','a.btn-danger',deleteItem);
});

function getType(){

	var course = $('input[name=uco_course]').val();
	var year = $('input[name=uco_year]').val();
	if(course.length > 0){
		if(year.length > 0)
			return [2,course,year];
		else
			return [1, course];
	}
	return [0];
}

function searchPage(event){

	event.preventDefault();
	var type = getType();
	$('.pagination').html('');
	$('#units').html('');
	loadPage(type[0],type[1],type[2]);
};

function loadPage(listType,courseName,yearName){

	var nbItemsPerPage = 10;
	$.post(BASE_URL + "api/unitOccurrences.php", {action: 'list', itemsPerPage : nbItemsPerPage, type: listType, course: courseName, year: yearName}, function(data){
		addItens(data.units);
		pagination.addPagination(data.page,data.nbUnits,nbItemsPerPage);
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
	var listType = getType();
	$.post(BASE_URL + "api/unitOccurrences.php", {action: 'list', itemsPerPage : nbItemsPerPage, page: newPage, nbUnits: nbItems, type: listType[0], course: listType[1], year: listType[2]}, function(data){
		$('#units').html('');
		addItens(data.units);
		pagination.addPagination(data.page,data.nbUnits,nbItemsPerPage);
	}, 'json');
}

function deleteItem(event){

	event.preventDefault();
	var target = $(event.target);

	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var itemID = target.attr('id');
	var newPage = pagination.page;
	var nbItems = pagination.nbItems;
	var nbItemsPerPage = pagination.nbItemsPerPage;
	var listType = getType();
	$.post(BASE_URL + "api/unitOccurrences.php", {action: 'delete', id: itemID, itemsPerPage: nbItemsPerPage, page: newPage, nbUnits: nbItems, type: listType[0], course: listType[1], year: listType[2]}, function(data){
		if (data['success'] == 'Success'){
			$('.pagination').html('');
			$('#units').html('');
			addItens(data.units);
			pagination.addPagination(data.page,data.nbUnits,nbItemsPerPage);
		}
	}, 'json');
}

function addItens(units){

	$.each(units, function(i, unit){
		var tr = $('<tr/>');
		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'View'
		});
		var a = $('<a href="' + BASE_URL + "pages/CurricularUnit/viewUnitOccurrence.php?uc=" + unit.cuoccurrenceid + '"/>',{
			'data-title': 'View',
			'data-toggle': 'modal',
		}).addClass('btn btn-primary btn-xs');
		var glyZoom = $('<span/>').addClass('glyphicon glyphicon-zoom-in');
		par.append(a);
		a.append(glyZoom);
		var par2 = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Edit'
		});
		var a2 = $('<a/>',{
			'data-title': 'Edit',
			'data-toggle': 'modal',
			'href': BASE_URL + "pages/CurricularUnit/updateUnitOccurrence.php?uc=" + unit.cuoccurrenceid

		}).addClass('btn btn-primary btn-xs');
		var glyPencil = $('<span/>').addClass('glyphicon glyphicon-pencil');
		par2.append(a2);
		a2.append(glyPencil);

		var par3 = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Delete'
		});
		var a3 = $('<a/>',{
			'data-title': 'Delete',
			'data-toggle': 'modal',
			'id' : unit.cuoccurrenceid

		}).addClass('btn btn-danger btn-xs');
		var glyRemove = $('<span/>').addClass('glyphicon glyphicon-trash');
		par3.append(a3);
		a3.append(glyRemove);

		tr.append($('<td/>').append(par));
		tr.append($('<td/>').text(unit.name));
		tr.append($('<td/>').text(unit.course));
		tr.append($('<td/>').text(unit.year));
		tr.append($('<td/>').text(unit.curricularyear));
		tr.append($('<td/>').text(unit.curricularsemester));
		tr.append($('<td/>').append(par2));
		tr.append($('<td/>').append(par3));
		$('#units').append(tr);
	});
};



