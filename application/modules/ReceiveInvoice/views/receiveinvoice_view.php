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
            <form class="form-horizontal" method="post" action="<?php echo base_url().'supplier/save';?>" enctype="multipart/form-data">	

                <div class="form-group">
                     <label for="id" class="col-sm-2 control-label">Supplier</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="id" name="id">
                            <option value="0">Please select</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lpo" class="col-sm-2 control-label">LPO</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="lpo" name="lpo">
                            <option value="0">Please select</option>             
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="invoicetitle" class="col-sm-2 control-label">Title/Description *</label>
                     <div class="col-sm-6">
                         <textarea class="form-control" rows="3" id="invoicetitle" required="required"></textarea>
                    </div>
                </div>

				<div class="form-group">
				     <label for="invoicedate" class="col-sm-2 control-label">Invoice Date</label>
				      <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoicedate" name="invoicedate">
                    </div>
                </div>

				<div class="form-group">
				     <label for="invoicenumber" class="col-sm-2 control-label">Invoice No</label>
				     <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoicenumber" name="invoicenumber">
                    </div>
                </div>

                <div class="form-group">
                    <label for="invoiceamount" class="col-sm-2 control-label">Amount *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoiceamount" name="invoiceamount" required="required">
                        (without commas e.g 100000)
                    </div>
                </div>

               <div class="form-group">
                    <label for="currency" class="col-sm-2 control-label">Currency</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="invoicecurrency" id="invoicecurrency" value="1" checked="checked"> KES
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="invoicecurrency" id="invoicecurrency" value="2"> USD
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sharedcost" class="col-sm-2 control-label">Office Shared Cost</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="sharedcost" name="sharedcost">
                            <option value="0">Not Shared Cost</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                     <label for="account" class="col-sm-2 control-label">Office Cost Account</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="account" name="account">
                            <option value="0">Not Shared Cost</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="recurringperiod" class="col-sm-2 control-label">Recurring Invoice</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="recurringperiod" name="recurringperiod">
                            <option value="0">Non Recurring</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="recurrenddate" class="col-sm-2 control-label">Recurr End Date</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="recurrenddate" name="recurrenddate">
                    </div>
                </div>
		
                <div class="form-group">
                     <label for="invoicepurpose" class="col-sm-2 control-label">Purpose</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoicepurpose" name="invoicepurpose">
                    </div>
                </div>

                <div class="form-group">
                     <label for="paymentmode" class="col-sm-2 control-label">Payment Mode</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="paymentmode" name="paymentmode">
                            <option value="0">Please select</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="invoicecountry" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-6">
                       <select class="form-control" id="invoicecountry" name="invoicecountry">
                            <option value="0">Please select</option>             
                       </select>
                    </div>
                </div>

               <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Taxes</label>
                    <div class="col-sm-6">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="vat" id="vat" value="1"> VAT included in Total (with holding 6%)
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="withholdtingtax" id="withholdtingtax" value="1"> Witholding Tax (with holding 5%)
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="exciseduty" id="exciseduty" value="1"> Exercise Duty (10%)
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="cateringlevy" id="cateringlevy" value="1">Catering Levy (2%)
                        </label><br><br>
                            <input type="text" class="form-control" id="zerorated" name="zerorated"> Zero Rated Supplies Amount<br><br>
                            <input type="text" class="form-control" id="exemptsupplies" name="exemptsupplies"> Exempt Rated Supplies Amount<br><br>
                            <input type="text" class="form-control" id="otherlevies" name="otherlevies"> Other Levies/Taxes
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">RECEIVE INVOICE</button>
                    </div>
                </div>
</div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/receiveinvoice.js';?>"></script>

s