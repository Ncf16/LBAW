BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var pagination = new Pagination();

$(document).ready(function() {
	loadPage();
	$('.pagination').on('click', 'a', changePage);
	$('#rooms').on('click','a.btn-danger',deleteItem);
	$('#rooms').on('click','button',setRooms);
	$('.btn-create').on('click',createRoom);
});

function loadPage(){

	var nbItemsPerPage = 30;
	$.post(BASE_URL + "api/rooms.php", {action: 'list', itemsPerPage : nbItemsPerPage}, function(data){
		addItens(data.rooms);
		pagination.addPagination(data.page,data.nbRooms,nbItemsPerPage);
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
	$.post(BASE_URL + "api/rooms.php", {action: 'list', itemsPerPage : nbItemsPerPage, page: newPage, nbRooms: nbItems}, function(data){
		$('#rooms').html('');
		addItens(data.rooms);
		pagination.addPagination(data.page,data.nbRooms,nbItemsPerPage);
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
	$.post(BASE_URL + "api/rooms.php", {action: 'delete', id: itemID, itemsPerPage: nbItemsPerPage, page: newPage, nbRooms: nbItems}, function(data){
		if (data['success'] == 'Success'){
			$('.pagination').html('');
			$('#rooms').html('');
			addItens(data.rooms);
			pagination.addPagination(data.page,data.nbRooms,nbItemsPerPage);
		}
	}, 'json');
}

function createRoom(event){
	
	event.preventDefault();
	var target = $(event.target);
	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var div = target.parent();

	if(target.hasClass('editMode')){
		var input = div.find('input').val();
		if(input.length > 4){
			target.html('<span class="glyphicon glyphicon-exclamation-sign"></span>');
			target.addClass('btn-danger').removeClass('btn-create');
			return;
		}
		target.addClass('btn-create').removeClass('btn-danger');
		$.post(BASE_URL + "api/rooms.php", {action: 'create', roomVal : input}, function(data){
			div.find('input').remove();
			target.text('Create Room')
			target.toggleClass('editMode');
			$('.pagination').html('');
			$('#rooms').html('');
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

function setRooms(event){

	event.preventDefault();
	var target = $(event.target);
	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var itemID = target.attr('room');
	var roomTD = $('td[room=\''+itemID+'\']');

	if(target.hasClass('editMode')){
		var input = roomTD.find('input').val();
		if(input.length > 4){
			target.html('<span class="glyphicon glyphicon-exclamation-sign"></span>');
			target.addClass('btn-danger').removeClass('btn-info');
			return;
		}
		
		target.addClass('btn-info').removeClass('btn-danger');
		$.post(BASE_URL + "api/rooms.php", {action: 'update', roomid : itemID, roomVal : input}, function(data){
			roomTD.text(input);
			target.html('<span class="glyphicon glyphicon-edit"></span>');
			target.toggleClass('editMode');
		},'json');
	}
	else{
		var room = roomTD.text();
		target.toggleClass('editMode');
		target.html('<span class="glyphicon glyphicon-ok"></span>');
		roomTD.html($('<input/>',{
				'type' : 'text',
				'val' : room
			}));
	}
};

function addItens(rooms){

	var tr = $('<tr/>');
	var index = 0;
	$.each(rooms, function(i, room){	
		
		var btnEdit = $('<button/>',{
			'room' : room.roomid
		}).addClass('btn btn-info btn-xs').append($('<span class="glyphicon glyphicon-edit"></span>'));

		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Delete'
		});
		var a = $('<a/>',{
			'data-title': 'Delete',
			'data-toggle': 'modal',
			'id' : room.roomid

		}).addClass('btn btn-danger btn-xs');
		var glyRemove = $('<span/>').addClass('glyphicon glyphicon-trash');
		par.append(a);
		a.append(glyRemove);

		tr.append($('<td/>',{
			'room' : room.roomid
		}).text(room.room));
		tr.append($('<td/>').append(btnEdit));
		if(index % 3 != 2 && index < rooms.length - 1)
			tr.append($('<td/>').addClass('border').append(par));
		else{
			tr.append($('<td/>').append(par));
			$('#rooms').append(tr);
			tr = $('<tr/>');
		}
		index++;
	});
};



