<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $page_header; ?></h3>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form class="form-horizontal" method="post" action="<?php echo base_url().'lpo/save_new_password';?>">
                <div class="form-group">
                    <label for="old_password" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="*****">
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_password" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="*****">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_new_password" class="col-sm-2 control-label">Confirm New Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="*****">
                    </div>
                </div>
 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/claim_expense.js';?>"></script>