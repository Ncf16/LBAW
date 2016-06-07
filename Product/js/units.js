BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var pagination = new Pagination();

$(document).ready(function() {
	loadPage();
	$('.pagination').on('click', 'a', changePage);
	$('#units').on('click','a.btn-danger',deleteItem);
});

function loadPage(){

	 pagination.updateNbItemsPerPage(10);
	$.post(BASE_URL + "api/units.php", {action: 'list', itemsPerPage : pagination.nbItemsPerPage}, function(data){
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
	$.post(BASE_URL + "api/units.php", {action: 'list', itemsPerPage : nbItemsPerPage, page: newPage, nbUnits: nbItems}, function(data){
		$('#units').html('');
		addItens(data.units);
		pagination.addPagination(data.page,data.nbUnits,data.nbItemsPerPage);
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
	$.post(BASE_URL + "api/units.php", {action: 'delete', id: itemID, itemsPerPage: nbItemsPerPage, page: newPage, nbUnits: nbItems}, function(data){
		if (data['success'] == 'Success'){
			$('.pagination').html('');
			$('#units').html('');
			addItens(data.units);
			pagination.addPagination(data.page,data.nbUnits,data.nbItemsPerPage);
		}
	}, 'json');
}

function addItens(units){

	$.each(units, function(i, unit){
		var tr = $('<tr/>');
		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Edit'
		});
		var a = $('<a href="' + BASE_URL + "pages/CurricularUnit/updateUnit.php?unit=" + unit.curricularid + '"/>',{
			'data-title': 'View',
			'data-toggle': 'modal',
		}).addClass('btn btn-primary btn-xs');
		var glyPencil = $('<span/>').addClass('glyphicon glyphicon-pencil');
		par.append(a);
		a.append(glyPencil);

		var par2 = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Delete'
		});
		var a2 = $('<a/>',{
			'data-title': 'Delete',
			'data-toggle': 'modal',
			'id' : unit.curricularid

		}).addClass('btn btn-danger btn-xs');
		var glyRemove = $('<span/>').addClass('glyphicon glyphicon-trash');
		par2.append(a2);
		a2.append(glyRemove);

		tr.append($('<td/>').text(unit.name));
		tr.append($('<td/>').text(unit.area));
		tr.append($('<td/>').text(unit.credits));
		tr.append($('<td/>').append(par));
		tr.append($('<td/>').append(par2));
		$('#units').append(tr);
	});
};