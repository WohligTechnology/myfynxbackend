<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Newsletter User Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createnewsletterusersubmit');?>">
					
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">User</label>
						<div class="col-sm-4">
						   <?php 
								echo form_multiselect('user[]',$user,set_value('user'),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="email" id="normal-field" class="form-control" name="email[]" value="<?php echo set_value('email');?>"><br>
						  <table class="table rowtable">
							<thead>
								
							</thead>
							<tbody class="emailbody">
							
							</tbody>
						  </table>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">
							<button type="button" class="btn btn-xs btn-success addemail pull-right"><i class="icon-plus-sign"></i></button>
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
<script>
	$(document).ready(function(){
		
		$(".addemail").click(function() {
			$("tbody.emailbody").append("<tr><td><input type='email' name='email[]' class='form-control' style='width:90%;float:left'>&nbsp;<button class='deleteemail btn btn-xs btn-danger pull-right'><i class='icon-minus-sign '></i></button></td></tr>");
				
			$(".deleteemail").click(function(){
				//alert("Hi");
				$(this).parents('tr').remove();
			});
		});

	});
</script>
<style>
	.rowtable td {
		border: 0px solid transparent;
		border-color: transparent !important;
		padding: 10px 0px !important;
	}
</style>