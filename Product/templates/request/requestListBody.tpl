{foreach from=$requests item=request}
     <tr>
      <th scope="row">
          <a href='{$BASE_URL}pages/Request/request.php?id={$request.requestid}'>{$request.requestid}</a>
      </th>
      <td>
          <a href='{$BASE_URL}pages/Person/personalPage.php?person={$request.studentusername}'>{$request.studentname}</a>
      </td>
      <td>
          <a href='{$BASE_URL}pages/Person/personalPage.php?person={$request.adminusername}'>{$request.adminname}</a>
      </td>
      <td>{if $request.approved == null}Not Answered{/if}{$request.approved}</td>
         <td></td>

    </tr>
   {/foreach}