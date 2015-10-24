<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 brand Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createbrandsubmit');?>" enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>
						
					<div class="form-group">
						<label class="col-sm-2 control-label">order</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order');?>">
						</div>
					</div>
					
                    <div class=" form-group">
                      <label class="col-sm-2 control-label" for="normal-field">Image</label>
                      <div class="col-sm-4">
                        <input type="file" id="normal-field" class="form-control"  name="image" value="<?php echo set_value('image');?>">
                      </div>
                    </div>
				<div class=" form-group">
					  <label class="col-sm-2 control-label">Is Distributer</label>
					  <div class="col-sm-4">
						<?php echo form_dropdown('isdistributer',$isdistributer,set_value('isdistributer'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');?>
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