<div class="row" style="padding:1% 0;">
<div class="col-md-7">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportproductcsv'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
	</div>
	
	<div class="col-md-3">
	
		<a class="btn btn-primary btn-pos"  href="<?php echo site_url('site/uploadproductcsv'); ?>"><i class="icon-upload"></i>Upload Product</a> &nbsp; 
	</div>
	<div class="col-md-2">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary btn-poss" href="<?php echo site_url('site/createproduct'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Product Details
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
			
				<tr>
					
					<th>Select</th>
					<th>Name</th>
					<th>SKU</th>
					<th>Price</th>
					<th>Quantity</th>
					<th> Actions </th>
					<th class="hidden">Id</th>
				</tr>
			</thead>
			<tbody>
           
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><input type="checkbox" class="deleteall all" name="name[]" value="<?php echo $row->id; ?>"></td>
						<td><a href="<?php echo site_url('site/uploadproductimage?id=').$row->id; ?>"><?php echo $row->name; ?></a></td>
						<td><?php echo $row->sku; ?></td>
						<td><?php echo $row->price; ?></td>
						<td>
						<input type="hidden" name="iniquantity" class="iniquantity form-control" value="<?php echo $row->quantity; ?>">
						<input type="text" name="quantity" class="quantity form-control" value="<?php echo $row->quantity; ?>" readonly style="width:58px"> &nbsp;
						<button class="btn btn-xs btn-primary editquantity"><i class="icon-pencil"></i></button>
						<button class="btn btn-xs btn-success savequantity" style="display:none;"><i class="icon-save"></i></button>
						<button class="btn btn-xs btn-danger cancelquantity" style="display:none;"><i class="icon-remove-sign"></i></button>
						</td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editproduct?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                                      
                            <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')" href="<?php echo site_url('site/deleteproduct?id=').$row->id; ?>"><i class="icon-trash "></i></a>
									 
					  </td>
					  <td class="hidden"><span class="productid"><?php echo $row->id; ?></span></td>
					</tr>
					<?php } ?>
					
			</tbody>
                
			</table>
			<div id="delete" class="btn btn-success" style="position: absolute; margin-left: 20px; margin-top: -73px;">Delete</div>
		</section>
	</div>
  </div>
<script>
var parentrow;
var quantity;
var productid;
 $(document).ready(function(){
	$("#delete").click(function(event){
        event.preventDefault();
		  var ids=$("input:checkbox:checked").map(function(){
                return $(this).val();
            }).toArray();
        console.log(ids);
		var form_data = { ids : ids };
            $.post("<?php echo site_url('site/deleteall'); ?>", form_data,function(msg){
//                if(msg==1)
                    alert("product deleted");
                
                window.location.replace("<?php echo site_url('site/viewproduct'); ?>");
            },'json');
        
	});
	$(".editquantity").click(function(){
		parentrow=$(this).parents("tr");
		productid=$(parentrow).find(".productid").text();
		quantity=$(parentrow).find("input.quantity").val();
		$(parentrow).find(".savequantity").show();
		$(parentrow).find(".cancelquantity").show();
		$(parentrow).find("input.quantity").removeAttr("readonly");
		$(this).hide();
	});
	$(".savequantity").click(function(){
		parentrow=$(this).parents("tr");
		productid=$(parentrow).find(".productid").text();
		quantity=$(parentrow).find("input.quantity").val();
		$(parentrow).find(".editquantity").show();
		$(parentrow).find(".cancelquantity").hide();
		$(parentrow).find("input.quantity").attr("readonly","1");
		var form_data = { product : productid , quantity : quantity };
		console.log(form_data);
		$.post("<?php echo site_url('json/savequantity'); ?>",form_data,function(msg){
			if(msg == 1)
				$(parentrow).find("input.iniquantity").val(quantity);
		},'json');
		$(this).hide();
	});
	$(".cancelquantity").click(function(){
		parentrow=$(this).parents("tr");
		productid=$(parentrow).find(".productid").text();
		quantity=$(parentrow).find("input.iniquantity").val();
		$(parentrow).find("input.quantity").val(quantity);
		$(parentrow).find(".editquantity").show();
		$(parentrow).find(".savequantity").hide();
		$(parentrow).find("input.quantity").attr("readonly","1");
		$(this).hide();
	});
     table1.table1.fnSort([[2,'asc']]);
     
     
 });
 </script>