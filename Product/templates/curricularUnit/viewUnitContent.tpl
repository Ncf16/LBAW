{include file='common/header.tpl'}
<link href="{$BASE_URL}css/content.css" rel="stylesheet">
<link href="{$BASE_URL}css/jquery.fileupload.css" rel="stylesheet">
<link href="{$BASE_URL}css/jquery.fileupload-ui.css" rel="stylesheet">
<link href="{$BASE_URL}css/jquery.fileupload-noscript.css" rel="stylesheet">
<link href="{$BASE_URL}css/jquery.fileupload-ui-noscript.css" rel="stylesheet">
<link href="{$BASE_URL}css/style.css" rel="stylesheet">


<div class="container" id="classesPage">
   <div class="row">
      <div class="col-md-12">
         <h2 class="page-header">
            Unit Contents
            {if $classes.unitInformation}
            <small>{$classes.unitInformation}</small>
            {elseif $classes.teacherInformation}
            <small>{$classes.teacherInformation}</small>
            {/if}
         </h2>
      </div>
      <div class="col-sm-2">

          <div>

              <button id="modal_upload_btn" class="btn" type="button" value="Upload">Upload</button>

          </div>
      </div>
    </div>

  <div class="row">
      <br>
      <table id="mytable" class="table bordered table-striped">
         <thead>

            <th class="col-md-3">File</th>

            <th class="col-md-1 col-md-offset-1">Delete</th>
         </thead>
         <tbody class="contentsListBody">
         </tbody>
      </table>

      <div class="clearfix"></div>
      <ul class="pagination pull-right">
      </ul>
   </div>
</div>



<script src="{$BASE_URL}js/jquery.iframe-transport.js"></script>
<script src="{$BASE_URL}js/vendor/jquery.ui.widget.js"></script>
<script src="{$BASE_URL}js/jquery.fileupload.js"></script>
<script src="{$BASE_URL}js/jquery.fileupload-ui.js"></script>

<script src="{$BASE_URL}js/pagination.js"></script>
<script src="{$BASE_URL}js/curricularContentList.js"></script>
<script src="{$BASE_URL}js/curricularContentManager.js"></script>



{include file='common/footer.tpl'}


<!-- Modal -->

<div id="fileUploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title"><strong>Curricular Unit File Upload</strong></h4>
            </div>

            <div class="modal-body">
                <form id="uploadFileForm" class="form-horizontal" action="#" method="post">

                    <!-- Upload button -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Upload Here</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <button id="pretendBtn" type="button" class="btn btn-file">Browse</button>
                                <span id="filedescriptor"></span>
                                <input id="fileupload" class="hidden" type="file" name="file" data-url="{$BASE_URL}actions/units/contentUpload.php">
                            </div>
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <input id="filepresentationname" name="fileName"
                                          placeholder="Name the file will have when displayed on the page."
                                          class="form-control" required>

                            </div>
                        </div>
                    </div>

                    <div id="progress">
                        <div class="bar" style="width: 0%;"></div>
                    </div>

                    <div class="form-group">

                        <!-- SUCCESS MESSAGE -->
                        <div id="creation_success" class="text-center">
                        </div>
                        <!-- FAILURE MESSAGE -->
                        <div id="creation_failure" class="text-center">
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <span id="submitButtonPlace">

                </span>
                <button id="closeBtn" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
