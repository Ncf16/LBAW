{include file='common/header.tpl'}

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">{$course.name} ({$course.abbreviation})</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <h2>Description</h2>
      <p>{$course.description}</p>
    </div>
    <div class="col-md-4">
      <h2>Details</h2>
      <p>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
        <a href='{$BASE_URL}pages/Person/personalPage.php?person={$course.directorusername}'>Director: {$course.director}</a>
      </p>
      <p>
        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Creation Date: {$course.creationdate}
      </p>
      <p>
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Duration: 
        {if $course.coursetype eq 'Masters'}
          5 
        {elseif $course.coursetype eq 'Bachelor'}
          3 
        {elseif $course.coursetype  eq 'PhD'}
          5
        {/if}
        years
      </p>
      <p>
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>Academic Degree: {$course.coursetype}
      </p>
       <p>
        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Number of Students: {$course.studentcount}
      </p>

    </div>
  </div>

  <p>
    <div class="row">
      <div class="col-lg-12">
        <h2>Syllabus</h2>
      </div>
    </div>
  </p>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year1">1 Year</a>
            </h4>
          </div>
          <div id="year1" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#semester11">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester11" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#semester12">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester12" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year2">2 Year</a>
            </h4>
          </div>
          <div id="year2" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion2">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion2" href="#semester21">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester21" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion2" href="#semester22">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester22" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year3">3 Year</a>
            </h4>
          </div>
          <div id="year3" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion3">
                 <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion3" href="#semester31">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester31" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion3" href="#semester32">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester32" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year4">4 Year</a>
            </h4>
          </div>
          <div id="year4" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion4">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion4" href="#semester41">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester41" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion4" href="#semester42">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester42" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year5">5 Year</a>
            </h4>
          </div>
          <div id="year5" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion5">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion5" href="#semester51">1 Semester</a>
                        </h4>
                      </div>
                      <div id="semester51" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                             <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Análise Matemática</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Arquitectura e Organização de Computadores</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Fundamentos da Programação</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion5" href="#semester52">2 Semester</a>
                        </h4>
                      </div>
                      <div id="semester52" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Álgebra</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <a href="unitPage.php">Projeto FEUP</a>
                              </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{include file='common/footer.tpl'}
