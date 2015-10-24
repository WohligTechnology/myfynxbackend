<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Category Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editcategorysubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">Parent</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('parent',$category,set_value('parent',$before->parent),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status',$before->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Order</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order',$before->order);?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Image1</label>
						<div class="col-sm-4">
						  <input type="file" id="normal-field" class="form-control" name="image1" value="<?php echo set_value('image1',$before->image1);?>">
						  <?php if($before->image1 != "")
							{	?>
								<br>
								<img src="<?php echo base_url('uploads')."/".$before->image1; ?>" width="100px" height="100px">
						<?php	}
						  ?>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Image2</label>
						<div class="col-sm-4">
						  <input type="file" id="normal-field" class="form-control" name="image2" value="<?php echo set_value('image2',$before->image2);?>">
						   <?php if($before->image2 != "")
							{	?>
								<br>
								<img src="<?php echo base_url('uploads')."/".$before->image2; ?>" width="100px" height="100px">
						<?php	}
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