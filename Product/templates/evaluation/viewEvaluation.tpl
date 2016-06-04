
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
      <div>
        <h2>Information</h2>
      </div>
        <br>
      <table class="table table-responsive classInfo">
            <tr>
                <td class="border">
                    Curricular Unit: <a href="{$BASE_URL}pages/CurricularUnit/viewUnitOccurrence.php?uc={$evaluation.cuoccurrenceid}">{$evaluation.name}</a>
                </td>
                <td>School Year: {$evaluation.calendaryear}</td>
            </tr>
            <tr>
                <td class="border">Date: {$evaluation.day}</td>
                <td>Time: {$evaluation.time}</td>
            </tr>
            <tr>
                <td class="border">Evaluation Type: {$evaluation.evaluationtype}</td>
                <td>Weight: {$evaluation.weight}</td>
            </tr>
            <tr>
                {if $evaluation.evaluationtype eq 'GroupWork'}
                <td class="border">Minimum Elements: {$evaluation.minelements}</td>
                <td>Maximum Elements: {$evaluation.maxelements}</td>
                {elseif $evaluation.evaluationtype eq 'Exam' || $evaluation.evaluationtype eq 'Test'}
                <td colspan="2">Duration: {$evaluation.duration}</td>
                {/if}
            </tr>
       </table>
    </div>
</div>
  <p>
  <hr>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Grades</h3>
      <br>
      <table id="gradesTable" class="table table-bordred table-striped">
         <thead>
            <th class="col-md-2" colspan="2">Grade</th>
            <th class="col-md-9">Student Name</th>
            <th class="col-md-1">Delete</th>
         </thead>
         <tbody id="grades">
         </tbody>
      </table>

      <div class="clearfix"></div>
      <ul class="pagination pull-right">
      </ul>
   </div>
 </div>
  </p>
</div>

<script src="{$BASE_URL}js/viewEvaluation.js"></script>
{include file='common/footer.tpl'}