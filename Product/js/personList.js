// GLOBAL STUFF

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
