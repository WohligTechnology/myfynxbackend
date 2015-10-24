<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Subscribe Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editsubscribesubmit');?>" enctype= "multipart/form-data">
				<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">email</label>
						<div class="col-sm-4">
						  <input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Timestamp</label>
						<div class="col-sm-4">
						  <input type="timestamp" id="normal-field" class="form-control" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
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