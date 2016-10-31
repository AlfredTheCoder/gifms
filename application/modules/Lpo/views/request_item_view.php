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
            <form class="form-horizontal col-sm-12" action="<?php echo base_url().'lpo/save_lpo_item';?>" method="post">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Item *</label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" id="lpo_id" name="lpo_id" value="<?php echo $lpo_id; ?>">
                        <input type="hidden" class="form-control" id="quotation_id" name="quotation_id" value="<?php echo $quotation_id; ?>">
                        <input type="text" class="form-control" id="item" name="item" placeholder="e.g A2 Posters" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_description" class="col-sm-2 control-label">Item Description *</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="item_description" name="item_description" rows="5" required="required"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Quantity *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="quantity" name="quantity" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Quantity Description *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="quantity_description" name="quantity_description" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Unit Price *</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="unit_price" name="unit_price" value="0" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="currency" class="col-sm-2 control-label">VAT</label>
                    <div class="col-sm-6">
                        <label class="radio-inline">
                            <input type="radio" name="vat_charge" id="add_16" value="0"> Add 16% VAT
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="vat_charge" id="vat_included" value="1"> VAT Included in Price
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="vat_charge" id="vat_zero_rated" value="2" checked="checked"> VAT Exempt/Zero Rated
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Unit Price + VAT</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="total" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">CREATE  LPO &amp; ADD LINE ITEMS</button>
                    </div>
                </div>
            </form> <!-- /form -->
            <div class="col-sm-12">
                <hr/>
                <table id="lpo_items_tbl" class="table table-bordered table-hover table-condensed table-striped"></table>
            </div>
            <div class="col-sm-12">
                <a href="<?php echo base_url().'lpo'; ?>" class="btn btn-primary">SAVE</a> <!--Could be approvals for directors-->
                <a href="<?php echo base_url().'requestlpo/terms/'.$lpo_id; ?>" class="btn btn-primary">SAVE &amp; ADD LPO TERMS</a>
            </div>
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/lpo_request_item.js';?>"></script>