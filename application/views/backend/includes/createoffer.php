<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 offer Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createoffersubmit');?>" enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Title</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="title" value="<?php echo set_value('title');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <textarea class="form-control" name="description" value=""><?php echo set_value('description');?></textarea>
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">From Date</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="startdate" value="<?php echo set_value('startdate');?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">To Date</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="enddate" value="<?php echo set_value('enddate');?>">
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
					
                    <div class=" form-group">
                      <label class="col-sm-2 control-label" for="normal-field">Image</label>
                      <div class="col-sm-4">
                        <input type="file" id="normal-field" class="form-control"  name="image" value="<?php echo set_value('image');?>">
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