{include file='common/header.tpl'}
<link href="{$BASE_URL}css/classes.css" rel="stylesheet">

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
          <input id="input_btn_pretend" class="btn btn-default btn-file hidden" type="button"
                 value="Select JSON File">
          <div>

              <div>
                  <input id="input_btn_real" class="input_file" type="file">
              </div>

          </div>
      </div>
    </div>

  <div class="row">
      <br>
      <table id="mytable" class="table bordered table-striped">
         <thead>

            <th class="col-md-3">Teacher</th>

            <th class="col-md-1">Delete</th>
         </thead>
         <tbody class="contentsListBody">
         </tbody>
      </table>

      <div class="clearfix"></div>
      <ul class="pagination pull-right">
      </ul>
   </div>
</div>

<script src="{$BASE_URL}js/pagination.js"></script>
<script src="{$BASE_URL}js/curricularContent.js"></script>

{include file='common/footer.tpl'}


<!-- Modal -->

<div id="fileUploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title"><strong>Request Submission</strong></h4>
            </div>

            <div class="modal-body">
                <form id="createRequestForm" class="form-horizontal" action="#" method="post" id="request_form">

                    <!-- TITLE -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <input  name="title" placeholder="Write the title here." class="form-control" type="text"
                                        required>

                            </div>
                        </div>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <textarea name="description"
                                          placeholder="Describe the request, including the reason for it."
                                          class="form-control" required></textarea>

                            </div>
                        </div>
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
                <button id="requestSubmitBtn" type="submit" class="btn btn-warning" data-dismiss="modal">Submit Request</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
