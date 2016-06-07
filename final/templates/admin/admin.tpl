{include file='common/header.tpl'}

<div id="adminPersonalPage">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="{$BASE_URL}js/graphs.js"></script>

<link href="{$BASE_URL}css/personalPage.css" rel="stylesheet">
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
         <div class="col-sm-2 col-xs-4 text-center">
               <a href="{$BASE_URL}pages/Admin/addPerson.php" class="btn btn-primary btn-primary" >Create Accounts</a>
         </div>
      
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="{$BASE_URL}pages/Course/course.php" class="btn btn-primary btn-primary">Create Course</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="{$BASE_URL}pages/CurricularUnit/units.php" class="btn btn-primary btn-primary">Manage Curricular Units</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="{$BASE_URL}pages/Admin/rooms.php" class="btn btn-primary btn-primary">Manage Rooms</a>
         </div>
         <div class="col-sm-2 col-xs-4 text-center">
            <a href="{$BASE_URL}pages/Admin/areas.php" class="btn btn-primary btn-primary">Manage Areas</a>
         </div>
         <!--   -->
          </div>
      </div>
      <!-- /.row -->
      <hr>
   </div>
</div>

{include file='common/footer.tpl'}
