<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Designs Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createdesignssubmit');?>" enctype= "multipart/form-data">
				<div class=" form-group">
					  <label class="col-sm-2 control-label">From</label>
					  <div class="col-sm-4">
						<?php echo form_dropdown('fromuser',$fromuser,set_value('fromuser'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');?>
					  </div>
					</div>
					 <div class=" form-group">
                      <label class="col-sm-2 control-label" for="normal-field">Image</label>
                      <div class="col-sm-4">
                        <input type="file" id="normal-field" class="form-control"  name="image" value="<?php echo set_value('image');?>">
                      </div>
                    </div>
					
                   
				<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');?>
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