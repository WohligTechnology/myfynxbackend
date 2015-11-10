<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Create Designers
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createdesignerssubmit');?>" enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>		
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email');?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Location</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="location" value="<?php echo set_value('location');?>">
						</div>
					</div>	
										<div class="form-group" style="display:none;">
						<label class="col-sm-2 control-label">No of designs</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="noofdesigns" value="<?php echo set_value('noofdesigns');?>">
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