
function Pagination(){
	this.page = 1;
	this.nbPages = 0;
	this.showPages = 10;
	this.nbItems = 0;
	this.nbItemsPerPage = 2;
}

Pagination.prototype.updateNbItemsPerPage = function(nbItemsPerPage){
	this.nbItemsPerPage = nbItemsPerPage;
}

Pagination.prototype.addPagination = function(page,nbItems,nbItemsPerPage,showPages){

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

}

Pagination.prototype.updatePageNb = function(target){

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
