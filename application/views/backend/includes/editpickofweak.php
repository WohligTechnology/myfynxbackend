<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 pickofweak Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editpickofweaksubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Order</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('order',$order,set_value('order',$before->order),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Image</label>
						<div class="col-sm-4">
						  <input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image1);?>">
						  <?php if($before->image != "")
							{	?>
								<br>
								<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="100px" height="100px">
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