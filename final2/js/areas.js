BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var pagination = new Pagination();

$(document).ready(function() {
	loadPage();
	$('.pagination').on('click', 'a', changePage);
	$('#areas').on('click','a.btn-danger',deleteItem);
	$('#areas').on('click','button',setAreas);
	$('.btn-create').on('click',createArea);
});

function loadPage(){

	var nbItemsPerPage = 30;
	$.post(BASE_URL + "api/areas.php", {action: 'list', itemsPerPage : nbItemsPerPage}, function(data){
		addItens(data.areas);
		pagination.addPagination(data.page,data.nbAreas,nbItemsPerPage);
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
	$.post(BASE_URL + "api/areas.php", {action: 'list', itemsPerPage : nbItemsPerPage, page: newPage, nbAreas: nbItems}, function(data){
		$('#areas').html('');
		addItens(data.areas);
		pagination.addPagination(data.page,data.nbAreas,nbItemsPerPage);
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
	$.post(BASE_URL + "api/areas.php", {action: 'delete', id: itemID, itemsPerPage: nbItemsPerPage, page: newPage, nbAreas: nbItems}, function(data){
		if (data['success'] == 'Success'){
			$('.pagination').html('');
			$('#areas').html('');
			addItens(data.areas);
			pagination.addPagination(data.page,data.nbAreas,nbItemsPerPage);
		}
	}, 'json');
}

function createArea(event){
	
	event.preventDefault();
	var target = $(event.target);
	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var div = target.parent();

	if(target.hasClass('editMode')){
		var input = div.find('input').val();
		if(input.length > 64){
			target.html('<span class="glyphicon glyphicon-exclamation-sign"></span>');
			target.addClass('btn-danger').removeClass('btn-create');
			return;
		}
		target.addClass('btn-create').removeClass('btn-danger');
		$.post(BASE_URL + "api/areas.php", {action: 'create', areaVal : input}, function(data){
			div.find('input').remove();
			target.text('Create Area')
			target.toggleClass('editMode');
			$('.pagination').html('');
			$('#areas').html('');
			loadPage();
		},'json');
	}
	else{
		target.toggleClass('editMode');
		target.html('Confirm');
		div.append($('<input/>',{
				'type' : 'text'
			}));
	}
};

function setAreas(event){

	event.preventDefault();
	var target = $(event.target);
	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var itemID = target.attr('area');
	var areaTD = $('td[area=\''+itemID+'\']');

	if(target.hasClass('editMode')){
		var input = areaTD.find('input').val();
		if(input.length > 64){
			target.html('<span class="glyphicon glyphicon-exclamation-sign"></span>');
			target.addClass('btn-danger').removeClass('btn-info');
			return;
		}
		
		target.addClass('btn-info').removeClass('btn-danger');
		$.post(BASE_URL + "api/areas.php", {action: 'update', areaid : itemID, areaVal : input}, function(data){
			areaTD.text(input);
			target.html('<span class="glyphicon glyphicon-edit"></span>');
			target.toggleClass('editMode');
		},'json');
	}
	else{
		var area = areaTD.text();
		target.toggleClass('editMode');
		target.html('<span class="glyphicon glyphicon-ok"></span>');
		areaTD.html($('<input/>',{
				'type' : 'text',
				'val' : area
			}));
	}
};

function addItens(areas){

	var tr = $('<tr/>');
	var index = 0;
	$.each(areas, function(i, area){	
		
		var btnEdit = $('<button/>',{
			'area' : area.areaid
		}).addClass('btn btn-info btn-xs').append($('<span class="glyphicon glyphicon-edit"></span>'));

		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Delete'
		});
		var a = $('<a/>',{
			'data-title': 'Delete',
			'data-toggle': 'modal',
			'id' : area.areaid

		}).addClass('btn btn-danger btn-xs');
		var glyRemove = $('<span/>').addClass('glyphicon glyphicon-trash');
		par.append(a);
		a.append(glyRemove);

		tr.append($('<td/>',{
			'area' : area.areaid
		}).text(area.area));
		tr.append($('<td/>').append(btnEdit));
		if(index % 3 != 2 && index < areas.length - 1)
			tr.append($('<td/>').addClass('border').append(par));
		else{
			tr.append($('<td/>').append(par));
			$('#areas').append(tr);
			tr = $('<tr/>');
		}
		index++;
	});
};