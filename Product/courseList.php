 
<?php
include_once("templates/header.html"); 
?>
<img src="images/books.jpg" class="img-responsive" alt="CourseBooks">
 
<link href="css/courseList.css" rel="stylesheet">

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
  <tbody>
    <tr>
      <th   scope="row"><a href="coursePage.php">MIEIC</a> </th>
      <td  ><a href="personalPage.php">João Carlos Pascoal Faria</a> </td>
      <td>2006/2007</td>
      <td>5</td>
      <td>Master</td>
      <td>585</td>
    </tr>
    <tr>
     <th scope="row"><a href="coursePage.php">CINF</a> </th>
      <td><a href="personalPage.php">Olívia Pestana</a> </td>
      <td>2007/2008</td>
      <td>3</td>
      <td>Bachelor</td> 
      <td>120</td>
    </tr>
    <tr>
      <th scope="row"><a href="coursePage.php">MIEM</a> </th>
      <td><a href="personalPage.php">Lucas Filipe Silva</a></td>
      <td>2006/2007</td>
      <td>5</td>
      <td>Master</td>
      <td>805</td>
    </tr>
     <tr>
      <th scope="row"><a href="coursePage.php">MIEM</a> </th>
      <td><a href="personalPage.php">Lucas Filipe Silva</a></td>
      <td>2006/2007</td>
      <td>5</td>
      <td>Master</td>
      <td>805</td>
    </tr>    
    <tr>
      <th scope="row"><a href="coursePage.php">MIEM</a> </th>
      <td><a href="personalPage.php">Lucas Filipe Silva</a></td>
      <td>2006/2007</td>
      <td>5</td>
      <td>Master</td>
      <td>805</td>
    </tr>
       <tr>
     <th scope="row"><a href="coursePage.php">CINF</a> </th>
      <td><a href="personalPage.php">Olívia Pestana</a> </td>
      <td>2007/2008</td>
      <td>3</td>
      <td>Bachelor</td> 
      <td>120</td>
    </tr>
  </tbody>
</table>
<p>
	A course may take up to 3 years if it is a Bachelor or 5 years if it is a Master. Futhermore each course contains multiple curricular units grouped by year.
</p>
<?php
include_once("templates/footer.html"); 
?>
