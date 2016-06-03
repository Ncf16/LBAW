
{include file='common/header.tpl'}
<link href="{$BASE_URL}css/classes.css" rel="stylesheet">
<div id="unitPage" class="container">
  <div class="row">
    <div class="col-sm-10">
      <h1 class="page-header hidden-sm hidden-xs">Class</h1>
     
    </div>
  </div>

      <hr>
  <div class="row">
    <div class="col-md-5 col-md-offset-1 ">
      <div class="text-center">
        <h2>Information</h2>
      </div>
      <table class="table table-responsive classInfo">
          <tr>
            <td colspan="2">
              Curricular Unit: <a href="{$BASE_URL}pages/CurricularUnit/viewUnitOccurrence.php?uc={$class.cuoccurrenceid}">{$class.unit}</a></td>
          </tr>
          <tr>
            <td colspan="2">School Year: {$class.calendaryear}</td>
          </tr>
          <tr>
            <td width="90%">Date: {$class.day}</td>
            <td width="10%">
              <button type="button" class="btn btn-info btn-xs editInfo" id="editDate"><span class="glyphicon glyphicon-edit"></span></button>
            </td>
          </tr>
          <tr>
            <td>Time: {$class.time}</td>
            <td>
              <button type="button" class="btn btn-info btn-xs editInfo" id="editTime"><span class="glyphicon glyphicon-edit"></span></button>
            </td>
          </tr>
           <tr>
            <td>Teacher: <a href="{$BASE_URL}pages/Person/personalPage.php?person={$class.username}">{$class.name}</a>
            </td>
            <td>
              <button type="button" class="btn btn-info btn-xs editInfo" id="editTeacher"><span class="glyphicon glyphicon-edit"></span></button>
            </td>
            <datalist id="teachers">
                {foreach $teachers as $teacher}
                <option value="{$teacher.name}"></option>
                {/foreach}
              </datalist>
          </tr>
          <tr>
            <td>Duration: {$class.duration} minutes</td>
            <td>
              <button type="button" class="btn btn-info btn-xs editInfo" id="editDuration"><span class="glyphicon glyphicon-edit"></span></button>
            </td>
          </tr>
          <tr>
            <td>Room: {$class.room}</td>
            <td>
              <button type="button" class="btn btn-info btn-xs editInfo" id="editRoom"><span class="glyphicon glyphicon-edit"></span></button>
            </td>
            <datalist id="rooms">
                {foreach $rooms as $room}
                <option value="{$room.room}"></option>
                {/foreach}
              </datalist>
          </tr>
       </table>
    </div>
    <div class="col-md-5" id="summaryPanel">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-8">
              <h4>Summary</h4>
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-info" id="editSummary"><span class="glyphicon glyphicon-edit"> Edit</span></button>
            </div>
          </div>
        </div>
        <div class="panel-body" id="summaryBody">
          <p>{$class.summary}</p>
        </div>
      </div>
    </div>
  </div>

  <br>
  <p>
  <hr>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Attendances</h3>
      <br>
      <div class="col-md-2">
        <button class="btn btn-primary" id="checkAll">Mark all Attended</button>
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary" id="uncheckAll">Mark all Not Attended</button>
      </div>
      <br>
      <table id="attendancesTable" class="table table-bordred table-striped">
         <thead>
            <th class="col-md-1" colspan="2">Presence</th>
            <th class="col-md-10">Student Name</th>
            <th class="col-md-1">Delete</th>
         </thead>
         <tbody id="attendances">
         </tbody>
      </table>

      <div class="clearfix"></div>
      <ul class="pagination pull-right">
      </ul>
   </div>
 </div>
  </p>
</div>

<script src="{$BASE_URL}js/viewClass.js"></script>
{include file='common/footer.tpl'}