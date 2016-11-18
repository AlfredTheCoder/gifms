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
                        <input type="text" class="form-control" id="supplier" name="supplier" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="taxpin" class="col-sm-2 control-label">PIN</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="taxpin" name="taxpin" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact" class="col-sm-2 control-label">Contact</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="contact" name="contact" required="required">
                    </div>
                </div>

				<div class="form-group">
				     <label for="addresss" class="col-sm-2 control-label">Address</label>
				     <div class="col-sm-6">
			  			 <textarea class="form-control" rows="3" id="addresss" required="required"></textarea>
				    </div>
				</div>

				<div class="form-group">
				     <label for="city" class="col-sm-2 control-label">City</label>
				    <div class="col-sm-6">
				  	   <select class="form-control" id="city" name="city">
                            <option value="0">Select one</option>             
                       </select>
				    </div>
				</div>

                <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Telephone</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="telephone" name="telephone" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="email" name="email" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Website</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="website" name="website" required="required">
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
                    <label for="bankaccount" class="col-sm-2 control-label">KES Account</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="bankaccount" name="bankaccount" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">USD Account</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="usdaccount" name="usdaccount" required="required">
                    </div>
                </div>
		
                <div class="form-group">
                     <label for="bank" class="col-sm-2 control-label">Bank</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="bank" name="bank">
                            <option value="0">Please select</option>             
                       </select>
                    </div>
                </div>

				<div class="form-group">
				     <label for="bankbranch" class="col-sm-2 control-label">Bank Branch</label>
				    <div class="col-sm-6">
				  	   <select class="form-control" id="bankbranch" name="bankbranch">
				            <option value=""></option>
				  	   </select>
				    </div>
				</div>

                <div class="form-group">
                    <label for="bankcode" class="col-sm-2 control-label">Bank Branch Code</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="bankcode" name="bankcode" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="swiftcode" class="col-sm-2 control-label">SWIFT</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="swiftcode" name="swiftcode" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="bankcode" class="col-sm-2 control-label">Bank Branch Code</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="bankcode" name="bankcode" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobilepaymentnumber" class="col-sm-2 control-label">Mobile Payment Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="mobilepaymentnumber" name="mobilepaymentnumber" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobilepaymentnumber" class="col-sm-2 control-label">Mobile Payment Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="mobilepaymentnumber" name="mobilepaymentnumber" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="chequeddressee" class="col-sm-2 control-label">Cheque Addressee</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="chequeddressee" name="chequeddressee" required="required">
                    </div>
                </div>


                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="status" value="1" checked="checked"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="status" value="0"> No
                        </label>
                    </div>
                </div>


                <div class="form-group">
                     <label for="supplycategory" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="supplycategory" name="supplycategory">
                            <option value="0">Please select</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                     <label for="staff" class="col-sm-2 control-label">Staff</label>
                    <div class="col-sm-6">
                       <select class="form-control" id="staff" name="staff">
                            <option value="0">Non Staff</option>             
                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">SAVE DETAILS</button>
                    </div>
                </div>
</div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/supplier_add.js';?>"></script>

