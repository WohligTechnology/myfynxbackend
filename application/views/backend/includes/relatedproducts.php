
	    <section class="panel">
		    <header class="panel-heading">
				 Same Colour Products
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editrelatedproductssubmit');?>" enctype= "multipart/form-data">
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
						<label class="col-sm-2 control-label">Same Colour Products</label>
						<div class="col-sm-4">
						 <?php 
						 foreach($product as $row)
						 {	 ?>
								<input type="checkbox" id="inlineCheckbox1" name="relatedproduct[]" value="<?php echo $row->id; ?>" <?php if(in_array($row->id,$before['related_product'])) echo 'checked'; ?>>&nbsp;<?php echo $row->name; ?> <br>
					<?php	 }
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
    