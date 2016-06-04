
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
      <table class="table table-responsive ucInfo">
          <tr>
            <td>Curricular Unit: <a href="{$BASE_URL}pages/CurricularUnit/viewUnitOccurrence.php?uc={$class.cuoccurrenceid}">{$class.unit}</a></td>
          </tr>
          <tr>
            <td>School Year: {$class.calendaryear}</td>
          </tr>
          <tr>
            <td>Date: {$class.day}</td>
          </tr>
          <tr>
            <td>Time: {$class.time}</td>
          </tr>
           <tr>
            <td>Teacher: <a href="{$BASE_URL}pages/Person/personalPage.php?person={$class.username}">{$class.name}</a></td>
          </tr>
          <tr>
            <td>Duration: {$class.duration} minutes</td>
          </tr>
          <tr>
            <td>Room: {$class.room}</td>
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
              <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"> Edit</span></button>
            </div>
          </div>
        </div>
        <div class="panel-body">
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