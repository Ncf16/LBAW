{include file='common/header.tpl'}

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">
        Evaluations
      <small>{if $unit}{$unit.name} : {$unit.year}
        {elseif $student}{$student.name} {/if}</small>
      </h2>
    </div>
  </div>

<div class="row">
   
    {foreach $evaluations as $evaluation}
  <div class="col-md-3 col-sm-6">
      <div class="panel panel-default text-center">
          <div class="panel-heading">
              <span class="fa-stack fa-5x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa
                    {if $evaluation.evaluationtype eq 'GroupWork'}fa-suitcase
                    {elseif $evaluation.evaluationtype eq 'Test'}fa-pencil
                    {elseif $evaluation.evaluationtype eq 'Exam'}fa-book
                    {else}fa-minus
                    {/if}
                    fa-stack-1x fa-inverse"></i>
              </span>
              <br>
              <h4>{$evaluation.evaluationtype}</h4>
          </div>
          <div class="panel-body">
             {if $student}
              <p><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Curricular Unit: <a href="{$BASE_URL}pages/CurricularUnit/viewUnitOccurrence.php?uc={$evaluation.cuoccurrenceid}">{$evaluation.name}</a></p>
              {/if}
              <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date: {$evaluation.evaluationdate}</p>
              <p><span class="glyphicon glyphicon-sort" aria-hidden="true"></span> Final Grade Weight: {$evaluation.weight}</p>
              <a href="{$BASE_URL}pages/Evaluation/viewEvaluation.php?evaluationID={$evaluation.evaluationid}" class="btn btn-primary">More Info</a>
          </div>
      </div>
  </div>
  {/foreach}
</div>
</div>
{include file='common/footer.tpl'}