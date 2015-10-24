<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Product Waiting Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editproductwaitingsubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>		
					
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Product</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('product',$product,set_value('product',$before->product),'id="select2" class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">User</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('user',$user,set_value('user',$before->user),'id="select3" class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="email" id="" name="email" class="form-control" value="<?php echo set_value('email',$before->email); ?>">
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