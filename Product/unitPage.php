<?php

include_once("templates/header.html");
?>

<div id="unitPage" class="container">
  <div class="row">
    <div class="col-sm-10">
     <h1 class="page-header visible-sm visible-xs">LBAW</h1>
      <h1 class="page-header hidden-sm hidden-xs">Laboratório de Base de Dados e Aplicações Web </h1>
     
    </div>
    <div class="col-sm-2">
      <div class="dropdown ">
        <button class="btn btn-primary dropdown-toggle " id="actionsButton" type="button" data-toggle="dropdown">Actions
        <span class="caret"></span></button>
        <ul class="dropdown-menu ">
          <li><a href="#">Classes</a></li>
          <li><a href="#">Attendance</a></li>
          <li><a href="#">Content</a></li>
          <li><a href="#">Evaluations</a></li>
          <li><a href="#">Create Evaluation</a></li>         
        </ul>
      </div>
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
            <td>Initials: LBAW</td>
          </tr>
          <tr>
            <td>Regent: <a href="#">João Correia</a></td>
          </tr>
          <tr>
            <td>Page: <a href="http://web.fe.up.pt/~jlopes/doku.php/teach/lbaw/index">http://web.fe.up.pt/~jlopes/doku.php/teach/lbaw/index</a> </td>
          </tr>
          <tr>
            <td>Area: Desenvolvimento Web e Sistemas de Informação</td>
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
          <td class="t"><a href="#">João António Correia Lopes</a></td>
          <td class="t"></td>
          <td class="n">   1,00</td>
        </tr>
        <tr class="d">
          <td class="t"><a href="#">Sérgio Sobral Nunes</a></td>
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
          <td class="t"><a href="#">João António Correia Lopes</a></td>
          <td class="t"></td>
          <td class="n">   6,00</td>
        </tr>
        <tr class="d">
          <td class="t"><a href="#">Sérgio Sobral Nunes</a></td>
          <td class="t"></td>
          <td class="n">   6,00</td>
        </tr>
        <tr class="d">
            <td class="t"><a href="#">Tiago Boldt Pereira de Sousa</a></td>
            <td class="t"></td>
            <td class="n">   6,00</td>
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
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          
        </div>
      </div>

    
      <div class="row tab-pane fade" id="stuff2">
        <div class="col-lg-12">
          <h2>Pre-Requirements and Co-Requirements</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff3">
        <div class="col-lg-12">
         <h2>Curricular Programme</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          
        </div>
      </div>

      <div class="row tab-pane fade" id="stuff4">
        <div class="col-lg-12">
          <h2>Evaluation</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend tincidunt nunc. Proin porttitor blandit mattis. Suspendisse elementum tempor venenatis. Vivamus eget nibh libero. Nam eget ligula mi. Duis eu lacus at ipsum iaculis laoreet. Ut venenatis turpis eget lacinia fringilla. Duis sollicitudin, sem ut suscipit congue, sapien arcu venenatis dolor, vitae aliquam metus lectus nec quam.</p>
          
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
<?php
  include_once("templates/footer.html");
?>