<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $page_header; ?></h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 col-md-6">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php foreach ($allowance_statuses as $key => $allowance_status) {
                    $headingOne = 'heading'.$allowance_status['ID'];
                    $collapseOne = 'collapse'.$allowance_status['ID'];
                    $accordion_item = '<div class="panel panel-default">
                                            <div class="panel-heading allowance_accordion" role="tab" id="'.$headingOne.'">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" table_id="'.$headingOne.'_table" allowance_status="'.$allowance_status['ID'].'" href="#'.$collapseOne.'" aria-expanded="true" aria-controls="'.$collapseOne.'">
                                                        '.$allowance_status['AllowanceStatus'].' ('.$allowance_status['StatusCount'].')
                                                        <i class="more-less glyphicon glyphicon-plus pull-right"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="'.$collapseOne.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="'.$headingOne.'">
                                                <div class="panel-body">
                                                    <table id="'.$headingOne.'_table" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%"></table>
                                                </div>
                                            </div>
                                        </div>';
                    echo $accordion_item;
                }?>
            </div><!-- panel-group -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->
<script src="<?php echo base_url().'public/js/allowance.js';?>"></script>