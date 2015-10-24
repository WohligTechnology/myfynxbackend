<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Pickofweak Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createpickofweaksubmit');?>" enctype= "multipart/form-data">
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Image1</label>
						<div class="col-sm-4">
						  <input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">Order</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('order',$order,set_value('order'),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
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