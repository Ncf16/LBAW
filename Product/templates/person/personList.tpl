{include file='common/header.tpl'}
 
<link href="{$BASE_URL}css/courseList.css" rel="stylesheet">
<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Person List</h2>

<table class="table table-striped">
  <thead>
    <tr class="head">
      <th class="text-center">Name</th>
      <th class="text-center">Account Type</th>
    </tr>
  </thead>
  <tbody class="courseListBody">

  {foreach from=$people item=person}
     <tr>
      <th scope="row">
        <a href='{$BASE_URL}pages/Person/personalPage.php?person={$person.username}'> {$person.name}
        </a>
      </th>
      <td>
        {$person.persontype}
      </td>
    </tr>
   {/foreach}
  
  
  </tbody>
</table>

</div>
<!-- END OF CONTAINER -->

{include file='common/footer.tpl'}
