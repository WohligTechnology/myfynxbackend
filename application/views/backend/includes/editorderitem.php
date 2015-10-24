
	    <section class="panel">
		    <header class="panel-heading">
				 Edit Order Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editorderitemsubmit?order='.$before['orderitems'][0]->order);?>" >
					<div class="amount-message alert alert-danger" style="display:none;"></div>
					
					<?php print_r($before['orderitems']);?>
					
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo $before['orderitems'][0]->id;?>" style="display:none;">
					<input type="hidden" id="normal-field" class="form-control" name="order" value="<?php echo $before['orderitems'][0]->order; ?>"  style="display:none;">
					<?php print_r($before[orderitems][0]->quantity);?>
					<div class="form-group">
						<label class="col-sm-2 control-label">Product</label>
						<div class="col-sm-4">
						  <?php 	 echo form_dropdown('product',$product,set_value('product',$before['product']->product),'class="chzn-select form-control product  populate placeholder select2-offscreen" id="select3" 	'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Quantity</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="quantity" value="<?php echo set_value('quantity',$before[orderitems][0]->quantity);?>"> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price',$before[orderitems][0]->price);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Discount</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="discount" value="<?php echo set_value('discount',$before[orderitems][0]->discount);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Final Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="finalprice" value="<?php echo set_value('finalprice',$before[orderitems][0]->finalprice);?>">
						</div>
					</div>
					
					 
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info finalsubmit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    