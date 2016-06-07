BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL = "/" + url_array[1] + '/' + url_array[2] + '/';

var ACTION_REFRESH_TIMEOUT = 500;

var uc, classTeacher;

var pagination = new Pagination();

$(document).ready(function () {
    uc = processFormData("uc=");

    loadPage();
    $('.pagination').on('click', 'a', changePage);
});

function loadPage() {
    $('.contentsListBody').html('');
    $('.pagination').html('');

    pagination.updateNbItemsPerPage(5);
    $.post(BASE_URL + "api/curricularContent.php", {
        action: 'list',
        itemsPerPage: pagination.nbItemsPerPage,
        occurrenceID: uc
    }, function (data) {
        addItens(data.units);
        pagination.addPagination(data.page, data.nbUnits, data.nbItemsPerPage);
    }, 'json');
};

function changePage(event) {

    event.preventDefault();
    var target = $(event.target);

    if (target[0].nodeName == 'SPAN')
        target = target.parent();

    $('.pagination').html('');

    var newPage = pagination.updatePageNb(target);
    var nbItems = pagination.nbItems;
    var nbItemsPerPage = pagination.nbItemsPerPage;

    $.post(BASE_URL + "api/curricularContent.php", {
        action: 'list',
        itemsPerPage: nbItemsPerPage,
        page: newPage,
        nbClasses: nbItems,
        occurrenceID: uc,
    }, function (data) {
        addItens(data.units);
        pagination.addPagination(data.page, data.nbUnits, data.nbItemsPerPage);
    }, 'json');
}

function deleteItem(event) {
    /*
    var requestID = $('.modal-header input[name="requestID"]').val();
    var userID =  $('.modal-header input[name="userID"]').val();
    */
    var contentID = $(this).find('input[name="uploadid"]').val();

    $(this).blur();

    event.preventDefault();
    var target = $(event.target);

    if (target[0].nodeName == 'SPAN')
        target = target.parent();

    var itemID = target.attr('id');

    var newPage = pagination.page;
    var nbItems = pagination.nbItems;
    var nbItemsPerPage = pagination.nbItemsPerPage;
    $.post(BASE_URL + "api/deleteCurricularContent.php", {
        action: 'delete',
        contentID: contentID,
    }, function (data) {

            $('.pagination').html('');

    }, 'json');

    setTimeout(loadPage,ACTION_REFRESH_TIMEOUT);

}

function addItens(units) {

    $.ajax({
        url: '../../api/exploreTemplate.php',
        type: 'POST',
        data: {
            template: "unitContents",
            units: units
        },
        success: function (data, textStatus, jqXHR) {
            if (typeof data.error === 'undefined') {
                var elem = $(data);

                elem.find('a.deleteContentBtn').click(deleteItem);
                $('.contentsListBody').html(elem);

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

function processFormData(data) {

    var index = window.location.search.indexOf(data);
    if (index != -1)
        return window.location.search.substring(index + data.length);
}