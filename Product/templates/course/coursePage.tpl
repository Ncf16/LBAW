{include file='common/header.tpl'}

<div class="container ">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">{$course.name} ({$course.abbreviation})
                <a href="{$BASE_URL}pages/Course/course.php?courseID={$course.code}" class="btn btn-xs btn-primary">Edit
                    Page</a>
                {if $canAddCU==true }
                <a href="{$BASE_URL}pages/Course/addCU.php?courseID={$course.code}" class="btn btn-xs btn-primary">Add
                    CU</a>
                {/if}
            </h2>
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
                <a href='{$BASE_URL}pages/Person/personalPage.php?person={$course.directorusername}'>Director:
                    {$course.director}</a>
            </p>
            <p>
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Creation Date:
                {$course.creationdate}
            </p>
            <p>
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Duration:
                {$course.courseYears}
                years
            </p>
            <p>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>Academic Degree: {$course.coursetype}
            </p>
            <p>
                <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Number of Students:
                {$course.studentcount}
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
        <div class="col-xs-2">
            <div class="form-group">
                <input type="hidden" id="course_code" value="{$course.code}">
                <label>Year:</label>
                <select class="form-control" id="syllabus_year">
                    {for $i = 0 to $syllabusYears.nrYears - 1}
                    <option>{$syllabusYears.$i.year}</option>
                    {/for}
                </select>
            </div>
        </div>
    </div>

    <div id="course_syllabus">
    </div>

</div>
{include file='common/footer.tpl'}
