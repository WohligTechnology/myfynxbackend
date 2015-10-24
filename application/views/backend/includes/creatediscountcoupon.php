<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Currency Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/creatediscountcouponsubmit');?>" >
							
					<div class="form-group">
						<label class="col-sm-2 control-label">Coupon Type</label>
						<div class="col-sm-4">
						  <?php
							
							echo form_dropdown('coupontype',$coupontype,set_value('coupontype'),'class="chzn-select form-control" 	data-placeholder=""');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Discount Percent</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="discountpercent" value="<?php echo set_value('discountpercent');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Discount Amount</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="discountamount" value="<?php echo set_value('discountamount');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Min Amount</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="minamount" value="<?php echo set_value('minamount');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">X Products</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="xproducts" value="<?php echo set_value('xproducts');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Y Products</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="yproducts" value="<?php echo set_value('yproducts');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Coupon Code</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="couponcode" value="<?php echo set_value('couponcode');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Products</label>
						<div class="col-sm-4">
						   <?php 
								echo form_multiselect('product[]',$product,set_value('product'),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
							?>
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