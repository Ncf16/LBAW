{include file='common/header.tpl'}

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-header">Curricular Unit Occurrence</small>
      </h2>
    </div>
    <div class="col-sm-2">
        <a href="{$BASE_URL}pages/curricularUnit/createUnit.php">
          <button class="btn btn-primary" id="createUnit">Create New Occurrence</button>
        </a>
      </div>
    </div>

    <div class="row">
      <br>
      <div class="form-group col-md-4">
        <label class="col-md-8 control-label">Course</label>
        <input name="uco_course" placeholder="List occurrences of a Course" value="{$FORM_VALUES.course}" list="courses" class="form-control" type="text">
            <datalist id="courses">
              {foreach $courses as $course}
              <option value="{$course.name}"></option>
              {/foreach}
            </datalist>
      </div>
      <div class="form-group col-md-4">
        <label class="col-md-8 control-label">School Year (Start year)</label>
        <input name="uco_year" placeholder="Specify the School year" value="{$FORM_VALUES.year}" list="years" class="form-control" type="text">
            <datalist id="years">
              {foreach $years as $year}
              <option value="{$year.year}"></option>
              {/foreach}
            </datalist>
      </div>
      <div class="col-md-1">
        <br>
        <button class="btn btn-primary pull-right" id="searchUnits">Go</button>
      </div>
    </div>

  <div class="row">
  	<table id="mytable" class="table table-bordred table-striped">
  		<thead>
  			<th class="col-md-1">View</th>
  			<th class="col-md-3">Name</th>
  			<th class="col-md-3">Course</th>
  			<th class="col-md-1">School Year</th>
        <th class="col-md-1">Course Year</th>
        <th class="col-md-1">Course Semester</th>
        <th class="col-md-1">Edit</th>
        <th class="col-md-1">Delete</th>
  		</thead>
  		<tbody id="units">
  		</tbody>
  	</table>

  	<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  	</ul>
  </div>
</div>

<script src="{$BASE_URL}js/unitOccurrences.js"></script>

{include file='common/footer.tpl'}