 
<?php
include_once('../../config/init.php');
include_once($BASE_DIR . "templates/common/header.html"); 
include_once($BASE_DIR . "database/Courses/courses.php"); 
?>
<img src=<?=$BASE_DIR ."images/books.jpg"?> class="img-responsive" alt="CourseBooks">
 
<link href=<?$BASE_DIR ."css/courseList.css"?> rel="stylesheet">

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
  <?php 
  $activeCourses=getAllActiveCourseList();
  
   foreach($activeCourses as $course){?>
     <tr>
      <th scope="row"><a href=<?="coursePage.php/id=".$course["code"]?>><?=$course["coursename"]?></a> </th>
      <td ><a href=<?="personalPage.php/code=".$course["teachercode"]?>><?=$course["diretorname"]?></a> </td>
      <td><?=$course["creationdate"]?></td>
      <td>5</td>
      <td><?=$course["coursetype"]?></td>
      <td><?=$course["count"]?></td>
    </tr>

<?php   }
   ?>
  
  
  </tbody>
</table>
<p>
	A course may take up to 3 years if it is a Bachelor or 5 years if it is a Master. Futhermore each course contains multiple curricular units grouped by year.
</p>
<?php
include_once($BASE_DIR . "templates/common/footer.html"); 
?>
