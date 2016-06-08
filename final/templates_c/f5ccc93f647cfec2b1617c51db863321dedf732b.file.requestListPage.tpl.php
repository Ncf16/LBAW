<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 14:00:04
         compiled from "C:\xampp\htdocs\LBAW\final\templates\request\requestListPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25639575808c4eb4176-94307237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5ccc93f647cfec2b1617c51db863321dedf732b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\request\\requestListPage.tpl',
      1 => 1465386851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25639575808c4eb4176-94307237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'account' => 0,
    'userID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575808c5029725_28641110',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575808c5029725_28641110')) {function content_575808c5029725_28641110($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/requests.css" rel="stylesheet">
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/pagination.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/requestListCommon.js"></script>

<?php if ($_smarty_tpl->tpl_vars['account']->value=='Admin') {?>
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/requestListAdmin.js"></script>
<?php } else { ?>
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/requestListStudent.js"></script>
<?php }?>

<input type="hidden" name="userID" value=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
>

<!-- CONTAINER -->
<div class="container">

    <h2 class="page-header">Requests</h2>
    <?php if ($_smarty_tpl->tpl_vars['account']->value=='Admin') {?>
        <?php echo $_smarty_tpl->getSubTemplate ('request/requestListAdmin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } else { ?>
        <?php echo $_smarty_tpl->getSubTemplate ('request/requestListStudent.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
</div>


<!-- END OF CONTAINER -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Request Nr. </h4>
            </div>

            <div class="modal-body">
                <p class="pull-right"> Status:
                </p>
                <p> Submitted by: </p>
                <p class="pull-right"> Last Update: </p>
                <p> Answered by: </p>
                <p>Title:</p>
                <p>Description:</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Approve</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Reject</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->

<div id="requestCreationModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title"><strong>Request Submission</strong></h4>
            </div>

            <div class="modal-body">
                <form id="createRequestForm" class="form-horizontal" action="#" method="post" id="request_form">

                    <!-- TITLE -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <input  name="title" placeholder="Write the title here." class="form-control" type="text"
                                       required>

                            </div>
                        </div>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <textarea name="description"
                                          placeholder="Describe the request, including the reason for it."
                                          class="form-control" required></textarea>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <!-- SUCCESS MESSAGE -->
                        <div id="creation_success" class="text-center">
                        </div>
                        <!-- FAILURE MESSAGE -->
                        <div id="creation_failure" class="text-center">
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="requestSubmitBtn" type="submit" class="btn btn-warning" data-dismiss="modal">Submit Request</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php }} ?>
