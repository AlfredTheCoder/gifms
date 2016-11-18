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
            <ul class="nav nav-pills">
                <li class="active"> <a data-toggle="pill" href="#" class="supplier_status_filter" supplierstatus="0">Active</a></li>
                <li class=""> <a data-toggle="pill" href="#" class="supplier_status_filter" supplierstatus="1">Disabled</a></li> 
            </ul>
                <br/>
                        <?php
                        $filter_values = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
                                'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                        echo '<a href="#" class="supplier_name_filter" filter_value="All">All</a>';
                        //make <a> tags for "A" through "Z"
                        foreach($filter_values as $value)
                        {   
                            echo '<a href="#" class="supplier_name_filter" filter_value="'.$value.'"> | '.$value.'</a>';
                        }
                        ?>
                        <br><br>
                        <hr>

                        <table id="supplier_table" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%"></table>
        </div><!-- panel-group -->
    </div> <!-- /.col -->
</div> <!-- /.row -->
<script src="<?php echo base_url().'public/js/supplier.js';?>"></script>