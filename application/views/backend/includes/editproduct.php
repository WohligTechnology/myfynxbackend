	    <section class="panel">
		    <header class="panel-heading">
				 Product Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editproductsubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before['product']->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before['product']->name);?>">
						</div>
					</div>		
					<div class="form-group" style="display:none;">
						<label class="col-sm-2 control-label">SKU</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="sku" value="<?php echo set_value('sku',$before['product']->sku);?>">
						</div>
					</div>
					
                    <div class=" form-group">
                      <label class="col-sm-2 control-label">Brands</label>
                      <div class="col-sm-4">
                        <?php

                            echo form_dropdown('brand[]',$brand,$selectedbrand,'id="select3" class="chzn-select form-control" 	data-placeholder="Choose an brand..." multiple');
                        ?>
                      </div>
                    </div>
			
                    <div class=" form-group">
                      <label class="col-sm-2 control-label">Types</label>
                      <div class="col-sm-4">
                        <?php

                            echo form_dropdown('type[]',$type,$selectedtype,'id="select4" class="chzn-select form-control" 	data-placeholder="Choose an type..." multiple');
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Type Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="typename" value="<?php echo set_value('typename',$before['product']->typename);?>">
						</div>
					</div>
			
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <textarea name="description" class="form-control"><?php echo set_value('description',$before['product']->description); ?></textarea>
						</div>
					</div>
					<div class="form-group" style="display:none;">
						<label class="col-sm-2 control-label">URL</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="url" value="<?php echo set_value('url',$before['product']->url);?>">
						</div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Visibility</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('visibility',$visibility,set_value('visibility',$before['product']->visibility),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class="hidden">
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price',$before['product']->price);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Wholesale Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="wholesaleprice" value="<?php echo set_value('wholesaleprice',$before['product']->wholesaleprice);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">First sale Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="firstsaleprice" value="<?php echo set_value('firstsaleprice',$before['product']->firstsaleprice);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Second Sale Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="secondsaleprice" value="<?php echo set_value('secondsaleprice',$before['product']->secondsaleprice);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Special price from</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="specialpricefrom" value="<?php echo set_value('specialpricefrom',$before['product']->specialpricefrom);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Special price to</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="specialpriceto" value="<?php echo set_value('specialpriceto',$before['product']->specialpriceto);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Related Product</label>
						<div class="col-sm-4">
						   <?php 
								echo form_multiselect('relatedproduct[]',$relatedproduct,set_value('relatedproduct',$before['related_product']),'id="select2" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-4">
						   <?php 
								echo form_multiselect('category[]',$category,set_value('category',$before['product_category']),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Meta Title</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="metatitle" value="<?php echo set_value('metatitle',$before['product']->metatitle);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Meta Desc</label>
						<div class="col-sm-4">
						  <textarea name="metadesc" class="form-control"><?php echo set_value('metadesc',$before['product']->metadesc); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Meta Keyword</label>
						<div class="col-sm-4">
						  <textarea name="metakeyword" class="form-control"><?php echo set_value('metakeyword',$before['product']->metakeyword); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Quantity</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="quantity" value="<?php echo set_value('quantity',$before['product']->quantity);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Model Number</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="modelnumber" value="<?php echo set_value('modelnumber',$before['product']->modelnumber);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand Color</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="brandcolor" value="<?php echo set_value('brandcolor',$before['product']->brandcolor);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">EAN/UPC</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="eanorupc" value="<?php echo set_value('eanorupc',$before['product']->eanorupc);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">EAN/UPC Measuring Units</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="eanorupcmeasuringunits" value="<?php echo set_value('eanorupcmeasuringunits',$before['product']->eanorupcmeasuringunits);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">compatibledevice</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="compatibledevice" value="<?php echo set_value('compatibledevice',$before['product']->compatibledevice);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">compatiblewith</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="compatiblewith" value="<?php echo set_value('compatiblewith',$before['product']->compatiblewith);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">material</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="material" value="<?php echo set_value('material',$before['product']->material);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">color</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="color" value="<?php echo set_value('color',$before['product']->color);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">width</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="width" value="<?php echo set_value('width',$before['product']->width);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">height</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="height" value="<?php echo set_value('height',$before['product']->height);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">depth</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="depth" value="<?php echo set_value('depth',$before['product']->depth);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">salespackage</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="salespackage" value="<?php echo set_value('salespackage',$before['product']->salespackage);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">keyfeatures</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="keyfeatures" value="<?php echo set_value('keyfeatures',$before['product']->keyfeatures);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">videourl</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="videourl" value="<?php echo set_value('videourl',$before['product']->videourl);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">modelname</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="modelname" value="<?php echo set_value('modelname',$before['product']->modelname);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">finish</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="finish" value="<?php echo set_value('finish',$before['product']->finish);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">weight</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="weight" value="<?php echo set_value('weight',$before['product']->weight);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Warranty</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="domesticwarranty" value="<?php echo set_value('domesticwarranty',$before['product']->domesticwarranty);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">warrantysummary</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="warrantysummary" value="<?php echo set_value('warrantysummary',$before['product']->warrantysummary);?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">size</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="size" value="<?php echo set_value('size',$before['product']->size);?>">
						</div>
					</div>
					
					
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status',$before['product']->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
							<a href="<?php echo site_url('site/viewproduct'); ?>" type="submit" class="btn btn-info">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</section>
    