
{include file='common/header.tpl'}
<link href="{$BASE_URL}css/classes.css" rel="stylesheet">
<div id="evaluationPage" class="container">
  <div class="row">
    <div class="col-sm-10">
      <h1 class="page-header hidden-sm hidden-xs">Evaluation</h1>
     
    </div>
  </div>

      <hr>
  <div class="row">
    <div class="col-md-10 col-md-offset-1 ">
      <div class="text-center">
        <h2>Information</h2>
      </div>
      <table class="table table-responsive classInfo">
            <tr>
                <td colspan="2">
                    Curricular Unit: <a href="{$BASE_URL}pages/CurricularUnit/viewUnitOccurrence.php?uc={$evaluation.cuoccurrenceid}">{$evaluation.name}</a>
                </td>
                <td colspan="2">School Year: {$evaluation.calendaryear}</td>
            </tr>
            <tr>
                <td width="45%">Date: {$evaluation.day}</td>
                <td width="5%">
                    <button type="button" class="btn btn-info btn-xs editInfo" id="editDate"><span class="glyphicon glyphicon-edit"></span></button>
                </td width="45%">
                <td>Time: {$evaluation.time}</td>
                <td width="5%">
                    <button type="button" class="btn btn-info btn-xs editInfo" id="editTime"><span class="glyphicon glyphicon-edit"></span></button>
                </td>
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