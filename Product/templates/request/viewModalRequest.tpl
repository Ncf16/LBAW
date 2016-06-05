<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title"><strong>Request Nr. {$request.requestid}</strong></h4>
                <input type="hidden" name="requestID" value="{$request.requestid}">
                <input type="hidden" name="userID" value="{$USERID}">
            </div>

            <div class="modal-body">
                <p class="pull-right"><strong>Status</strong>:
                    {if $request.approved == null}
                        {if $request.closed == 'false'}
                            <span class="unanswered">Not Answered</span>
                        {elseif  $request.closed == 'true'}
                            <span class="canceled">Canceled</span>
                        {/if}
                    {elseif $request.approved == 'true'}
                        <span class="approved">Approved</span>
                    {elseif $request.approved == 'false'}
                        <span class="rejected">Rejected</span>
                    {else} {$request.approved}
                    {/if}
                </p>
                <p><strong>Submitted by:</strong>
                    <a href="{$BASE_URL}/pages/Person/personalPage.php?person={$request.studentusername}">{$request.studentname}
                        - {$request.studentusername}</a>
                </p>
                <p class="pull-right"> <strong>Last Update: </strong>{$request.submitiondate|date_format:$config.requestDate}</p>
                <p><strong>Answered by: </strong>
                    {if $request.adminusername == null}
                        None
                    {else}
                        <a href="{$BASE_URL}/pages/Person/personalPage.php?person={$request.adminusername}">{$request.adminname}
                            - {$request.adminusername}</a>
                    {/if}
                </p>
                <p><strong>Title: </strong> {$request.title}</p>
                <p><strong>Description: </strong>{$request.description}</p>
            </div>

            <div class="modal-footer">
                {if $ACCOUNT_TYPE == 'Admin' && $request.closed == 'false'}
                    <button id="approve_btn" type="button" class="btn btn-success" data-dismiss="modal">Approve <span class="glyphicon glyphicon-ok"></span></button>
                    <button id="reject_btn" type="button" class="btn btn-danger" data-dismiss="modal">Reject <span class="glyphicon glyphicon-remove"></span></button>
                {elseif $ACCOUNT_TYPE == 'Student'}
                    <button id="cancel_btn" type="button" class="btn btn-warning" data-dismiss="modal">Cancel Request</button>
                {/if}
                <button type="button" class=" btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>