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
                     <label for="supplier" class="col-sm-2 control-label">Supplier</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="supplier" name="supplier">
                            <option value="0">Please select</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lpostatus" class="col-sm-2 control-label">LPO</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="lpostatus" name="lpostatus">
                            <option value="0">Please select</option>             
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact" class="col-sm-2 control-label">Title/Description</label>
                     <div class="col-sm-6">
                         <textarea class="form-control" rows="3" id="addresss" required="required"></textarea>
                    </div>
                </div>

				<div class="form-group">
				     <label for="invoicedate" class="col-sm-2 control-label">Invoice Date</label>
				      <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoicedate" name="invoicedate" required="required">
                    </div>
                </div>

				<div class="form-group">
				     <label for="invoicenumber" class="col-sm-2 control-label">Invoice No</label>
				     <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoicenumber" name="invoicenumber" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="invoiceamount" class="col-sm-2 control-label">Amount</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoiceamount" name="invoiceamount" required="required">
                        (without commas e.g 100000)
                    </div>
                </div>

               <div class="form-group">
                    <label for="currency" class="col-sm-2 control-label">Currency</label>
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
                    <label for="email" class="col-sm-2 control-label">Office Shared Cost</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="website" name="website" required="required">
                    </div>
                </div>

                <div class="form-group">
                     <label for="paymentmode" class="col-sm-2 control-label">Office Cost Account</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="paymentmode" name="paymentmode">
                            <option value="0">Please select</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bankaccount" class="col-sm-2 control-label">Recurring Invoice</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="bankaccount" name="bankaccount" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Recurr End Date</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="usdaccount" name="usdaccount" required="required">
                    </div>
                </div>
		
                <div class="form-group">
                     <label for="invoicepurpose" class="col-sm-2 control-label">Purpose</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoicepurpose" name="invoicepurpose" required="required">
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
                    <label for="country" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-6">
                       <select class="form-control" id="country" name="country">
                            <option value="0">Please select</option>             
                       </select>
                    </div>
                </div>

               <div class="form-group">
                    <label for="currency" class="col-sm-2 control-label">Currency</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_kes" value="1" checked="checked"> VAT included in Total (with holding 6%)
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_usd" value="2"> Witholding Tax (with holding 5%)
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_kes" value="1" checked="checked"> Exercise Duty (10%)
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_kes" value="1" checked="checked">Catering Levy (2%)
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="swiftcode" class="col-sm-2 control-label">Taxes</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="swiftcode" name="swiftcode" required="required"> Zero Rated Supplies Amount
                        <input type="text" class="form-control" id="swiftcode" name="swiftcode" required="required"> Exempt Rated Supplies Amount
                        <input type="text" class="form-control" id="swiftcode" name="swiftcode" required="required"> Other Levies/Taxes
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
<script src="<?php echo base_url().'public/js/uploadinvoice.js';?>"></script>

s