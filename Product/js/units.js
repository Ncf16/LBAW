BASE_URL = '/LBAW/Product/';

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
		if (this.nbPages < this.showPages)
			this.showPages = this.nbPages;

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

			var startPage = Math.min(Math.max(1,this.page - Math.floor(this.showPages / 2)),this.nbPages - this.showPages + 1);

			for (var i = 1; i <= this.showPages; i++) {
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
	changePage: function(target){

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

		this.addPagination();
		return this.page;
	}
};

$(document).ready(function() {
	loadPage();
	$('.pagination').on('click', 'a', changePage);
	$('#units').on('click','a.btn-danger',deleteItem);
});

function loadPage(){

	var nbItemsPerPage = 10;
	$.post(BASE_URL + "api/units.php", {action: 'list', itemsPerPage : nbItemsPerPage}, function(data){
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
	var newPage = pagination.changePage(target);
	var nbItems = pagination.nbItems;
	var nbItemsPerPage = pagination.nbItemsPerPage;
	$.post(BASE_URL + "api/units.php", {action: 'list', itemsPerPage : nbItemsPerPage, page: newPage, nbUnits: nbItems}, function(data){
		$('#units').html('');
		addItens(data.units);
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
			'title': 'Edit'
		});
		var a = $('<a/>',{
			'data-title': 'Edit',
			'data-toggle': 'modal',
			'href': BASE_URL + "pages/CurricularUnit/updateUnit.php?unit=" + unit.curricularid

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



