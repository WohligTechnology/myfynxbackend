
		<section class="panel">
			<header class="panel-heading">
                Cart Details <span class="pull-right">User :<?php echo $before->firstname." ".$before->lastname; ?></span>
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>First name</th>
					<th>Last name</th>
					<th>Product</th>
					<th>Quantity</th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id; ?></td>-->
						<td><?php echo $row->firstname; ?></td>
						<td><?php echo $row->lastname; ?></td>
						<td><?php echo $row->product; ?></td>
						<td><?php echo $row->quantity; ?></td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
