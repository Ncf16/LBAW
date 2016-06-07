BASE_URL = window.location.pathname;

var url_array = BASE_URL.split("/");
var BASE_URL = "/" + url_array[1] + '/' + url_array[2] + '/';

var ACTION_REFRESH_TIMEOUT = 500;
var ucID;
var uploadButtonHTML = '<button id="uploadSubmitBtn" method="POST" action="{$BASE_URL}actions/units/contentUpload.php" form="uploadFileForm" type="submit" class="btn" data-dismiss="modal">Upload</button>';
var uploadInProgress = false;
var uploadData;
var filePresentationName;

$(document).ready(function () {
    ucID= processFormData("uc=");

    // BUTTON TO OPEN MODAL
    $('#modal_upload_btn').click(modalUploadHandler);

    // BROWSE A FILE IN THE MODAL
    $('#pretendBtn').click(function(){
        $(this).blur();
        $('#fileupload').click();
    })
    //$('#uploadSubmitBtn').click(uploadSubmitHandler);

    // BUTTON TO CLOSE MODAL
    $('#closeBtn').click(function(){


         if(!uploadInProgress){
             $('#fileUploadModal').modal('hide');
         }else{
             //CANCEL UPLOAD
             uploadData.abort();
             $('#fileUploadModal').modal('hide');
         }
    });

    // WHEN MODAL CLOSES...
    $("#fileUploadModal").on("hidden.bs.modal", function () {

        if (uploadInProgress) {
            //$('#fileUploadModal').modal('show');
        } else {
            // CLEAR THE BAR
            clearProgressBar();
            // CLEAR THE FORM
            $('#submitButtonPlace').empty();
            $('#filedescriptor').empty();
            $(this).find('form')[0].reset();
            clearModalErrors();

            loadPage();
        }
    });

});


// JQUERY UPLOAD
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        replaceFileInput:false,
        fileInput: $("input:file"),
        add: function (e, data) {
            if (!uploadInProgress) {
                //data.context = $('#submitButtonPlace');

                $('#submitButtonPlace').html(uploadButtonHTML).unbind().click(function () {

                    filePresentationName = $('#filepresentationname').val();

                    uploadInProgress = true;
                    $('#progress .bar').css(
                        'border-width',
                        2 + 'px'
                    );
                    data.formData = {filepresentationname: filePresentationName, action: 'add', unitID: ucID};
                    uploadData = data;
                    $('#submitButtonPlace').html('Uploading...');
                    data.context = $('#submitButtonPlace');
                    data.submit();

                });
            }

        },
        done: function (e, data) {
            var result = data.response().result;

            //DO EXTRA VERIFICATIONS WITH RECEIVED STUFF...
            if(result.error == undefined){
                console.log("Success");
            }else{
                console.log("Error: " + result.error);
            }

            $('#submitButtonPlace').html('Upload Successful');
            uploadInProgress = false;

            data.context.text('Upload finished.');
        },
        fail: function (e, data) {
            // TODO: explain why it failed

            $('#submitButtonPlace').html('Upload Failed');
            uploadInProgress = false;
        },
        progressall: function (e, data) {


            var progress = parseInt(data.loaded / data.total * 100, 10);


            $('#progress .bar').css(
                'width',
                progress + '%'
            );
            $('#progress .bar').text(progress + '%');
        }

    });



    $('#fileupload').change(function () {

        if (!uploadInProgress) {
            var filename = $('#fileupload')[0].files[0].name;
            $('#filedescriptor').text('   ' + filename);
            clearProgressBar();
        }
    });

});


function modalUploadHandler(event) {

    $(this).blur();
    $('#fileUploadModal').modal({backdrop: 'static', keyboard: false});
    $('#fileUploadModal').modal('show');
}

function clearProgressBar() {
    $('#progress .bar').css(
        'width',
        0 + '%'
    );

    $('#progress .bar').css(
        'border-width',
        0 + 'px'
    );

    $('#progress .bar').text('');
}

function clearModalErrors() {
    $("#creation_success").empty();
    $("#creation_failure").empty();
}
