BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var pagination = {

	page: 1,
	nbPages: 0,
	showPages: 10,
	nbItems: 0,
	nbItemsPerPage: 10,
	addPagination: function(page,nbItems,nbItemsPerPage,showPages){

		this.page = typeof page !== 'undefined' ? page : this.page;
		this.showPages = typeof showPages !== 'undefined' ? showPages : this.showPages;
		this.nbItems = typeof nbItems !== 'undefined' ? nbItems : this.nbItems;
		this.nbItemsPerPage = typeof nbItemsPerPage !== 'undefined' ? nbItemsPerPage : this.nbItemsPerPage;
		this.nbPages = Math.ceil(this.nbItems/this.nbItemsPerPage);
		var limPages = this.showPages;
		if (this.nbPages < this.showPages)
			limPages = this.nbPages;

		if(this.nbPages > 1){
			var pagination = $('.pagination');

			if(this.nbPages > this.showPages){
				var li = $('<li/>');
				if(this.page == 1)
					li.addClass('disabled');
				pagination.append(li.append(
				$('<a/>',{
					'href': '#'
				}).addClass('first').append($('<span/>').addClass('glyphicon glyphicon-backward')
				)));
			}

			var li = $('<li/>');
			if (this.page == 1)
				li.addClass('disabled');
			pagination.append(li.append(
				$('<a/>',{
					'href': '#'
				}).addClass('before').append($('<span/>').addClass('glyphicon glyphicon-chevron-left')
				)));

			var startPage = Math.min(Math.max(1,this.page - Math.floor(limPages / 2)),this.nbPages - limPages + 1);

			for (var i = 1; i <= limPages; i++) {
				var li = $('<li/>');
				if (startPage == this.page)
					li.addClass('active');
				li.append($('<a/>',{
					'href': '#'
				}).addClass('page').text(startPage++));
				pagination.append(li);
			}

			var li2 = $('<li/>');
			if(this.page == this.nbPages)
					li2.addClass('disabled');
			pagination.append(li2.append(
				$('<a/>',{
					'href': '#'
				}).addClass('next').append($('<span/>').addClass('glyphicon glyphicon-chevron-right')
				)));

			if(this.nbPages > this.showPages){
				var li = $('<li/>');
				if(this.page == this.nbPages)
					li.addClass('disabled');
				pagination.append(li.append(
				$('<a/>',{
					'href': '#'
				}).addClass('last').append($('<span/>').addClass('glyphicon glyphicon-forward')
				)));
			}
		}
	},
	updatePageNb: function(target){

		var targetClass = target.attr('class');
	
		if(targetClass == 'first')
			this.page = 1;
		else if(targetClass == 'before')
			this.page = Math.max(1,this.page-1);
		else if (targetClass == 'next')
			this.page = Math.min(this.page+1,this.nbPages);
		else if (targetClass == 'last')
			this.page = this.nbPages;
		else if (targetClass == 'page')
			this.page = target.text();

		return this.page;
	}
};

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
			target.addClass('btn-danger').removeClass('btn-info');
			return;
		}
		target.addClass('btn-info').removeClass('btn-danger');
		$.post(BASE_URL + "api/rooms.php", {action: 'create', roomVal : input}, function(data){
			div.find('input').remove();
			target.text('Create Room')
			target.toggleClass('editMode');
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



