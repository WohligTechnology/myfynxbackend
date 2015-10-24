
		<section class="panel">
			<header class="panel-heading">
                Product Waiting 
            </header>
			
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
<!--					<th>Product</th>-->
					<th>User</th>
					<th>Email</th>
					<th>Time Stamp</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id; ?></td>-->
<!--						<td><?php echo $row->productname; ?></td>-->
						<td><?php echo $row->firstname." ".$row->lastname; ?></td>
						<td><?php echo $row->email;  ?></td>
						<td><?php echo $row->timestamp; ?></td>
						<td> 
                           <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editproductwaiting?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deleteproductwaiting?id=').$row->id; ?>" onclick="return confirm('Are you sure?')"><i class="icon-trash "></i></a>
									 
					   </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	