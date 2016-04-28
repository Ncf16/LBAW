{include file='common/header.tpl'}

<img src="{$BASE_URL}images/books.jpg" class="img-responsive" alt="CourseBooks">
 
<link href="{$BASE_URL}css/courseList.css" rel="stylesheet">

<table class="table table-striped">
  <thead>
    <tr class="head">
      <th class="text-center">Courses</th>
      <th class="text-center">Director</th>
      <th class="text-center">Creation Date</th>
      <th class="text-center">Duration (years)</th>
	  <th class="text-center">Academic Degree </th>
      <th class="text-center">Number Of Students</th>
    </tr>
  </thead>
  <tbody class="courseListBody">

  {foreach from=$activeCourses item=course}
     <tr>
      <th scope="row"><a href='coursePage.php' {* /id={$course.code} *}>{$course.coursename}</a> </th>
      <td ><a href='personalPage.php'{* code={$course.teachercode} *}>{$course.diretorname}</a> </td>
      <td>{$course.creationdate}</td>
      
     {if $course.coursetype eq 'Masters'}
    	<td>5</td>
		{elseif $course.coursetype eq 'Bachelor'}
    		 <td>3</td>
		{elseif $course.coursetype  eq 'PhD'}
   			 <td>5</td>
		{/if}
      
      <td>{$course.coursetype}</td>
      <td>{$course.count}</td>
    </tr>
   {/foreach}
  
  
  </tbody>
</table>
<p>
	A course may take up to 3 years if it is a Bachelor or 5 years if it is a Master. Futhermore each course contains multiple curricular units grouped by year.
</p>

{include file='common/footer.tpl'}
