<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Newsletter Details
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
					<th>Email</th>
					<th>Telephone</th>
					<th>Comment</th>
					<th>Timestamp</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->email; ?></td>
						<td><?php echo $row->telephone; ?></td>
						<td><?php echo $row->comment; ?></td>
						<td><?php echo $row->timestamp; ?></td>
						<td> <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletecontact?id=').$row->id; ?>"><i class="icon-trash "></i></a>		 
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
  </div>
