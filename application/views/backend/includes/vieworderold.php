<div class=" row" style="padding:1% 0;">
	<div class="col-md-10">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportorderitemcsv'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
	</div>
<!--
	<div class="col-md-10">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportordercsv'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
	</div>	
-->
<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createorder'); ?>"><i class="icon-plus"></i>Create </a></div>
</div>
<div class="row">

	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Order Details
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Customer</th>
					<th>Final Amount</th>
					<th>Status</th>
					<th>Time</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id; ?></td>-->
						<td><?php echo $row->firstname." ".$row->lastname; ?></td>
						<td><?php echo $row->finalamount; ?></td>
						<td><?php echo $row->orderstatus; ?></td>
						<td><?php echo $row->timestamp; ?></td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editorder?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deleteorder?id=').$row->id; ?>" onclick="return confirm('Are you sure?')"><i class="icon-trash "></i></a>
									 
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
  </div>
