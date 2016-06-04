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
                <p class="pull-right"> Date: </p>
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
