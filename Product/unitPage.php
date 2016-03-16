<?php
include_once("templates/header.html");
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">

      <h2 class="page-header">Laboratório de Base de Dados e Aplicações Web</h2>

    </div>
  </div>

  <div class="row">

    <div class="col-md-5 col-md-offset-1 ">
      <div class="text-center">
        <h2>Information</h2>
      </div>
      <table class="table table-responsive ucInfo">
          <tr>
            <td>Sigla: LBAW</td>
          </tr>
          <tr>
            <td>Regent: <a href="#">João Correia</a></td>
          </tr>
          <tr>
            <td>Página: <a href="http://web.fe.up.pt/~jlopes/doku.php/teach/lbaw/index">http://web.fe.up.pt/~jlopes/doku.php/teach/lbaw/index</a> </td>
          </tr>
          <tr>
            <td>Área: Desenvolvimento Web e Sistemas de Informação</td>
          </tr>
          <tr>
            <td>Lorem: Ipsum</td>
          </tr>
       </table>
    </div>
    <div class="text-center">
      <div class="col-md-5">
        <h2>Teaching</h2>
      </div>
      <!-- teachers table-->
      <table  class="ucInfo" cellpadding="10">
        <tr>
          <th>Type</th>
          <th>Teacher</th>
          <th>Classes</th>
          <th>Hour</th>
        </tr>
        <tr class="d">
          <td rowspan="3" class="k t"><h4> Lectures </h4></td>
          <td class="k t">Totals</td>
          <td class="k n">1</td>
          <td class="k n">   2,00</td>
          <tr class="d">
          <td class="t"><a href="func_geral.formview?p_codigo=230756">João António Correia Lopes</a></td>
          <td class="t"></td>
          <td class="n">   1,00</td>
        </tr>
        <tr class="d">
          <td class="t"><a href="func_geral.formview?p_codigo=310021">Sérgio Sobral Nunes</a></td>
          <td class="t"></td>
          <td class="n">   1,00</td>
        </tr>

        <tr class="d">
          <td rowspan="4" class="k t"><h4> Laboratory Practice </h4></td>
          <td class="k t">Totals</td>
          <td class="k n">6</td>
          <td class="k n">  18,00</td>
        </tr>
        <tr class="d">
          <td class="t"><a href="func_geral.formview?p_codigo=230756">João António Correia Lopes</a></td>
          <td class="t"></td>
          <td class="n">   6,00</td>
        </tr>
        <tr class="d">
          <td class="t"><a href="func_geral.formview?p_codigo=310021">Sérgio Sobral Nunes</a></td>
          <td class="t"></td>
          <td class="n">   6,00</td>
        </tr>
        <tr class="d">
            <td class="t"><a href="func_geral.formview?p_codigo=479881">Tiago Boldt Pereira de Sousa</a></td>
            <td class="t"></td>
            <td class="n">   6,00</td>
        </tr>
      </table>
      <!-- teachers table end-->
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
              <h4 class="panel-title">Heading</h4>
              <div class="panel-group" id="accordion21">
                <div class="panel">
                  <a data-toggle="collapse" data-parent="#accordion21" href="#collapseTwoOne">View details 2.1 »</a>
                  <div id="collapseTwoOne" class="panel-collapse collapse">
                    <div class="panel-body">Details 1</div>
                  </div>
                </div>
                <div class="panel ">
                  <a data-toggle="collapse" data-parent="#accordion21" href="#collapseTwoTwo">View details 2.2 »</a>
                  <div id="collapseTwoTwo" class="panel-collapse collapse">
                    <div class="panel-body">Details 2</div>
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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>