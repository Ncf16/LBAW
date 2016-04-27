<?php
include_once('../../config/init.php');
include_once($BASE_DIR . "templates/common/header.html"); 
?>
<div id="adminPersonalPage">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="js/graphs.js"></script>

<link href="css/personalPage.css" rel="stylesheet">
<!-- Page Content -->
<div   class="container">
   <!-- Portfolio Item Heading -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Admin Page</h1>
      </div>
   </div>
   <!-- /.row -->
   <!-- Portfolio Item Row -->
   <div class="row">
           <div class="col-md-6 text-center" >
<div id="coursesContainer" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
   </div>
           <div class="col-md-6 text-center" >
<div id="containerTypeOfUser" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
</div>
      <!-- /.row                -->
      <!-- Related Projects Row -->
      <div class="row"  id="personalPageBtnContainer">
     
         <div class="col-lg-12 text-center">
            <h3 class="page-header">Admin Links</h3>
         </div>
         <div class="col-sm-2 col-xs-4 text-center" >
            <a href="#" class="btn btn-primary btn-primary" >Main Page </a>
         </div>

      <div class="col-sm-2 col-xs-4 text-center">
               <a href="#" class="btn btn-primary btn-primary" >Create Accounts</a>
         </div>
   
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="#" class="btn btn-primary btn-primary">Remove Accounts 	</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="#" class="btn btn-primary btn-primary">Create Course</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center ">
            <a href="#" class="btn btn-primary btn-primary">Create Curricular Unit</a>
         </div>
         <!--   -->
          </div>
      </div>
      <!-- /.row -->
      <hr>
   </div>
</div>


<?php
include_once($BASE_DIR . "templates/common/footer.html"); 
?>
