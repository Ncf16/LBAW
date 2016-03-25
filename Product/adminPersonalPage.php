<?php
include_once("templates/header.html"); 
?>
<div id="adminPersonalPage">
<link href="css/personalPage.css" rel="stylesheet">
<!-- Page Content -->
<div   class="container">
   <!-- Portfolio Item Heading -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Personal Page
            <small>Admin's Name</small>
             <a href="#" class="btn btn-xs btn-primary">Edit Page</a> 
         </h1>
      </div>
   </div>
   <!-- /.row -->
   <!-- Portfolio Item Row -->
   <div class="row">
      <div class="col-md-3">
         <img class="img-responsive" src="images/Students/avatar.png" alt="studentImg"> <!--  src="http://placehold.it/750x500"-->
      </div>
     
      <div class="col-md-3">
         <h3>Personal Details</h3>
         <ul>
            <li>Starting Year: 2013</li>
            <li>Mobile Phone: 9XXXXXXXX</li>
         </ul>
      </div>
      <div class="col-md-4" >
         <div class="panel-group" id="accordion">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#year1">Sociodemographic Data</a>
                  </h4>
               </div>
               <div id="year1" class="panel-collapse collapse">
                  <div class="panel-body">
                     <p>
                        Birth Date: 10/01/1993
                        <br>
                        Address: Rua Dr. Roberto Frias, 4200-465 PORTO
                        <br>
                        NIF: 609620558
                        <br>
                        Marital status: Single
                        <br>
                        Nationality: Porugal
                     </p>
                  </div>
               </div>
            </div>
         </div >
      </div>
      <!-- /.row                <h3>Sociodemographic data </h3>	 -->
      <!-- Related Projects Row -->
      <div class="row"  id="personalPageBtnContainer">
     
         <div class="col-lg-12 text-center">
            <h3 class="page-header">Admin Links</h3>
         </div>
         <div class="col-sm-12 col-xs-5 text-center" >
            <a href="#" class="btn btn-primary btn-primary" > Admin Page </a>
         </div>

         <!--   -->
          </div>
      </div>
      <!-- /.row -->
      <hr>
   </div>
</div>


<?php
include_once("templates/footer.html"); 
?>
