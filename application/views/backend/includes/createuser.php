<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createusersubmit');?>">
				    <div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Firstname</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="firstname" value="<?php echo set_value('firstname');?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Lastname</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="lastname" value="<?php echo set_value('lastname');?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="email" id="" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
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
						<label class="col-sm-2 control-label">Compony Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="companyname" value="<?php echo set_value('companyname');?>" required>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Compony Registration Number</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="companyregistrationno" value="<?php echo set_value('companyregistrationno');?>" required>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">VAT Number</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="vatnumber" value="<?php echo set_value('vatnumber');?>" required>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Country</label>
						<div class="col-sm-4">
						  <?php
							
							echo form_dropdown('country',$country,set_value('country'),'class="chzn-select form-control" 	data-placeholder="Choose a Country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-4">
						  <input type="number" id="" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>">
						</div>
					</div>
					<div class="hidden">
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Address</label>
						<div class="col-sm-4">
						  <textarea name="billingaddress" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="billingcity" class="form-control" value="<?php echo set_value('billingcity'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="billingstate" class="form-control" value="<?php echo set_value('billingstate'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Billing Country</label>
						<div class="col-sm-4">
						  <?php 	 echo form_dropdown('billingcountry',$country,set_value('billingcountry'),'id="select1" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Address</label>
						<div class="col-sm-4">
						  <textarea name="shippingaddress" class="form-control"><?php echo set_value('shippingaddress'); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingcity" class="form-control" value="<?php echo set_value('shippingcity'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingstate" class="form-control" value="<?php echo set_value('shippingstate'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Country</label>
						<div class="col-sm-4">
						  <?php 	 echo form_dropdown('shippingcountry',$country,set_value('shippingcountry'),'id="select2" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Shipping Pincode</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="shippingpincode" class="form-control" value="<?php echo set_value('shippingpincode'); ?>">
						</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Default Currency</label>
						<div class="col-sm-4">
						  <?php
							
							echo form_dropdown('currency',$currency,set_value('currency'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
						</div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Select Accesslevel</label>
					  <div class="col-sm-4">
						<?php 	 echo form_dropdown('accesslevel',$accesslevel,set_value('accesslevel'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
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