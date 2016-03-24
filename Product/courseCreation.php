<?php
include_once("templates/header.html");
?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2 class="page-header">Create Course</h2>

  <form class="well form-horizontal" action="#" method="post" id="courseCreation_form">
    <div class="form-group">
      <label class="col-md-3 control-label">Name</label>  
      <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <input name="course_name" placeholder="Course Name" class="form-control" type="text" required>
        </div>
      </div>
    </div>

     <div class="form-group">
      <label class="col-md-3 control-label">Director</label>  
      <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input name="course_director" placeholder="Course Director" class="form-control" type="text" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Creation Date</label>  
      <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
          <select name="course_fundate" placeholder="Course Director" class="form-control" required>
            <option selected="selected">Select Course Year</option>
            <option>2012/2013</option>
            <option>2013/2014</option>
            <option>2014/2015</option>
            <option>2015/2016</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Duration</label>  
      <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
          <input name="course_duration" placeholder="0" class="form-control" type="number" min="1" max="6" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Degree</label>  
      <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
          <select name="couse_degree" placeholder="Course Director" class="form-control" required>
            <option selected="selected">Select Academic Degree</option>
            <option>Bachelor</option>
            <option>Master</option>
            <option>PhD</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Description</label>  
      <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
          <textarea class="form-control" cols="50" row="5" id="description"></textarea>
        </div>
      </div>
    </div>
    
    <input name="course_students" placeholder="Course Director" class="form-control" type="hidden">
    
    <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Create New Course</button>
      </div>
    </div>

  </form>

     </div>
     <div class="col-md-6">
      <h2 class="page-header">Add Curricular Units</h2>
    </div>
  </div>
</div>

<?php
include_once("templates/footer.html");
?>