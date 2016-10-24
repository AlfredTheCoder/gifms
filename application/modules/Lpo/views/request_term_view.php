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
            <form class="form-horizontal col-sm-12" action="<?php echo base_url().'lpo/save_lpo_term';?>" method="post">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Terms *</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="lpo_id" name="lpo_id" value="<?php echo $lpo_id; ?>">
                        <input type="text" class="form-control" id="terms" name="terms" placeholder="Terms" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-primary">ADD LPO TERMS</button>
                    </div>
                </div>
            </form> <!-- /form -->
            <div class="col-sm-12">
                <hr/>
                <table id="lpo_terms_tbl" class="table table-bordered table-hover table-condensed table-striped"></table>
            </div>
            <div class="col-sm-12">
                <a href="<?php echo base_url().'lpo';?>" class="btn btn-primary">SAVE</a>
            </div>
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/lpo_request_term.js';?>"></script>