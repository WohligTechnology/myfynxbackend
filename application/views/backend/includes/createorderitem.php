<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Order Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createorderitemsubmit');?>">
			        <?php
                        //$this->input->get()
                    ?>
				   <div class="form-group">
							<label class="col-sm-4 control-label">Product</label>
							<div class="col-sm-8">
							<?php
								$productdata = array(
								'' => ''
								);
							echo form_dropdown('product',$product,set_value('product'),'class="chzn-select form-control product " id="select5" 	'); ?>
							</div>
						</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Quantity</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="quantity" value="<?php echo set_value('quantity');?>" required>
						  <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo $this->input->get('id');?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price');?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Discount</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="discount" class="form-control" value="<?php echo set_value('discount'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Final Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="finalprice" value="<?php echo set_value('finalprice');?>" required>
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