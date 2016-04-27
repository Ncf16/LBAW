{include file='common/header.tpl'}

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/slide_one.jpg');"></div>
                <div class="carousel-caption">
                    <h2>A home for students, with everything to offer</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/slide_two.jpg');"></div>
                <div class="carousel-caption">
                    <h2>A place to move forward, surrounded by bright minds</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/slide_three.jpg');"></div>
                <div class="carousel-caption">
                    <h2>A calm environment where you can work in peace</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

     <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

    <!-- Page Content -->
    <div class="container">

        <!-- Evaluation Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Upcoming Evaluations
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                	<a href="unitPage.php"  >
                    	<div class="panel-heading text-center btn-header">
                        	<h3> <b>LBAW</b></h3>
                    	</div>
                	</a>
                    <div class="panel-body">
                        <p>
                        	<h4> Name: Assignment 3 </h4>
                        	<hr>
                        	<h4> Date: 17/03/2016 </h4>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default ">
                    <a href="unitPage.php"  >
                    	<div class="panel-heading text-center btn-header">
                        	<h3> <b>LBAW</b></h3>
                    	</div>
                	</a>
                    <div class="panel-body">
                        <p>
                        	<h4> Name: Assignment 4 </h4>
                        	<hr>
                        	<h4> Date: 17/03/2016 </h4>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <a href="unitPage.php"  >
                    	<div class="panel-heading text-center btn-header">
                        	<h3> <b>PPIN</b></h3>
                    	</div>
                	</a>
                    <div class="panel-body">
                        <p>
                        	<h4> Name: Test 1 </h4>
                        	<hr>
                        	<h4> Date: 29/03/2016 </h4>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

{include file='common/footer.tpl'}