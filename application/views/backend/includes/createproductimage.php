<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewproductimage?id=').$productid; ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 product Image Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createproductimagesubmit');?>" enctype= "multipart/form-data">
			  
				<div class="form-group" style="display:none;">
				  <label class="col-sm-2 control-label" for="normal-field">product</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="product" value="<?php echo set_value('product',$productid);?>">
					
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control"  name="image" value="<?php echo set_value('image');?>">
				  </div>
				</div>
				
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Is Default</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('isdefault',$isdefault,set_value('isdefault'),'class="chzn-select form-control" 	data-placeholder="Choose a Is Default..."');
						?>
					  </div>
					</div>
					<div class="form-group">
                      <label class="col-sm-2 control-label" for="normal-field">Order</label>
                      <div class="col-sm-4">
                        <input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order');?>">

                      </div>
				    </div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewproductimage'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>

