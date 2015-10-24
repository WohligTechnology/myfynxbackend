	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/addcreditssubmit');?>">
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				     <div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <?php echo $before->name;?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Credits</label>
						<div class="col-sm-4">
						  <?php echo $before->credits;?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Add Credits</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="credits" class="form-control" value="<?php echo set_value('credits',$before->credits); ?>">
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
