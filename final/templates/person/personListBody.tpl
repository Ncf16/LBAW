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