<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 product Image Details
			</header>
			
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editproductimagesubmit');?>" enctype= "multipart/form-data">
				
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">product</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="product" value="<?php echo set_value('product',$before->product);?>">
					
				  </div>
				</div>
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">productimage</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="productimageid" value="<?php echo set_value('productimageid',$before->id);?>">
					
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
					<?php if($before->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>
				
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Is Default</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('isdefault',$isdefault,set_value('isdefault',$before->is_default),'class="chzn-select form-control" 	data-placeholder="Choose a Is Default..."');
						?>
					  </div>
					</div>
					<div class="form-group">
                      <label class="col-sm-2 control-label" for="normal-field">Order</label>
                      <div class="col-sm-4">
                        <input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order',$before->order);?>">

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
