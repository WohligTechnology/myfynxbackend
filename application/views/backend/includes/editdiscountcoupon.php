<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Discount Coupon Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editdiscountcouponsubmit');?>" >
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="hidden" id="normal-field" class="row-fluid hidden" name="id" value="<?php echo $before['dc']->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Coupon Type</label>
						<div class="col-sm-4">
						  <?php
							
							echo form_dropdown('coupontype',$coupontype,set_value('coupontype',$before['dc']->coupontype),'class="chzn-select form-control" 	data-placeholder=""');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Discount Percent</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="discountpercent" value="<?php echo set_value('discountpercent',$before['dc']->discountpercent);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Discount Amount</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="discountamount" value="<?php echo set_value('discountamount',$before['dc']->discountamount);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Min Amount</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="minamount" value="<?php echo set_value('minamount',$before['dc']->minamount);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">X Products</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="xproducts" value="<?php echo set_value('xproducts',$before['dc']->xproducts);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Y Products</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="yproducts" value="<?php echo set_value('yproducts',$before['dc']->yproducts);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Products</label>
						<div class="col-sm-4">
						   <?php 
								echo form_multiselect('product[]',$product,set_value('product',$before['dcproducts']),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Coupon Code</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="couponcode" value="<?php echo set_value('couponcode',$before['dc']->couponcode);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>