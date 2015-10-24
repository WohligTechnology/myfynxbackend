
	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editaddresssubmit');?>">
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				     <div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <?php echo $before->name;?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Address</label>
						<div class="col-sm-4">
						  <textarea name="billingaddress" class="form-control"><?php echo set_value('billingcity',$before->billingaddress); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="billingcity" class="form-control" value="<?php echo set_value('billingcity',$before->billingcity); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="billingstate" class="form-control" value="<?php echo set_value('billingstate',$before->billingstate); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Country</label>
						<div class="col-sm-4">
						   <?php 	 echo form_dropdown('billingcountry',$country,set_value('billingcountry',$before->billingcountry),'id="select1" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Address</label>
						<div class="col-sm-4">
						  <textarea name="shippingaddress" class="form-control"><?php echo set_value('shippingaddress',$before->shippingaddress); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingcity" class="form-control" value="<?php echo set_value('shippingcity',$before->shippingcity); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingstate" class="form-control" value="<?php echo set_value('shippingstate',$before->shippingstate); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Country</label>
						<div class="col-sm-4">
						  <?php 	 echo form_dropdown('shippingcountry',$country,set_value('shippingcountry',$before->shippingcountry),'id="select2" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Pincode</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingpincode" class="form-control" value="<?php echo set_value('shippingpincode',$before->shippingpincode); ?>">
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
   