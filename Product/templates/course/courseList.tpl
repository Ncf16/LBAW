{include file='common/header.tpl'}
 
<link href="{$BASE_URL}css/courseList.css" rel="stylesheet">
<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Course List</h2>

<table class="table table-striped">
  <thead>
    <tr class="head">
      <th class="text-center">Courses</th>
      <th class="text-center">Director</th>
      <th class="text-center">Creation Date</th>
      <th class="text-center">Duration (years)</th>
	    <th class="text-center">Academic Degree </th>
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
<p>
	A course may take up to 3 years if it is a Bachelor or 5 years if it is a Master. Futhermore each course contains multiple curricular units grouped by year.
</p>

</div>
<!-- END OF CONTAINER -->

{include file='common/footer.tpl'}
