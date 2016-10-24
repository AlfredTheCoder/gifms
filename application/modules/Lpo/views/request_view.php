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
            <form class="form-horizontal" method="post" action="<?php echo base_url().'lpo/save_lpo';?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="supplier" class="col-sm-2 control-label">Supplier *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="supplier" name="supplier" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="attention" class="col-sm-2 control-label">Attention *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="attention" name="attention" placeholder="Attention" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email_to" class="col-sm-2 control-label">Email LPO TO *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="email_to" name="email_to[]" multiple="multiple" data-role="tagsinput" required="required">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email_cc" class="col-sm-2 control-label">Email LPO CC</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="email_cc" name="email_cc[]" multiple="multiple" data-role="tagsinput">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email_bcc" class="col-sm-2 control-label">Email LPO BCC</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="email_bcc" name="email_bcc[]" multiple="multiple" data-role="tagsinput">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="program" class="col-sm-2 control-label">Program</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="program" name="program" required="required">
                        </select>
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
                <hr/>
                <div class="form-group">
                    <label for="exemption_choice" class="col-sm-2 control-label">Exempt from 3 Quotes</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="exemption_choice" value="1"> Exempt
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="exemption_choice" value="0" checked="checked"> 3 Quotes
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quotation" class="col-sm-2 control-label">Quotation *</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="quotation" name="quotation[]" required="required">
                    </div>
                    <div class="col-sm-3">
                        <!--(Max Size 10 MB)--> * The selected quotation goes here
                    </div>
                </div>
                <div id="exempted_options">
                    <div class="form-group">
                        <label for="option2" class="col-sm-2 control-label">Option 2 *</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control exempt" id="option2" name="quotation[]" required="required">
                        </div>
                        <div class="col-sm-3">
                            <!--(Max Size 10 MB)-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="option3" class="col-sm-2 control-label">Option 3 *</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control exempt" id="option3" name="quotation[]" required="required"> 
                        </div>
                        <div class="col-sm-3">
                            <!--(Max Size 10 MB)-->
                        </div>
                    </div>
                </div>
                <div class="form-group" id="exempted_reason">
                    <label for="reason_for_exemption" class="col-sm-2 control-label">Reason for Exemption</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="reason_for_exemption" name="reason_for_exemption" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">CREATE  LPO &amp; ADD LINE ITEMS</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/lpo_request.js';?>"></script>