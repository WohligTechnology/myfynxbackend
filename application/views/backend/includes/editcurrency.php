<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Currency Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editcurrencysubmit');?>" >
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="hidden" id="normal-field" class="row-fluid hidden" name="id" value="<?php echo $before['currency']->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before['currency']->name);?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">Is Default</label>
						<div class="col-sm-4">
						  <?php
							
							echo form_dropdown('isdefault',$isdefault,set_value('isdefault',$before['currency']->isdefault),'class="chzn-select form-control" 	data-placeholder=""');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Conversion Rate</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="conversionrate" value="<?php echo set_value('conversionrate',$before['currency']->conversionrate);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Countries</label>
						<div class="col-sm-4">
						   <?php 
								echo form_multiselect('country[]',$country,set_value('country',$before['currency_country']),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
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