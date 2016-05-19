// GLOBAL STUFF

BASE_URL = window.location.pathname;
console.log(BASE_URL);
var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';
console.log(BASE_URL);

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

		return this.page;
	}
};

$(document).ready(function() {
	loadPage();
	$('.pagination').on('click', 'a', changePage);
});

function loadPage(){
	console.log("loadPage");
	var nbItemsPerPage = 10;
	$.post(
		BASE_URL + "api/exploreList.php", 
		{target: 'people', itemsPerPage : nbItemsPerPage}, 
		function(data){
			addItens(data.units);
			pagination.addPagination(data.page,data.nbUnits,nbItemsPerPage);
			console.log(data);
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
	$.post(BASE_URL + "api/exploreList.php", {target: 'people', itemsPerPage : nbItemsPerPage, page: newPage, nbUnits: nbItems}, function(data){
		$('#units').html('');
		addItens(data.units);
		pagination.addPagination(data.page,data.nbUnits,nbItemsPerPage);
	}, 'json');
}

function addItens(units){

	$.ajax({
		url: '../../api/exploreTemplate.php',           //TODO: MIGHT HAVE TO FIX THIS
		type: 'POST',
		data: {template: "peopleTable", units: units},
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {		
				
				$('#person_list').html(data);

			} else {
				// Handle errors here
				console.log('ERRORS: ' + data.error);
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			// Handle errors here
			console.log('ERRORS: ' + textStatus);
			// STOP LOADING SPINNER
		}
	});
};


/* 	OLD VERSION FOR GET
function parameterGET(name){
   if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
      return decodeURIComponent(name[1]);
}


function loadEventPageButtons() {

	var totalPages = Number($('#pageCount').val());
	var currentPage = Number(parameterGET('page'));


	//Number of pages it can go back or forward with the buttons, at once
	var numberBackForward = 3;
	numberBackForward = numberBackForward > totalPages - 1 ? totalPages - 1 : numberBackForward;

	// Se ultrapassar os limites que devia (1a pagina possivel e ultima), nao consegue
	var firstButton = currentPage - numberBackForward <= 1 ? 1 : currentPage - numberBackForward;
	var lastButton = currentPage + numberBackForward >= totalPages ? totalPages : currentPage + numberBackForward;

	
	console.log("Number of pages: " + totalPages);
	console.log(currentPage + numberBackForward);
	console.log("numberBackForward: " + numberBackForward);
	console.log("Current Page: " + currentPage);
	console.log("First Button " + firstButton);
	console.log("Last Button " + lastButton);
	
	
	$('#page_buttons').empty();
	for (var i = firstButton; i <= lastButton; i++) {

		if (i != currentPage) {
			$('#page_buttons').append('<button type="button" class="pageClick">' + i + '</button>');
		} else {
			$('#page_buttons').append('<button type="button" class="pageClick current">' + i + '</button>');
		}
	}

	// Handler only installed after buttons exist/are created
	$('.pageClick').on('click', function(e) {
		e.preventDefault();
		// Updates current page and refreshes events/buttons
		currentPage = parseInt($(this).context.textContent);
		//CHANGE PAGE HERE
	});

}

function personSearchHandler(){
	
}


function loadPersonList(){
	$('#person_list').empty();
}

$(document).ready(function() {
	loadEventPageButtons();
});
*/