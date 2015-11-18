<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createhomecategoryproduct'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                 Home Category Products Details
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>ID</th>
					<th>Sub Category</th>
					<th> Products </th>
                    <th>Order</th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->homecategoryproductid; ?></td>
						<td><?php echo $row->subcategoryname; ?></td>
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->order; ?></td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/edithomecategoryproduct?id=').$row->homecategoryproductid;?>"><i class="icon-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletehomecategoryproduct?id=').$row->homecategoryproductid; ?>"><i class="icon-trash "></i></a>
									 
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
  </div>
