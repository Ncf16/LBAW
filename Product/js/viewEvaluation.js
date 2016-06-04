BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var evaluationTbl;

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
		var oldText = gradeTD.find('input[type=hidden]').val();
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
		
		gradeTD.append($('<input/>',{
			'type' : 'hidden',
			'val' : grade
		}));
	}
};

function updateGrade(gradeVal,itemID){

	var attValid = $('button[attended=true][attendance=\''+itemID+'\']');
	var attInvalid = $('button[attended=false][attendance=\''+itemID+'\']');
	attValid.empty();
	attInvalid.empty();

	if(attendanceVal){
		attValid.attr('class','btn btn-success btn-xs');
		attValid.append($('<span class="glyphicon glyphicon-ok"></span>'));
		attInvalid.attr('class','btn btn-default btn-xs');
		attInvalid.append($('<span class="glyphicon glyphicon-minus"></span>'));
	}
	else{
		attValid.attr('class','btn btn-default btn-xs');
		attValid.append($('<span class="glyphicon glyphicon-minus"></span>'));
		attInvalid.attr('class','btn btn-danger btn-xs');
		attInvalid.append($('<span class="glyphicon glyphicon-remove"></span>'));
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