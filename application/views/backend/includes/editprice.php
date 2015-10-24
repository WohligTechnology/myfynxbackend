	    <section class="panel">
		    <header class="panel-heading">
				 Price Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editpricesubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before['product']->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <?php echo $before['product']->name; ?>
						</div>
					</div>		
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
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
							<a href="<?php echo site_url('site/viewproduct'); ?>" type="submit" class="btn btn-info">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</section>
    