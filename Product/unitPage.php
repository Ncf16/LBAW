<?php
include_once("templates/header.html");
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">

      <h1 class="page-header">Laboratório de Base de Dados e Aplicações Web</h1>

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
            <td>Language: Português</td>
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

  <br>
  <p>

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
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          <hr>
        </div>
      </div>

    
      <div class="row tab-pane fade" id="stuff2">
        <div class="col-lg-12">
          <h2>Pre-Requirements and Co-Requirements</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          <hr>
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff3">
        <div class="col-lg-12">
         <h2>Curricular Programme</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          <hr>
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff4">
        <div class="col-lg-12">
          <h2>Evaluation</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          <hr>
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff5">
        <div class="col-lg-12">
          <h2>Bibliography</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          <hr>
        </div>
      </div>
    </div>
  </p>
</div>