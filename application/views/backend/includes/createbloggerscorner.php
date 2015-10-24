<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Bloggers Corner Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createbloggerscornersubmit');?>" enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">Link</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="link" value="<?php echo set_value('link');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Target</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="target" value="<?php echo set_value('target');?>">
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
					<div class="form-group">
						<label class="col-sm-2 control-label">Order</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order');?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Image</label>
						<div class="col-sm-4">
						  <input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
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