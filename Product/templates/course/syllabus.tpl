<div class="row">
    <div class="col-lg-12">
      <div class="panel-group" id="accordion">

		<!-- YEAR DIVISION -->
		{for $i = 1 to $syllabus.courseYears}

        <div class="panel panel-default">

          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#year{$i}">Year {$i}</a>
            </h4>
          </div>

          <div id="year{$i}" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group" id="accordion1">
                <div class="row">

                <!-- 1st SEMESTER -->
                 <div class="col-md-6">
                    <div class="panel panel-default">

                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#semester{$i}1">1st Semester</a>
                        </h4>
                      </div>

                      <!-- CURRICULAT UNITS -->
                      <div id="semester{$i}1" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-striped uc-table">
                          	{for $j = 0 to  $syllabus.$i.1|@count -1} 
                            <tr>
                              <td class="text-center">
                                <a href="{$BASE_URL}pages/CurricularUnit/viewUnitOccurrence.php?uc={$syllabus.$i.1.$j.cuoccurrenceid}"> 
                                <!-- syllabus[year][semester][CU][name] -->
                                	{$syllabus.$i.1.$j.name} 
                                </a>
                              </td>
                            </tr>
                            {/for}                            
                           </table>
                        </div>
                      </div>
                      <!-- END OF CURRICULAR UNITS -->

                    </div>
                </div>
                <!-- END OF 1st SEMESTER -->

                <!-- 2nd SEMESTER -->
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#semester{$i}2">2nd Semester</a>
                        </h4>
                      </div>

                      <!-- CURRICULAR UNITS -->
                      <div id="semester{$i}2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table table-striped uc-table">
                            {for $k = 0  to  $syllabus.$i.2|@count -1}
                            <tr>
                              <td class="text-center">
                                <a href="{$BASE_URL}pages/CurricularUnit/viewUnitOccurrence.php?uc={$syllabus.$i.2.$k.cuoccurrenceid}">			<!-- syllabus[year][semester][CU][name] -->
                                	{$syllabus.$i.2.$k.name}
                                </a>
                              </td>
                            </tr>
                            {/for}
                           </table>
                        </div>
                      </div>
                      <!-- END OF CURRICULAR UNITS -->

                    </div>
                </div>
                <!-- END OF 2nd SEMESTER -->

                </div>
              </div>
            </div>
          </div>
        </div>
        {/for}
        <!-- END OF YEAR -->

      </div>
    </div>
  </div>