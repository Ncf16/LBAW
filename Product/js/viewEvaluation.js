BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var evaluationTbl;

var pagination = new Pagination();

$(document).ready(function() {
	evaluationTbl = processFormData("evaluationID=");
	loadPage();
	$('.pagination').on('click', 'a', changePage);
	$('#grades').on('click','a.btn-danger',deleteItem);
	$('#grades').on('click','button',setGrades);
});


function loadPage(){

	var nbItemsPerPage = 10;
	$.post(BASE_URL + "api/grades.php", {action: 'list', itemsPerPage : nbItemsPerPage, evaluationid : evaluationTbl}, function(data){
		addItens(data.grades);
		pagination.addPagination(data.page,data.nbGrades,nbItemsPerPage);
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
	$.post(BASE_URL + "api/grades.php", {action: 'list', itemsPerPage : nbItemsPerPage, page: newPage, nbGrades: nbItems, evaluationid : evaluationTbl}, function(data){
		$('#grades').html('');
		addItens(data.grades);
		pagination.addPagination(data.page,data.nbGrades,nbItemsPerPage);
	}, 'json');
}

function deleteItem(event){

	event.preventDefault();
	var target = $(event.target);

	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var itemID = target.attr('grade');
	var newPage = pagination.page;
	var nbItems = pagination.nbItems;
	var nbItemsPerPage = pagination.nbItemsPerPage;
	$.post(BASE_URL + "api/grades.php", {action: 'delete', id: itemID, itemsPerPage: nbItemsPerPage, page: newPage, nbAttendances: nbItems, evaluationid : evaluationTbl}, function(data){
		if (data['success'] == 'Success'){
			$('.pagination').html('');
			$('#grades').html('');
			addItens(data.grades);
			pagination.addPagination(data.page,data.nbGrades,nbItemsPerPage);
		}
	}, 'json');
};


function setGrades(event){

	event.preventDefault();
	var target = $(event.target);
	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var itemID = target.attr('grade');
	var gradeTD = $('td[grade=\''+itemID+'\']');

	if(target.hasClass('editMode')){
		var parms = itemID.split(".");
		if(parms.length != 2)
			return;
		var input = gradeTD.find('input').val();
		if(input < 0 || input > 20){
			target.html('<span class="glyphicon glyphicon-exclamation-sign"></span>');
			target.addClass('btn-danger').removeClass('btn-info');
			return;
		}
		
		target.addClass('btn-info').removeClass('btn-danger');
		$.post(BASE_URL + "api/grades.php", {action: 'update', evaluationid: parms[0], student: parms[1], gradeVal : input}, function(data){
			gradeTD.text(data.grade);
			target.html('<span class="glyphicon glyphicon-edit"></span>');
			target.toggleClass('editMode');
		},'json');
	}
	else{
		var grade = gradeTD.text();
		target.toggleClass('editMode');
		target.html('<span class="glyphicon glyphicon-ok"></span>');
		gradeTD.html($('<input/>',{
				'type' : 'number',
				'min' : '0',
				'step' : '0.01',
				'val' : grade
			}));
	}
};

function addItens(grades){

	$.each(grades, function(i, grade){
		var tr = $('<tr/>');
		var btnEdit = $('<button/>',{
			'grade' : grade.id
		}).addClass('btn btn-info btn-xs').append($('<span class="glyphicon glyphicon-edit"></span>'));

		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Delete'
		});
		var a = $('<a/>',{
			'data-title': 'Delete',
			'data-toggle': 'modal',
			'grade' : grade.id

		}).addClass('btn btn-danger btn-xs');
		var glyRemove = $('<span/>').addClass('glyphicon glyphicon-trash');
		par.append(a);
		a.append(glyRemove);

		tr.append($('<td/>',{
			'grade' : grade.id
		}).append(grade.grade));
		tr.append($('<td/>').append(btnEdit));
		tr.append($('<td/>').append(grade.name));
		tr.append($('<td/>').append(par));
		$('#grades').append(tr);
	});
};

function processFormData(data){
	
	var index = window.location.search.indexOf(data);
	if (index != -1)
		return window.location.search.substring(index+data.length);
};