<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">offer Product Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editofferproductsubmit");?>' enctype='multipart/form-data'>
           
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">offer</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="offer" value='<?php echo set_value(' offer ',$before->offer);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Product</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "product",$product,set_value( 'product',$before->product),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Quantity</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="quantity" value='<?php echo set_value(' quantity ',$before->quantity);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewofferproduct?id=".$offerid); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>