{include file='common/header.tpl'}

<link href="{$BASE_URL}css/requests.css" rel="stylesheet">
<script src="{$BASE_URL}js/pagination.js"></script>
<script src="{$BASE_URL}js/requestListCommon.js"></script>

{if $account == 'Admin'}
    <script src="{$BASE_URL}js/requestListAdmin.js"></script>
{else}
    <script src="{$BASE_URL}js/requestListStudent.js"></script>
{/if}

<input type="hidden" name="userID" value={$userID}>

<!-- CONTAINER -->
<div class="container">

    <h2 class="page-header">Requests</h2>
    {if $account == 'Admin'}
        {include file='request/requestListAdmin.tpl'}
    {else}
        {include file='request/requestListStudent.tpl'}
    {/if}
</div>


<!-- END OF CONTAINER -->

{include file='common/footer.tpl'}


<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Request Nr. </h4>
            </div>

            <div class="modal-body">
                <p class="pull-right"> Status:
                </p>
                <p> Submitted by: </p>
                <p class="pull-right"> Last Update: </p>
                <p> Answered by: </p>
                <p>Title:</p>
                <p>Description:</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Approve</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Reject</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->

<div id="requestCreationModal" class="modal fade" role="dialog">
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
