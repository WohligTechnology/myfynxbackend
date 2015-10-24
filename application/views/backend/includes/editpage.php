<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Page Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editpagesubmit');?>" >
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="hidden" id="normal-field" class="row-fluid hidden" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
						</div>
					</div>		
<!--
					<div class="form-group">
						<label class="col-sm-2 control-label">Content</label>
						<div class="col-sm-4">
						  <textarea name="content" class="form-control"><?php echo set_value('content',$before->content);?></textarea>
						</div>
					</div>
-->
                    <div class=" form-group">
                        <label class="col-sm-2 control-label" for="normal-field">content</label>
                        <div class="col-sm-8">
                            <textarea name="content" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'content',$before->content);?></textarea>
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