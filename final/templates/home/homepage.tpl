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
        {if $ACCOUNT_TYPE eq 'Student'}
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Upcoming Evaluations
                </h1>
            </div>

            {foreach $evaluations as $evaluation}
            <div class="col-md-4">
                <div class="panel panel-default">
                	<a href="{$BASE_URL}/pages/CurricularUnit/viewUnitOccurrence.php?uc={$evaluation.cuoccurrenceid}">
                    	<div class="panel-heading text-center btn-header">
                        	<h3> <b>{$evaluation.name}</b></h3>
                    	</div>
                	</a>
                    <div class="panel-body">
                        	<h4>Type: {$evaluation.evaluationtype} </h4>
                        
                        	<h4>Date: {$evaluation.evaluationdate}</h4>
                    </div>
                </div>
            </div>
            {/foreach}
        </div>
        {/if}
        <!-- /.row -->
    </div>
    <!-- /.container -->

{include file='common/footer.tpl'}