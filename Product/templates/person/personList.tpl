<table class="table table-striped" >
  <thead>
    <tr class="head">
      <th>Name</th>
      <th>Account Type</th>
    </tr>
  </thead>
  <tbody class="courseListBody" id="person_list">
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