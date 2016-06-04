{foreach from=$requests item=request}
    <tr>
        <th scope="row">
            <a class="btn center-block requestItem">
                <span class="hidden">
                    {$request|@json_encode|escape}
                </span>
                {$request.requestid}
            </a>
        </th>
        <td>
            <a href='{$BASE_URL}pages/Person/personalPage.php?person={$request.studentusername}'>{$request.studentname}</a>
        </td>
        <td>
            {if $request.adminusername == null}
                None
            {else}
                <a href='{$BASE_URL}pages/Person/personalPage.php?person={$request.adminusername}'>{$request.adminname}</a>
            {/if}

        </td>
        <td>
            {if $request.approved == null}
                <span class="unanswered">Not Answered</span>
            {elseif $request.approved == 'true'}
                <span class="approved">Approved</span>
            {elseif $request.approved == 'false'}
                <span class="rejected">Rejected</span>
            {else} {$request.approved}
            {/if}
        </td>

        <td>{$request.submitiondate}</td>

    </tr>
{/foreach}
<script> var sample = "{$requests}";</script>