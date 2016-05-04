BASE_URL = '/LBAW/Product/';

var pagination = {

	page: 0,
	nbPages: 0,
	showPages: 9,
	addPagination: function(pages,page,showPages){

		this.page = typeof page !== 'undefined' ? page : this.page;
		this.nbPages = typeof pages !== 'undefined' ? Math.ceil(pages) : this.nbPages;
		var showPages = typeof showPages !== 'undefined' ? showPages : this.showPages;
		if (this.nbPages < showPages)
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

		var prevPage = this.page;
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


		$('.pagination').html('');
		this.addPagination();

		return this.page;
	}
};

$(document).ready(function() {
	loadPage();
	$('.pagination').on('click', 'a', changePage);
});

function loadPage(){

	$.post(BASE_URL + "api/units.php", {itemsPerPage : 2}, function(data){
		addItens(data.units);
		pagination.addPagination(data.pages,data.page);
	}, 'json');
};

function changePage(event){

	event.preventDefault();
	var target = $(event.target);

	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var page = pagination.changePage(target);
	console.log(page);
}

function addItens(units){

	$.each(units, function(i, unit){
		var tr = $('<tr/>');
		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Edit'
		});
		var btn = $('<button/>',{
			'data-title': 'Edit',
			'data-toggle': 'modal',
			'data-target': '#edit'

		}).addClass('btn btn-primary btn-xs');
		var glyPencil = $('<span/>').addClass('glyphicon glyphicon-pencil');
		par.append(btn);
		btn.append(glyPencil);

		var par2 = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Delete'
		});
		var btn2 = $('<button/>',{
			'data-title': 'Delete',
			'data-toggle': 'modal',
			'data-target': '#delete'

		}).addClass('btn btn-danger btn-xs');
		var glyRemove = $('<span/>').addClass('glyphicon glyphicon-remove');
		par2.append(btn2);
		btn2.append(glyRemove);

		tr.append($('<td/>').text(unit.name));
		tr.append($('<td/>').text(unit.area));
		tr.append($('<td/>').text(unit.credits));
		tr.append($('<td/>').append(par));
		tr.append($('<td/>').append(par2));
		$('#units').append(tr);
	});
};



