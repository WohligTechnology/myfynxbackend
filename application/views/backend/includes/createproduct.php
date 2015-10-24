<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Product Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createproductsubmit');?>" >
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>
					<div class="form-group" style="display:none;">
						<label class="col-sm-2 control-label">SKU</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="sku" value="<?php echo set_value('sku');?>">
						</div>
					</div>
					
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Brands</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('brand[]',$brand,set_value('brand'),'id="select3" class="chzn-select form-control" 	data-placeholder="Choose an brand..." multiple');
					?>
				  </div>
				</div>
			    <div class=" form-group">
				  <label class="col-sm-2 control-label">Types</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('type[]',$type,set_value('type'),'id="select4" class="chzn-select form-control" 	data-placeholder="Choose an type..." multiple');
					?>
				  </div>
				</div>
				<div class="form-group">
						<label class="col-sm-2 control-label">Type Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="typename" value="<?php echo set_value('typename');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <textarea name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">URL</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="url" value="<?php echo set_value('url');?>">
						</div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Visibility</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('visibility',$visibility,set_value('visibility'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class="hidden">
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Wholesale Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="wholesaleprice" value="<?php echo set_value('wholesaleprice');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">First sale Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="firstsaleprice" value="<?php echo set_value('firstsaleprice');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Second Sale Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="secondsaleprice" value="<?php echo set_value('secondsaleprice');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Special price from</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="specialpricefrom" value="<?php echo set_value('specialpricefrom');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Special price to</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="specialpriceto" value="<?php echo set_value('specialpriceto');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Related Product</label>
						<div class="col-sm-4">
						   <?php 
								echo form_multiselect('relatedproduct[]',$relatedproduct,set_value('relatedproduct'),'id="select2" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-4">
						   <?php 
								echo form_multiselect('category[]',$category,set_value('category'),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Meta Title</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="metatitle" value="<?php echo set_value('metatitle');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Meta Desc</label>
						<div class="col-sm-4">
						  <textarea name="metadesc" class="form-control"><?php echo set_value('metadesc'); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Meta Keyword</label>
						<div class="col-sm-4">
						  <textarea name="metakeyword" class="form-control"><?php echo set_value('metakeyword'); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Quantity</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="quantity" value="<?php echo set_value('quantity');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Model Number</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="modelnumber" value="<?php echo set_value('modelnumber');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand Color</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="brandcolor" value="<?php echo set_value('brandcolor');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">EAN/UPC</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="eanorupc" value="<?php echo set_value('eanorupc');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">EAN/UPC Measuring Units</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="eanorupcmeasuringunits" value="<?php echo set_value('eanorupcmeasuringunits');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">compatibledevice</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="compatibledevice" value="<?php echo set_value('compatibledevice');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">compatiblewith</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="compatiblewith" value="<?php echo set_value('compatiblewith');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">material</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="material" value="<?php echo set_value('material');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">color</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="color" value="<?php echo set_value('color');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">width</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="width" value="<?php echo set_value('width');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">height</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="height" value="<?php echo set_value('height');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">depth</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="depth" value="<?php echo set_value('depth');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">salespackage</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="salespackage" value="<?php echo set_value('salespackage');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">keyfeatures</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="keyfeatures" value="<?php echo set_value('keyfeatures');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">videourl</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="videourl" value="<?php echo set_value('videourl');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">modelname</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="modelname" value="<?php echo set_value('modelname');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">finish</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="finish" value="<?php echo set_value('finish');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">weight</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="weight" value="<?php echo set_value('weight');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Warranty</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="domesticwarranty" value="<?php echo set_value('domesticwarranty');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">warrantysummary</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="warrantysummary" value="<?php echo set_value('warrantysummary');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">size</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="size" value="<?php echo set_value('size');?>">
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