<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Ads Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editadssubmit');?>">
					 <input type="hidden" id="normal-field" class="row-fluid" name="id" value="<?php echo $before['ads']->id;?>">
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before['ads']->name);?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-4">
						   <?php 
							echo form_multiselect('category[]',$category,set_value('category',$before['ads_category']),'id="select1" class="form-control populate placeholder select2-offscreen"');
								
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Area</label>
						<div class="col-sm-4">
						   <?php 
								 echo form_dropdown('area',$area,set_value('area',$before['ads']->area),'class="chzn-select form-control" data-placeholder="Choose a category..."');
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before['ads']->email);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-4">
						  <input type="number" id="normal-field" class="form-control" name="phone" value="<?php echo set_value('phone',$before['ads']->phone);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Address</label>
						<div class="col-sm-4">
						  <textarea class="form-control" name="address" value=""><?php echo set_value('address',$before['ads']->address);?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Featured</label>
						<div class="col-sm-4">
						   <?php 
							$featured = array(
								"1" => "Yes",
								"2" => "No"
							);
								 echo form_dropdown('featured',$featured,set_value('featured',$before['ads']->featured),'class="chzn-select form-control" data-placeholder="Choose a category..."');
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <textarea class="form-control" name="description" value=""><?php echo set_value('description',$before['ads']->description);?></textarea>
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