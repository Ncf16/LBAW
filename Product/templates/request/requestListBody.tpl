{foreach from=$requests item=request}
     <tr>
      <th scope="row">
          <a class="btn center-block" href='{$BASE_URL}pages/Request/viewRequest.php?id={$request.requestid}'>{$request.requestid}</a>
      </th>
      <td>
          <a href='{$BASE_URL}pages/Person/personalPage.php?person={$request.studentusername}'>{$request.studentname}</a>
      </td>
      <td>
          <a href='{$BASE_URL}pages/Person/personalPage.php?person={$request.adminusername}'>{$request.adminname}</a>
      </td>
      <td>
          {if $request.approved == null}Not Answered
          {elseif $request.approved == 'true'} Approved
          {elseif $request.approved == 'false'} Not Approved
          {else} {$request.approved}
          {/if}
      </td>

         <td>Date Here</td>

    </tr>
   {/foreach}