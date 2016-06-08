// GLOBAL STUFF

BASE_URL = window.location.pathname;
var url_array = BASE_URL.split("/");
var BASE_URL = "/" + url_array[1] + '/' + url_array[2] + '/';

var query = "";

var pagination = new Pagination();

$(document).ready(function () {
    loadPage("");
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

function loadPage(peopleQuery) {

    if(peopleQuery == undefined)
        var peopleQuery = "";

    // Reset pagination
    $('.pagination').html('');

    pagination.updateNbItemsPerPage(10);
    $.post(
        BASE_URL + "api/exploreList.php",
        {
            target: 'people',
            query: peopleQuery,
            itemsPerPage: pagination.nbItemsPerPage
        },
        function (data) {
            addItens(data.units);
            pagination.addPagination(data.page, data.nbUnits, data.nbItemsPerPage);
            console.log(data);
        }, 'json');
}

function changePage(event) {
    event.preventDefault();
    var target = $(event.target);

    if (target[0].nodeName == 'SPAN')
        target = target.parent();
    $('.pagination').html('');
    var newPage = pagination.updatePageNb(target);
    var nbItems = pagination.nbItems;
    var nbItemsPerPage = pagination.nbItemsPerPage;

    $.post(BASE_URL + "api/exploreList.php", {
        target: 'people',
        query: query,
        itemsPerPage: nbItemsPerPage,
        page: newPage,
        nbUnits: nbItems
    }, function (data) {
        console.log(data);
        $('#units').html('');
        addItens(data.units);
        pagination.addPagination(data.page, data.nbUnits, data.nbItemsPerPage);
    }, 'json');
}

function addItens(units) {

    $.ajax({
        url: '../../api/exploreTemplate.php',           //TODO: MIGHT HAVE TO FIX THIS
        type: 'POST',
        data: {template: "peopleTable", units: units},
        success: function (data, textStatus, jqXHR) {
            if (typeof data.error === 'undefined') {

                $('#person_list').html(data);

            } else {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
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