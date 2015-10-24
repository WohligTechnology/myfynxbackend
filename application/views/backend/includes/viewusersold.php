<div class=" row" style="padding:1% 0;">
	<div class="col-md-10">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportusercsv'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
	</div>
	
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createuser'); ?>"><i class="icon-plus"></i>Create </a></div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                User Details
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
					<th>First name</th>
					<th>Last name</th>
					<th>Company name</th>
					<th>Country</th>
					<th>Accesslevel</th>
					<th>Status</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id; ?></td>-->
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->firstname; ?></td>
						<td><?php echo $row->lastname; ?></td>
						<td><?php echo $row->companyname; ?></td>
						<td><?php echo $row->countryname; ?></td>
						<td><?php echo $row->accesslevel; ?></td>
						<td><?php if($row->status==1) { ?>
							<a href="<?php echo site_url('site/changeuserstatus?id=').$row->id; ?>" class="label label-success label-mini">Enable</a>
						<?php } else { ?>
							<a href="<?php echo site_url('site/changeuserstatus?id=').$row->id; ?>" class="label label-danger label-mini">Disable</a>
						<?php } ?>
						</td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/edituser?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs hidden" href="<?php echo site_url('site/deleteuser?id=').$row->id; ?>"><i class="icon-trash "></i></a>
									 
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
  </div>
