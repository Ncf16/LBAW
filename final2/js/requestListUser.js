// GLOBAL STUFF

BASE_URL = window.location.pathname;
console.log(BASE_URL);
var url_array = BASE_URL.split("/");
var BASE_URL =  "/"+ url_array[1] + '/' + url_array[2] + '/';

var query = "";

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

	$('#search_button').click(listSearch);
	$('#custom-search-input .search-query').keyup(listSearch);
});

function listSearch(event) {

	if (event.keyCode != 13 && event.keyCode != undefined) {
		return;
	}

	query = $('#custom-search-input .search-query').val();

	if(query != ""){
		loadPage(query);
	}

}

function loadPage(courseQuery){
	console.log("loadPage: " + courseQuery);

	if(courseQuery == undefined)
		var courseQuery = "";

	$('.pagination').html('');
	var nbItemsPerPage = 10;
	$.post(
		BASE_URL + "api/exploreList.php", 
		{target: 'course',
			query: courseQuery,
			itemsPerPage : nbItemsPerPage},
		function(data){
			console.log("hi");
			console.log(data);
			addItens(data.units);
			console.log(data.nbUnits);
			pagination.addPagination(data.page,data.nbUnits,nbItemsPerPage);
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
	$.post(BASE_URL + "api/exploreList.php", 
		{target: 'course',
			query: query,
			itemsPerPage : nbItemsPerPage, page: newPage, nbUnits: nbItems},
		function(data){
			$('#units').html('');
			addItens(data.units);
			pagination.addPagination(data.page,data.nbUnits,nbItemsPerPage);
		}, 'json');
}

function addItens(units){

	$.ajax({
		url: '../../api/exploreTemplate.php',
		type: 'POST',
		data: {template: "courseTable", units: units},
		success: function(data, textStatus, jqXHR) {
			if (typeof data.error === 'undefined') {		
				
				$('#course_list').html(data);

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
