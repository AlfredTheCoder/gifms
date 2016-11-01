<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $page_header; ?> <small class="pull-right"><b>Fields marked with * are required</b></small></h3>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form class="form-horizontal" method="post" action="<?php echo base_url().'allowance/save_allowance';?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="title" name="title" placeholder="(e.g. ORS ZINC SENSITIZATION MEETING FOR MOH OFFICIALS , KITUI)" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description *</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="description" name="description" rows="5" required="required" placeholder="(any further details on the allowances you wish to input)"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="region" class="col-sm-2 control-label">Region *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="region" name="region" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="county" class="col-sm-2 control-label">County *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="county" name="county" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="program" class="col-sm-2 control-label">Program *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="program" name="program" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="program_manager" class="col-sm-2 control-label">Program Manager*</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="program_manager" name="program_manager" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="account" class="col-sm-2 control-label">Account *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="account" name="account" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="brevity" class="col-sm-2 control-label">Brevity</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="brevity" name="brevity">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="currency" class="col-sm-2 control-label">Payees *</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="payees_csv" value="1" > Upload CSV File
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="payees_csv" value="0" checked="checked"> Input Payees
                        </label>
                    </div>
                </div>
                <div class="form-group" id="csv_payees_upload">
                    <label for="csv_file" class="col-sm-2 control-label">CSV Upload</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="mpesa_payees" name="mpesa_payees" accept=".csv">
                        <ol>
                            <li>Input the list of payees in the excel template. You may download a blank one <a href="<?php echo base_url().'mpesa_template.csv'; ?>">here</a>.</li>
                            <li>The system will auto-calculate the MPESA charges so please do not input this.</li>
                            <li>Save the excel file as a CSV file.</li>
                            <li>Upload the file above.</li>
                        </ol>
                    </div>
                    <div class="col-sm-3">

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">INPUT/ UPLOAD PAYEES</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/allowance_request.js';?>"></script>