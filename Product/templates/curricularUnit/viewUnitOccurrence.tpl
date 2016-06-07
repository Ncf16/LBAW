
{include file='common/header.tpl'}
<div id="unitPage" class="container">
  <div class="row">
    <div class="col-sm-10">
      <h1 class="page-header hidden-sm hidden-xs">{$unit.name}</h1>
     
    </div>
    {if $hasPermission == true}
    <div class="col-sm-2">
      <div class="dropdown">
      <input hidden value="{$unit.cuoccurrenceid}" id="CUO_ID"/>
        <button class="btn btn-primary dropdown-toggle" id="actionsButton" type="button" data-toggle="dropdown">Actions
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="{$BASE_URL}pages/Class/classes.php?uc={$unit.cuoccurrenceid}">Classes</a></li>
          <li><a href="{$BASE_URL}pages/CurricularUnit/viewUnitContent?uc={$unit.cuoccurrenceid}">Content</a></li>
          <li><a href="{$BASE_URL}pages/Evaluation/evaluations.php?unit={$unit.cuoccurrenceid}">Evaluations</a></li>
          <li><a href="{$BASE_URL}pages/Evaluation/evaluation.php?CUO={$unit.cuoccurrenceid}">Create Evaluation</a></li>  
          <li> <a href="#" id="gradeStudents">Grade Students</a></li>         
        </ul>
      </div>
    </div>
    {/if}
  </div>

      <hr>
  <div class="row">

    <div class="col-md-5 col-md-offset-1 ">
      <div class="text-center">
        <h2>General Information</h2>
      </div>
      <table class="table table-responsive ucInfo">
          <tr>
            <td>Course: <a href="{$BASE_URL}pages/Course/coursePage.php?course={$unit.courseid}">{$unit.course}</a></td>
          </tr>
          <tr>
            <td>School Year: {$unit.year}</td>
          </tr>
          <tr>
            <td>Area: {$unit.area}</td>
          </tr>
           <tr>
            <td>Credits: {$unit.credits}</td>
          </tr>
          <tr>
            <td>Course Year: {$unit.curricularyear}</td>
          </tr>
          <tr>
            <td>Course Semester: {$unit.curricularsemester}</td>
          </tr>
       </table>
    </div>
    <div class="col-md-5">
      <div class="text-center">
        <h2>Teaching Information</h2>
      </div>
      <!-- teachers table-->
      <table class="table table-responsive ucInfo">
        <tr>
          <td>Regent: <a href="{$BASE_URL}pages/Person/personalPage.php?person={$unit.regent}">{$unit.regentname}</a></td>
        </tr>
        <tr>
          <td>Language: {$unit.language}</td>
        </tr>
        <tr>
          <td>Page: <a href="#">{$unit.externalpage}</a> </td>
        </tr>
      </table>
      <!-- teachers table end-->
    </div>
  </div>

  <br>
  <p>
  <hr>
    <ul class="nav nav-pills ucNavPills">
      <li class="active"><a href="#competences" data-toggle="tab">Learning Competences</a></li>
      <li><a href="#stuff2" data-toggle="tab">Requirements</a></li>
      <li><a href="#stuff3" data-toggle="tab">Curricular Programme</a></li>
      <li><a href="#stuff4" data-toggle="tab">Evaluation</a></li>
      <li><a href="#stuff5" data-toggle="tab">Bibliography</a></li>
    </ul>

    <div class="tab-content">
      <div class="row tab-pane fade in active" id="competences">
        <div class="col-lg-12 ">
          <h2>Learning Objectives and Competences</h2>
          <p>{$unit.competences}</p>
          
        </div>
      </div>

    
      <div class="row tab-pane fade" id="stuff2">
        <div class="col-lg-12">
          <h2>Pre-Requirements and Co-Requirements</h2>
          <p>{$unit.requirements}</p>
          
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff3">
        <div class="col-lg-12">
         <h2>Curricular Programme</h2>
          <p>{$unit.programme}</p>
          
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff4">
        <div class="col-lg-12">
          <h2>Evaluation</h2>
          <p>{$unit.evaluation}</p>
          
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff5">
        <div class="col-lg-12">
          <h2>Bibliography</h2>
          <p>{$unit.bibliography}</p>
          <hr>
        </div>
      </div>
    </div>
  </p>
</div>
{include file='common/footer.tpl'}