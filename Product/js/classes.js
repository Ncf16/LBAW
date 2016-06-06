BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var uc,classTeacher;

var pagination = new Pagination();

$(document).ready(function() {
	uc = processFormData("uc=");
	classTeacher = processFormData("teacher=");
	loadPage();
	$('.pagination').on('click', 'a', changePage);
	$('#classes').on('click','a.btn-danger',deleteItem);
});

function loadPage(){

	var nbItemsPerPage = 10;
	$.post(BASE_URL + "api/classes.php", {action: 'list', itemsPerPage : nbItemsPerPage, unit : uc, teacher: classTeacher}, function(data){
		addItens(data.classes,data.account);
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
		addItens(data.classes, data.account);
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
			addItens(data.classes, data.account);
			pagination.addPagination(data.page,data.nbClasses,nbItemsPerPage);
		}
	}, 'json');
}

function addItens(classes, account){

	$.each(classes, function(i, classObj){
		var tr = $('<tr/>');
		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'View'
		});
		var a = $('<a href="' + BASE_URL + "pages/Class/viewClass.php?class=" + classObj.classid + '"/>',{
			'data-title': 'View',
			'data-toggle': 'modal',
		}).addClass('btn btn-primary btn-xs');
		var glyZoom = $('<span/>').addClass('glyphicon glyphicon-zoom-in');
		par.append(a);
		a.append(glyZoom);

		if(account != 'Student'){
			var par2 = $('<p/>',{
				'data-placement': 'top',
				'data-toogle': 'tooltip',
				'title': 'Delete'
			});
			var a2 = $('<a/>',{
				'data-title': 'Delete',
				'data-toggle': 'modal',
				'id' : classObj.classid

			}).addClass('btn btn-danger btn-xs');
			var glyRemove = $('<span/>').addClass('glyphicon glyphicon-trash');
			par2.append(a2);
			a2.append(glyRemove);
		}

		tr.append($('<td/>').append(par));
		tr.append($('<td/>').text(classObj.classdate));
		if(classObj.teacher)
			tr.append($('<td/>').text(classObj.teacher));
		if(classObj.unit)
			tr.append($('<td/>').text(classObj.unit));
		tr.append($('<td/>').text(classObj.room));
		if(account != 'Student')
			tr.append($('<td/>').append(par2));
		$('#classes').append(tr);
	});
};

function processFormData(data){
	
	var index = window.location.search.indexOf(data);
	if (index != -1)
		return window.location.search.substring(index+data.length);
}