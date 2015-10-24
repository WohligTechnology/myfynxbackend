
	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editusersubmit');?>">
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				     <div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
						</div>
					</div>
					 <div class="form-group">
						<label class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="firstname" value="<?php echo set_value('firstname',$before->firstname);?>">
						</div>
					</div>
					 <div class="form-group">
						<label class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="lastname" value="<?php echo set_value('lastname',$before->lastname);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="email" id="" name="email" class="form-control" value="<?php echo set_value('email',$before->email); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4">
						  <input type="password" id="normal-field" class="form-control" name="password" value="">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-4">
						  <input type="password" id="normal-field" class="form-control" name="confirmpassword" value="">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Company Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="companyname" value="<?php echo set_value('companyname',$before->companyname);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company Registration Number</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="companyregistrationno" value="<?php echo set_value('companyregistrationno',$before->companyregistrationno);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">VAT Number</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="vatnumber" value="<?php echo set_value('vatnumber',$before->vatnumber);?>">
						</div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 control-label">Country</label>
					  <div class="col-sm-4">
						<?php  	 echo form_dropdown('country',$country,set_value('country',$before->country),'class="chzn-select form-control" 	data-placeholder="Choose a Country..."');
						?>
					  </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-4">
						  <input type="number" id="" name="phone" class="form-control" value="<?php echo set_value('phone',$before->phone); ?>">
						</div>
					</div>		
					<div class="form-group">
					  <label class="col-sm-2 control-label">Select Accesslevel</label>
					  <div class="col-sm-4">
						<?php  	 echo form_dropdown('accesslevel',$accesslevel,set_value('accesslevel',$before->accesslevel),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class="hidden">
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
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Default Currency</label>
						<div class="col-sm-4">
						  
						  <?php
							
							echo form_dropdown('currency',$currency,set_value('currency',$before->currency),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
						</div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status',$before->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
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
    