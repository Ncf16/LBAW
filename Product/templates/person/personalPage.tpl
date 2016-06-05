{include file='common/header.tpl'}

<div id="personalPage">
   <link href="{$BASE_URL}css/personalPage.css" rel="stylesheet">
   <!-- Page Content -->
   <div class="container">
      <!-- Portfolio Item Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Personal Page
               <small>{$person.name}  ({$person.persontype})</small>
                <a href="{$BASE_URL}pages/Person/editPerson.php?personUsr={$person.username}" class="btn btn-xs btn-primary">Edit Page</a> 
                  {if $person.persontype == 'Student' and $viewerType == 'Admin'}
                <a  data-toggle="modal" href="#studentCourseEdit" class="btn btn-xs btn-primary">Change Student Course</a>
                {/if}
            </h1>
         </div>
      </div>
      <!-- /.row -->
      <!-- Portfolio Item Row -->
      <div class="row">
         <div class="col-md-3">
            <img class="img-responsive" src="{$BASE_URL}images/Students/avatar.png" alt="studentImg"> <!--  src="http://placehold.it/750x500"-->
         </div>
         <div class="col-md-2">
            {if $person.persontype == 'Student'}
            <a href="{$BASE_URL}pages/Course/coursePage.php?course={$currentCourse.code}"> <h3>Course: {$student.coursename} </h3></a>
            <ul>
               <li>Current Year: {$student.currentyear}</li>
               <li>Starting Year: {$student.startyear}</li>
            </ul>
            {/if}
         </div>
         <div class="col-md-3">
            <h3>Personal Details</h3>
            <ul>
               <li>Mobile Phone: {$person.phonenumber}</li>
               <li>Current Status:
                   {if isset($person.finishyear) and $person.coursegrade > 10}
                   Course completed
                  {elseif isset($person.finishyear)}
                  Not valid
                  {else}
                  Valid
                   {/if}
                </li>
            </ul>
         </div>
         <div class="col-md-4" >
            <div class="panel-group" id="accordion">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#info">Sociodemographic Data</a>
                     </h4>
                  </div>
                  <div id="info" class="panel-collapse collapse">
                     <div class="panel-body">
                        <p>
                           Birth Date: {$person.birthdate}
                           <br>
                           Address: {$person.address}
                           <br>
                           NIF: {$person.nif}
                           <br>
                           Nationality: {$person.nationality}
                        </p>
                     </div>
                  </div>
               </div>
            </div >
         </div>
      </div>
      <!-- /.row                <h3>Sociodemographic data </h3>	 -->
         
         {if $person.username == $USERNAME}

            {if $person.persontype == 'Student'}
         <!-- Related Projects Row -->
         <div class="row"  id="personalPageBtnContainer">
            <div class="col-lg-12">
               <h3 class="page-header">Personal Links</h3>
            </div>
            <div class="col-sm-3 col-xs-5" >
               <a href="#" class="btn btn-primary btn-primary" >Main Page </a>
            </div>
            <div class="col-sm-3 col-xs-5">
               <a href="#" class="btn btn-primary btn-primary">Curricular Units</a>
            </div>
            <div class="col-sm-3 col-xs-5">
               <a href="#" class="btn btn-primary btn-primary"> Submitted Requests</a>
            </div>
            <div class="col-sm-3 col-xs-5">
               <a href="#" class="btn btn-primary btn-primary">Currical Units Taken</a>
            </div>
            <!--   -->
             </div>
            {/if}

            {if $person.persontype == 'Admin'}
            <div class="row"  id="personalPageBtnContainer">
               <div class="col-sm-12 col-xs-5 text-center" >
                  <a href= "{$BASE_URL}pages/Admin/admin.php" class="btn btn-primary btn-primary" > Admin Page </a>
               </div>
             </div>
             {/if}

         {/if}
         <!-- /.row -->
            {if $person.persontype == 'Student' and $seeUnits == true}
          <div class="row" id="studentsGrades">
            <h2>Curricular Units</h2>
              <input hidden value="{$student.academiccode}" id="studentID"/>
         <input hidden value="{$courseCode}" id="courseID"/>
          
         <div id="cu_response">
         </div>
         </div>
            {/if}
   </div>
</div>
<div id="studentCourseEdit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Change Course </h4>
            </div>
            <div class="modal-body">
                <p> Current Course: {$currentCourse.name} </p>
                <input hidden id="currentCourseCode" value="{$currentCourse.code}" />
                 <input hidden value="{$student.academiccode}" id="studentAcademicCode"/>
               <select name="chaneCourse" id="chaneCourse" class="form-control" required>
                     <option value="" disabled selected>Select Course</option>
                     {foreach from=$courses item=course}
                     {if $currentCourse.code eq $course.code }
                     <option value={$course.code} disabled>{$course.name}:{$course.abbreviation}</option>
                     {else}
                     <option value={$course.code}>{$course.name}:{$course.abbreviation}</option>
                     {/if}
                     {/foreach} 
                  </select>
                  <p id="modalErrors">
                  </p>
            </div>
            <div class="modal-footer">
                <button type="button" id="submitNewCourseStudent" class="btn btn-default" data-dismiss="modal">Change Course</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{include file='common/footer.tpl'}

<!-- Modal -->

 