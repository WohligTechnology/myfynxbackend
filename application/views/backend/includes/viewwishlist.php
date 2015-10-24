<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Wishlist Details
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>First name</th>
					<th>Last name</th>
					<th>Product</th>
					
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id; ?></td>-->
						<td><?php echo $row->firstname; ?></td>
						<td><?php echo $row->lastname; ?></td>
						<td><?php echo $row->product; ?></td>
						
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
  </div>
