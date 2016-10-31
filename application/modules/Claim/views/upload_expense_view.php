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
            <form class="form-horizontal" method="post" action="<?php echo base_url().'lpo/save_claim';?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="vendor" class="col-sm-2 control-label">Vendor *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="vendor" name="vendor" placeholder="Vendor" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="expense_type" class="col-sm-2 control-label">Expense Type *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="expense_type" name="expense_type" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="purpose" class="col-sm-2 control-label">Purpose *</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="purpose" name="purpose" rows="5" required="required"></textarea>
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
                    <label for="account" class="col-sm-2 control-label">Account *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="account" name="account" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount" class="col-sm-2 control-label">Amount *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="1000" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="currency" class="col-sm-2 control-label">Currency *</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_kes" value="1" checked="checked"> KES
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_usd" value="2"> USD
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quotation" class="col-sm-2 control-label">Receipt *</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="quotation" name="quotation[]" required="required">
                    </div>
                    <div class="col-sm-3">
                        <!--(Max Size 10 MB)-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">UPLOAD EXPENSES</button>
                      <button type="submit" class="btn btn-primary">UPLOAD &amp; ADD ANOTHER EXPENSE</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/claim_expense.js';?>"></script>