<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 offer Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editoffersubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">title</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="title" value="<?php echo set_value('title',$before->title);?>">
						</div>
					</div>		
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <textarea class="form-control" name="description" value=""><?php echo set_value('description',$before->description);?></textarea>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price',$before->price);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">From Date</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="startdate" value="<?php echo set_value('startdate',$before->startdate);?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">To Date</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="enddate" value="<?php echo set_value('enddate',$before->enddate);?>">
						</div>
					</div>	
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status',$before->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
					<?php if($before->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
						<?php }
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