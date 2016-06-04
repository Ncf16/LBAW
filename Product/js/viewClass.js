BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var classTbl;

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
	classTbl = processFormData("class=");
	loadPage();
	$('.pagination').on('click', 'a', changePage);
	$('#attendances').on('click','a.btn-danger',deleteItem);
	$('#attendances').on('click','button',toggleAttendance);
	$('#checkAll').on('click',allAttendances);
	$('#uncheckAll').on('click',noneAttendances);
	$('#editSummary').on('click',editSummary);
	$('.editInfo').on('click',editInfo);
});

function loadPage(){

	var nbItemsPerPage = 10;
	$.post(BASE_URL + "api/attendances.php", {action: 'list', itemsPerPage : nbItemsPerPage, classid : classTbl}, function(data){
		addItens(data.attendances);
		pagination.addPagination(data.page,data.nbAttendances,nbItemsPerPage);
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
	$.post(BASE_URL + "api/attendances.php", {action: 'list', itemsPerPage : nbItemsPerPage, page: newPage, nbAttendances: nbItems, classid : classTbl}, function(data){
		$('#attendances').html('');
		addItens(data.attendances);
		pagination.addPagination(data.page,data.nbAttendances,nbItemsPerPage);
	}, 'json');
}

function deleteItem(event){

	event.preventDefault();
	var target = $(event.target);

	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var itemID = target.attr('attendance');
	var newPage = pagination.page;
	var nbItems = pagination.nbItems;
	var nbItemsPerPage = pagination.nbItemsPerPage;
	$.post(BASE_URL + "api/attendances.php", {action: 'delete', id: itemID, itemsPerPage: nbItemsPerPage, page: newPage, nbAttendances: nbItems, classid : classTbl}, function(data){
		if (data['success'] == 'Success'){
			$('.pagination').html('');
			$('#attendances').html('');
			addItens(data.attendances);
			pagination.addPagination(data.page,data.nbAttendances,nbItemsPerPage);
		}
	}, 'json');
};

function toggleAttendance(event){

	event.preventDefault();
	var target = $(event.target);
	if(target[0].nodeName == 'SPAN')
		target = target.parent();
	var itemID = target.attr('attendance');
	var attended = target.attr('attended');
	var parms = itemID.split(".");
	if(parms.length != 2)
		return;
	$.post(BASE_URL + "api/attendances.php", {action: 'update', classid: parms[0], student: parms[1], attendanceVal : attended}, function(data){
		updateAttendance(data.attended,itemID);
	},'json');
};

function updateAttendance(attendanceVal,itemID){

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

function allAttendances(){

	$.post(BASE_URL + "api/attendances.php", {action: 'update', classid: classTbl, attendanceVal : true}, function(data){
		$('.pagination').html('');
		$('#attendances').html('');
		loadPage();
	},'json');
};

function noneAttendances(){

	$.post(BASE_URL + "api/attendances.php", {action: 'update', classid: classTbl, attendanceVal : false}, function(data){
		$('.pagination').html('');
		$('#attendances').html('');
		loadPage();
	},'json');
};

function editSummary(){

	var text = $('#editSummary').text();
	if(text == 'Submit changes'){
		var textArea = $('div.panel-body textArea').val();
		var oldText = $('div.panel-body input').val();
		$('div.panel-body').html('');
		$.post(BASE_URL + "api/classes.php", {action: 'update', classid: classTbl, field : 'summary', value : textArea}, function(data){
			if(data == 'Success')
				$('div.panel-body').append($('<p/>').text(textArea));
			else
				$('div.panel-body').append($('<p/>').text(oldText));
		},'json');

		
		$('#editSummary').html('<span class="glyphicon glyphicon-edit"> Edit</span>');
	}
	else{
		var textArea = $('<textarea/>',{
			'name' : 'summary'
		}).addClass('form-control');
		var oldText = $('div.panel-body p').text()
		textArea.val(oldText);
		$('div.panel-body').html('');
		$('div.panel-body').append(textArea);
		$('div.panel-body').append($('<input/>',{
			'type' : 'hidden',
			'val' : oldText
		}));
		$('#editSummary').text('Submit changes');
	}
};

function postUpdate(edit,oldText,target,type,input){

	$.post(BASE_URL + "api/classes.php", {action: 'update', classid: classTbl, field : type, value : input}, function(data){
		
		if(data == 'Success'){
			if(type == 'duration')
				edit.append(input+ ' minutes');
			if(type == 'teacher'){
				teacher = input.split(': ');
				if(teacher.length != 2)
					return;
				edit.append($('<a/>',{
					'href' : BASE_URL + 'pages/Person/personalPage.php?person=' + teacher[1]
				}).append(teacher[0]));
			}
			else
				edit.append(input);
		}
		else
			edit.append(oldText);
		target.toggleClass('editMode');
	},'json');
};

function editInfo(event){

	event.preventDefault();
	var target = $(event.target);
	if(target[0].nodeName == 'SPAN')
		target = target.parent();

	var id = target.attr('id');
	var edit = target.parent().prev();

	if(target.hasClass('editMode')){
		var input = edit.find('input').val();
		var oldText = edit.find('input[type=hidden]').val();
		var text = edit.text().split(': ');
		edit.text(text[0] + ': ');
		target.html('<span class="glyphicon glyphicon-edit"></span>');

		if(id == 'editDate')
			postUpdate(edit,oldText,target,'date',input);
		else if(id == 'editTime')
			postUpdate(edit,oldText,target,'time',input);
		else if(id == 'editTeacher')
			postUpdate(edit,oldText,target,'teacher',input);
		else if(id == 'editDuration')
			postUpdate(edit,oldText,target,'duration',input);
		else if(id == 'editRoom')
			postUpdate(edit,oldText,target,'room',input);

	}
	else {
		var text = edit.text().split(': ');
		if(text.length != 2)
			return;
		target.toggleClass('editMode');
		edit.text(text[0] + ': ');
		target.html('<span class="glyphicon glyphicon-ok"></span>');
		if(id == 'editDate'){
			edit.append($('<input/>',{
				'type' : 'date',
				'val' : text[1]
			}));
		}
		else if (id == 'editTime'){
			edit.append($('<input/>',{
				'type' : 'time',
				'val': text[1]
			}));
		}
		else if (id == 'editTeacher'){
			var teacherName = processName(text[1]);
			edit.append($('<input/>',{
				'type' : 'text',
				'val': teacherName,
				'list' : 'teachers'
			}));
		}
		else if (id == 'editDuration'){
			var duration = parseInt(text[1], 10);
			edit.append($('<input/>',{
				'type' : 'number',
				'val': duration
			}));
		}
		else if(id == 'editRoom'){
			edit.append($('<input/>',{
				'type' : 'text',
				'val': text[1],
				'list' : 'rooms'
			}));
		}
		edit.append($('<input/>',{
			'type' : 'hidden',
			'val' : text[1]
		}));
	}
}

function addItens(attendances){

	$.each(attendances, function(i, attendance){
		var tr = $('<tr/>');
		var btnDefault = $('<button/>',{
			'attendance' : attendance.id
		}).addClass('btn btn-default btn-xs').append($('<span class="glyphicon glyphicon-minus"></span>'));

		var par = $('<p/>',{
			'data-placement': 'top',
			'data-toogle': 'tooltip',
			'title': 'Delete'
		});
		var a = $('<a/>',{
			'data-title': 'Delete',
			'data-toggle': 'modal',
			'attendance' : attendance.id

		}).addClass('btn btn-danger btn-xs');
		var glyRemove = $('<span/>').addClass('glyphicon glyphicon-trash');
		par.append(a);
		a.append(glyRemove);

		if(attendance.attended){
			var btnValid = $('<button/>',{
				'attendance' : attendance.id,
				'attended' : true
			}).addClass('btn btn-success btn-xs').append($('<span class="glyphicon glyphicon-ok"></span>'));
			tr.append($('<td/>').append(btnValid));
			btnDefault.attr('attended',false);
			tr.append($('<td/>').append(btnDefault));
		}
		else{
			btnDefault.attr('attended',true);
			tr.append($('<td/>').append(btnDefault));
			var btnInvalid = $('<button/>',{
				'attendance' : attendance.id,
				'attended' : false
			}).addClass('btn btn-danger btn-xs').append($('<span class="glyphicon glyphicon-remove"></span>'));
			tr.append($('<td/>').append(btnInvalid));
		}

		tr.append($('<td/>').append(attendance.name));
		tr.append($('<td/>').append(par));
		$('#attendances').append(tr);
	});
};

function processFormData(data){
	
	var index = window.location.search.indexOf(data);
	if (index != -1)
		return window.location.search.substring(index+data.length);
};

function processName(name){

	var length = name.length;
  	for(var i=length-1; i >= 0; i--){
  		if(name.charCodeAt(i) != 32 && name.charCodeAt(i) != 10)
    		return name.substring(0,i);
  }
  
  return name.substring(0,length);
}