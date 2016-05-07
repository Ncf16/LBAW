{foreach from=$activeCourses item=course}
     <tr>
      <th scope="row">
        <a href='{$BASE_URL}pages/Course/coursePage.php?course={$course.code}'> {$course.name}
        </a>
      </th>
      <td>
        <a href='{$BASE_URL}pages/Person/personalPage.php?person={$course.directorusername}'>{$course.directorname}</a> 
      </td>
      <td>{$course.creationdate}</td>
      
     {if $course.coursetype eq 'Masters'}
      <td>5</td>
    {elseif $course.coursetype eq 'Bachelor'}
         <td>3</td>
    {elseif $course.coursetype  eq 'PhD'}
         <td>5</td>
    {/if}
      
      <td>{$course.coursetype}</td>
    </tr>
   {/foreach}