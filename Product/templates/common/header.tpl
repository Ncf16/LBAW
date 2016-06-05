<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{$BASE_URL}css/modern-business.css" rel="stylesheet">
    <link href="{$BASE_URL}css/unitPage.css" rel="stylesheet">
    <link href="{$BASE_URL}css/custom_style.css" rel="stylesheet">
    <Title>AcademicManagement Page</Title>
    <!-- Custom Fonts -->
    <link href="{$BASE_URL}font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header navbar-right">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#CollapsibleMenu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {if !isset($smarty.session.username)}

            <a href="{$BASE_URL}pages/Person/login.php" id="login_btn" class="btn navbar-btn">Login </a>

            {else}
            <ul class="nav navbar-nav navbar-left" style="max-width:160px;">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$USERNAME} ({$ACCOUNT_TYPE}) <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{$BASE_URL}pages/Person/personalPage.php?person={$USERNAME}">Profile</a>
                        </li>
                        {if $ACCOUNT_TYPE == 'Admin'}
                        <li>
                            <a href="{$BASE_URL}pages/Admin/admin.php">Admin Area</a>
                        </li>
                        {/if}
                        {if $ACCOUNT_TYPE != 'Teacher'}
                        <li>
                            <a href="{$BASE_URL}pages/Request/requestList.php">Requests</a>
                        </li>
                        {/if}
                        <li>
                            <a href="{$BASE_URL}actions/users/logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            {/if}
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="CollapsibleMenu">
            <ul class="nav navbar-nav navbar-left">

                <li class="nav-brand">
                    <a href="{$BASE_URL}index.php">Home</a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Explore <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{$BASE_URL}pages/Course/courseList.php">Courses</a>
                        </li>
                        <li>
                            <a href="{$BASE_URL}pages/Person/personList.php">People</a>
                        </li>
                    </ul>
                </li>

                <!-- this should show for students and regent of a course -->
                {if $ACCOUNT_TYPE == 'Student'}
                <li class="nav-brand">
                    <a href="{$BASE_URL}pages/Course/coursePage.php?course={$STUDENT_COURSE}">My Course</a>
                </li>
                {/if}

                {if $ACCOUNT_TYPE == 'Student'}
                <li class="nav-brand">
                    <a href="{$BASE_URL}pages/CurricularUnit/unitEvaluations.php">Evaluations</a>
                </li>
                {elseif $ACCOUNT_TYPE == 'Teacher'}
                <li class="nav-brand">
                    <a href="{$BASE_URL}pages/CurricularUnit/unitPage.php">My Curricular Units</a>
                </li>
                <li class="nav-brand">
                    <a href="{$BASE_URL}pages/CurricularUnit/unitEvaluations.php">Evaluations</a>
                </li>
                {/if}

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- jQuery -->
<script src="{$BASE_URL}js/jquery.js"></script>
<!-- Other Scripts -->
<script src="{$BASE_URL}js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{$BASE_URL}js/bootstrap.min.js"></script>
