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
            <form class="form-horizontal col-sm-12" action="<?php echo base_url().'allowance/save_allowance_payee';?>" method="post">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Name *</label>
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="allowance_id" name="allowance_id" value="<?php echo $allowance_id; ?>">
                        <input type="text" class="form-control" id="name" name="name" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Registered MPESA Name *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="registered_name" name="registered_name" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Mobile # *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="phone" name="phone" required="required" placeholder="07xxxxxxxx">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Amount *</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="amount" name="amount" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </form> <!-- /form -->
            <div class="col-sm-12">
                <hr/>
                <table id="allowance_payee_tbl" class="table table-bordered table-hover table-condensed table-striped"></table>
            </div>
            <div class="col-sm-12">
                <a href="<?php echo base_url().'allowances'; ?>" class="btn btn-primary">CLOSE</a>
            </div>
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/allowance_request_payee.js';?>"></script>