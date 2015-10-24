<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Order Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createordersubmit');?>">
				   <div class="amount-message alert alert-danger" style="display:none;"></div>
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before['order']->id);?>" style="display:none;">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">User</label>
						<div class="col-sm-4">
						  <?php 	 echo form_dropdown('user',$user,set_value('user',$before['order']->user),'class="chzn-select form-control user  populate placeholder select2-offscreen" id="select3" 	'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="firstname" value="<?php echo set_value('firstname',$before['order']->firstname);?>">
						</div>
					</div>
					 <div class="form-group">
						<label class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="lastname" value="<?php echo set_value('lastname',$before['order']->lastname);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="email" id="" name="email" class="form-control" value="<?php echo set_value('email',$before['order']->email); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Address</label>
						<div class="col-sm-4">
						  <textarea name="billingaddress" class="form-control"><?php echo set_value('billingcity',$before['order']->billingaddress); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Contact</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="billingcontact" value="<?php echo set_value('billingcontact');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="billingcity" class="form-control" value="<?php echo set_value('billingcity',$before['order']->billingcity); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="billingstate" class="form-control" value="<?php echo set_value('billingstate',$before['order']->billingstate); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Country</label>
						<div class="col-sm-4">
						   <?php 	 echo form_dropdown('billingcountry',$country,set_value('billingcountry',$before['order']->billingcountry),'id="select1" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Address</label>
						<div class="col-sm-4">
						  <textarea name="shippingaddress" class="form-control"><?php echo set_value('shippingaddress',$before['order']->shippingaddress); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Contact</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="shippingcontact" value="<?php echo set_value('shippingcontact');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingcity" class="form-control" value="<?php echo set_value('shippingcity',$before['order']->shippingcity); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingstate" class="form-control" value="<?php echo set_value('shippingstate',$before['order']->shippingstate); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Country</label>
						<div class="col-sm-4">
						<?php 	 echo form_dropdown('shippingcountry',$country,set_value('shippingcountry',$before['order']->shippingcountry),'id="select2" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Pincode</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingpincode" class="form-control" value="<?php echo set_value('shippingpincode',$before['order']->shippingcountry); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Trackingcode</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="trackingcode" class="form-control" value="<?php echo set_value('trackingcode',$before['order']->trackingcode); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Default Currency</label>
						<div class="col-sm-4">
						  <?php
							
							echo form_dropdown('currency',$currency,set_value('currency',$before['order']->currency),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Order Status</label>
						<div class="col-sm-4">
						  <?php 	 echo form_dropdown('orderstatus',$orderstatus,set_value('orderstatus',$before['order']->orderstatus),'class="chzn-select orderstatus form-control" 	'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info finalsubmit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>