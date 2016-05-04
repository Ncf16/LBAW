<table class="table table-striped">
  <thead>
    <tr class="head">
      <th>Courses</th>
      <th>Director</th>
      <th>Creation Date</th>
      <th>Duration (years)</th>
      <th>Academic Degree </th>
    </tr>
  </thead>
  <tbody class="courseListBody">

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
  
  
  </tbody>
</table>