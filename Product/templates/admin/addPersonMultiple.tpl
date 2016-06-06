<form class="well form-horizontal" action="#" method="post" id="account_form_multiple">

    <!-- NAME -->
    <div class="form-group">
        <label class="col-md-3 control-label">Student JSON File</label>
        <div class="col-md-8 inputGroupContainer">
            <div class="input-group">


                    <input id="input_btn_pretend" class="btn btn-default btn-file" type="button"
                           value="Select JSON File">

                <span id="file_name" class=" col-md-offset-1">
                </span>

                <div>
                    <input id="input_btn_real" class="input_file hidden" type="file">
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-4 col-md-offset-1">
            <button id="submit_multiple" type="submit" class="btn btn-primary center-block">ADD</button>
        </div>
        <!-- SUCCESS MESSAGE -->
        <div  class="col-md-4 col-md-offset-1">
            <strong id="creation_success_multiple">

            </strong>

        </div>
        <!-- FAILURE MESSAGE -->
        <div class="col-md-4 col-md-offset-1">
            <strong id="creation_failure_multiple">

            </strong>
        </div>

    </div>
</form>