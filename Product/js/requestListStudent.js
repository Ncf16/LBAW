// GLOBAL STUFF

BASE_URL = window.location.pathname;
var url_array = BASE_URL.split("/");
var BASE_URL = "/" + url_array[1] + '/' + url_array[2] + '/';

var userID;
var tabSelector;

var currentPagination;
var pagination = new Pagination();
var answeredPagination = new Pagination();
var closedPagination = new Pagination();

$(document).ready(function () {
    userID = $('input[name="userID"').val();
    //console.log("User ID: " +  userID);

    loadTab();
    $('.pagination').on('click', 'a', changePage);

    $('#openRequests').on('shown.bs.tab', openTab);
    $('#closedRequests').on('shown.bs.tab', closedTab);

});

function openTab(event) {
    currentPagination = pagination;
    tabSelector = event.target.getAttribute('href');
    loadTab();
}
function closedTab(event) {
    currentPagination = closedPagination;
    tabSelector = event.target.getAttribute('href');
    loadTab();
}

function loadTab() {

    if (tabSelector == undefined) {
        currentPagination = pagination;
        tabSelector = $('.navPills .active').children('a')[0].getAttribute('href');
    }

    // Reset table body and pagination
    $(tabSelector + ' .requestListBody').html('');
    $(tabSelector + ' .pagination').html('');

    // Set the page to show 3 items
    currentPagination.updateNbItemsPerPage(3);

    $.post(
        BASE_URL + "api/requestList.php",
        {
            target: 'student',
            userID: userID,
            tab: tabSelector,
            itemsPerPage: currentPagination.nbItemsPerPage,
            page: currentPagination.page
        },
        function (data) {
            //console.log(data.units);
            addItens(data.units);
            currentPagination.addPagination(data.page, data.nbUnits, pagination.nbItemsPerPage);
        }, 'json');
};

function changePage(event) {


    event.preventDefault();
    var target = $(event.target);

    if (target[0].nodeName == 'SPAN')
        target = target.parent();

    // Reset pagination and table body
    $('#units').html('');  // maybe $(tabSelector + ' .requestListBody').html(''); too ?
    $(tabSelector + ' .pagination').html('');

    var newPage = currentPagination.changePage(target);
    var nbItems = currentPagination.nbItems;
    var nbItemsPerPage = currentPagination.nbItemsPerPage;

    $.post(BASE_URL + "api/requestList.php",
        {
            target: 'student',
            userID: userID,
            tab: tabSelector,
            itemsPerPage: nbItemsPerPage,
            page: newPage,
            nbUnits: nbItems
        },
        function (data) {

            addItens(data.units);
            currentPagination.addPagination(data.page, data.nbUnits, nbItemsPerPage);
        }, 'json');
}

function addItens(units, tab) {
    $.ajax({
        url: '../../api/exploreTemplate.php',           //TODO: MIGHT HAVE TO FIX THIS
        type: 'POST',
        data: {
            template: "requests",
            units: units
        },
        success: function (data, textStatus, jqXHR) {
            if (typeof data.error === 'undefined') {
                var elem = $(data);

                elem.find('a.requestItem').click(requestItemHandler);
                $(tabSelector + ' .requestListBody').html(elem);

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
