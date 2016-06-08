<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 14:00:05
         compiled from "C:\xampp\htdocs\LBAW\final\templates\request\requestListStudent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14036575808c5040e28-98861422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f17f55c99cf26aae9336700f8672ec100aae4420' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\request\\requestListStudent.tpl',
      1 => 1465386851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14036575808c5040e28-98861422',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575808c5050832_67121992',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575808c5050832_67121992')) {function content_575808c5050832_67121992($_smarty_tpl) {?><p>
<hr>
<ul class="nav nav-pills navPills">
    <li id="openRequests" class="active"><a href="#open" data-toggle="tab">Open Requests</a></li>
    <li id="closedRequests"><a href="#closed" data-toggle="tab">Closed Requests</a></li>

    <a id="createRequestBtn" class="pull-right btn" data-toggle="modal" data-target="#requestCreationModal"> Create Request</a>
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
                    <th>Last Update</th>
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
                    <th>Last Update</th>
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
<?php }} ?>
