BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var uc,classTeacher;

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
	uc = processFormData("uc=");
	classTeacher = processFormData("teacher=");
	loadPage(uc,classTeacher);
	$('.pagination').on('click', 'a', changePage);
	$('#classes').on('click','a.btn-danger',deleteItem);
});

function loadPage(){

	var nbItemsPerPage = 10;
	$.post(BASE_URL + "api/classes.php", {action: 'list', itemsPerPage : nbItemsPerPage, unit : uc, teacher: classTeacher}, function(data){
		addItens(data.classes);
		pagination.addPagination(data.page,data.nbClasses,nbItemsPerPage);
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
	$.post(BASE_URL + "api/classes.php", {action: 'list', itemsPerPage : nbItemsPerPage, page: newPage, nbClasses: nbItems, unit : uc, teacher: classTeacher}, function(data){
		$('#classes').html('');
		addItens(data.classes);
		pagination.addPagination(data.page,data.nbClasses,nbItemsPerPage);
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
	$.post(BASE_URL + "api/classes.php", {action: 'delete', id: itemID, itemsPerPage: nbItemsPerPage, page: newPage, nbClasses: nbItems, unit : uc, teacher: classTeacher}, function(data){
		if (data['success'] == 'Success'){
			$('.pagination').html('');
			$('#classes').html('');
			addItens(data.classes);
			pagination.addPagination(data.page,data.nbClasses,nbItemsPerPage);
		}
	}, 'json');
}

function addItens(classes){

	$.each(classes, function(i, classObj){
		var tr = $('<tr/>');
		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'View'
		});
		var a = $('<a/>',{
			'data-title': 'View',
			'data-toggle': 'modal',
			'href': BASE_URL + "pages/CurricularUnit/viewClass.php?class=" + classObj.classid

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
			'href': BASE_URL + "pages/CurricularUnit/updateClass?class=" + classObj.classid

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
			'id' : classObj.classid

		}).addClass('btn btn-danger btn-xs');
		var glyRemove = $('<span/>').addClass('glyphicon glyphicon-trash');
		par3.append(a3);
		a3.append(glyRemove);

		tr.append($('<td/>').append(par));
		tr.append($('<td/>').text(classObj.classdate));
		if(classObj.teacher)
			tr.append($('<td/>').text(classObj.teacher));
		if(classObj.unit)
			tr.append($('<td/>').text(classObj.unit))
		tr.append($('<td/>').text(classObj.room));
		tr.append($('<td/>').append(par2));
		tr.append($('<td/>').append(par3));
		$('#classes').append(tr);
	});
};

function processFormData(data){
	
	var index = window.location.search.indexOf(data);
	if (index != -1)
		return window.location.search.substring(index+data.length);
}