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
            <form class="form-horizontal col-sm-12">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Item</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="item" placeholder="Item">
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_description" class="col-sm-2 control-label">Item Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="item_description" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="item" placeholder="Item">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Quantity Description</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="item" placeholder="Item">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Unit Price</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="item" placeholder="Item">
                    </div>
                </div>
                <div class="form-group">
                    <label for="currency" class="col-sm-2 control-label">VAT</label>
                    <div class="col-sm-6">
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_kes" value="kes"> Add 16% VAT
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_usd" value="usd"> VAT Included in Price
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="currency" id="currency_usd" value="usd"> VAT Exempt/Zero Rated
                        </label>
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
                <table class="table table-bordered table-hover table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Sub-Total</th>
                            <th>VAT</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">SAVE</button>
                <button type="submit" class="btn btn-primary">SAVE &amp; ADD LPO TERMS</button>
            </div>
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</div> <!-- /#page-wrapper -->