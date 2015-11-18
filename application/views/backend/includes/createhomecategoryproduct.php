<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Home Category Product Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createhomecategoryproductsubmit');?>" >
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Product</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('product',$product,set_value('product'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>	
                    <div class=" form-group">
					  <label class="col-sm-2 control-label">Sub Category</label>
					  <div class="col-sm-4">
						<?php echo form_dropdown('subcategory',$subcategory,set_value('subcategory'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
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