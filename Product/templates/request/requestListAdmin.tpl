<p>
<hr>
<ul class="nav nav-pills navPills">
    <li id="openRequests" class="active"><a href="#open" data-toggle="tab">Open Requests</a></li>
    <li id="answeredRequests"><a href="#answered" data-toggle="tab">My Answered requests</a></li>
    <li id="closedRequests"><a href="#closed" data-toggle="tab">Closed Requests</a></li>

</ul>


<div class="tab-content">
    <div class="row tab-pane fade in active" id="open">
        <div class="col-lg-12 ">
            <h2>Open Requests</h2>

            <!-- TABLE -->
            <table class="table table-striped">
                <thead>
                <tr class="head">
                    <th>Request ID</th>
                    <th>Submitted by</th>
                    <th>Answered by</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody class="requestListBody" id="request_list">

                </tbody>
            </table>
            <!-- END TABLE -->

            <div class="clearfix"></div>
            <ul class="pagination pull-right">

            </ul>

        </div>
    </div>


    <div class="row tab-pane fade" id="answered">
        <div class="col-lg-12">
            <h2>My Answered Requests</h2>

            <!-- TABLE -->
            <table class="table table-striped">
                <thead>
                <tr class="head">
                    <th>Request ID</th>
                    <th>Submitted by</th>
                    <th>Answered by</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody class="requestListBody" id="request_list">

                </tbody>
            </table>
            <!-- END TABLE -->

            <div class="clearfix"></div>
            <ul class="pagination pull-right">

            </ul>

        </div>
    </div>

    <div class="row tab-pane fade" id="closed">
        <div class="col-lg-12">
            <h2>Closed Requests</h2>

            <!-- TABLE -->
            <table class="table table-striped">
                <thead>
                <tr class="head">
                    <th>Request ID</th>
                    <th>Submitted by</th>
                    <th>Answered by</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody class="requestListBody" id="request_list">

                </tbody>
            </table>
            <!-- END TABLE -->

            <div class="clearfix"></div>
            <ul class="pagination pull-right">

            </ul>

        </div>
    </div>


</div>
</p>
