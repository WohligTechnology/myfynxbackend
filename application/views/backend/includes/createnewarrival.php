<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 New Arrival Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createnewarrivalsubmit');?>" >
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Product</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('product',$product,set_value('product'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>	
<!--
					<div class="form-group">
						<label class="col-sm-2 control-label">Content</label>
						<div class="col-sm-4">
						  <textarea name="content" class="form-control"><?php echo set_value('content');?></textarea>
						</div>
					</div>
-->
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Type</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('type',$type,set_value('type'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
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