
	    <section class="panel">
		    <header class="panel-heading">
				 Order Items Details
			</header>
			<div class="panel-body">
          <?php
$order=$this->input->get('id');
?>
           <div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createorderitems?id='.$this->input->get('id')); ?>"><i class="icon-plus"></i>Create </a></div>
            <div>
                <table class="table table-striped table-hover border-top " cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>id</th>
					<th>order</th>
					<th>product</th>
                    <th>product SKU</th>
					<th>quantity</th>
					<th> price </th>
					<th>discount</th>
					<th> finalprice </th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr >
						<td class="id"><?php echo $row->id; ?></td>
						<td><?php echo $row->firstname; ?></td>
						<td><?php echo $row->name; ?></td>
                        <td><?php echo $row->sku; ?></td>
						<td><?php echo $row->quantity; ?></td>
						<td><?php echo $row->price; ?></td>
						<td><?php echo $row->discount; ?></td>
						<td><?php echo $row->finalprice; ?></td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editorderitem?id=').$row->id.'&order='.$order;?>"><i class="icon-pencil"></i></a><a class="btn btn-primary btn-xs deleteorder" ><i class="icon-trash "></i></a>
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
               <br></br>
                
            </div>
			  <!--  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editorderitemssubmit');?>" >
					<div class="amount-message alert alert-danger" style="display:none;"></div>
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before['order']->id);?>" style="display:none;">
					<div class="form-group">
						<div class="col-sm-4">
							<label class="col-sm-4 control-label">Category</label>
							<div class="col-sm-8">
							  <?php 	 echo form_dropdown('category',$category,set_value('category'),'class="chzn-select form-control category populate placeholder select2-offscreen" id="select4" 	'); ?>
							</div>
						</div>
						<div class="col-sm-4">
							<label class="col-sm-4 control-label">Product</label>
							<div class="col-sm-8">
							<?php
								$productdata = array(
								'' => ''
								);
							echo form_dropdown('product',$productdata,set_value('product'),'class="chzn-select form-control product " id="select5" 	'); ?>
							</div>
						</div>
						<div class="col-sm-4">
							<label class="col-sm-4 control-label">Quantity</label>
							<div class="col-sm-8">
							  <input type="text" name="quantity" class="quantityval form-control" value="1">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<label class="col-sm-4 control-label">Discount</label>
							<div class="col-sm-8">
							  <input type="text" name="discount" class="form-control discount" value="0">
							</div>
						</div>
					</div>
					 <div class="form-group">
						<div class="col-sm-6">
							<label class="col-sm-4 control-label">&nbsp;</label>
							<div class="col-sm-8">
								<button type="button" class="btn btn-info productsubmit">Submit</button>
							</div>
						</div>
					</div>
					 <div class="form-group">
						<div class="col-sm-12">
							<table id="datatable_example" class="responsive table table-striped table-bordered table-hover" style="width:100%;margin-bottom:0; ">
								<thead>
								  <tr>
									<th style="display:none;">ID</th>
									<th class="" style="display:none;">categoryid</th>
									<th class="to_hide_phone  no_sort">Product</th>
									<th class="to_hide_phone  no_sort">Quantity</th>
									<th class="to_hide_phone  no_sort">Discount</th>
									<th class="to_hide_phone  no_sort">Amount</th>
									<th class="ms no_sort "> Actions </th>
								  </tr>
								</thead>
								<tbody class="tablebody producttable">
									<?php foreach($before['orderitems'] as $row) { ?>
										<tr>
											<td style="display:none;" class="productid"><?php echo $row->product; ?></td>
											<td style="display:none;" class="categoryid"><?php echo $row->category; ?></td>
											<td class="productname"><?php echo $row->name; ?></td>
											<td class="productquantity"><?php echo $row->quantity; ?></td>
											<td class="productdiscount"><?php echo $row->discount; ?></td>
											<td class="productamount"><?php echo $row->finalprice; ?></td>
											<td>
												<button class="editproduct"  type="button"><i class="icon-pencil"></i></button>&nbsp;
												<button class="deleteproduct"  type="button"><i class="icon-trash"></i></button>&nbsp;
											</td>
										</tr>								
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Total Amount</label>
					  <div class="col-sm-4"> 
						<input type="double" name="totalamount" class="form-control totalamount" value="<?php echo set_value('totalamount',$before['order']->totalamount); ?>">
					  </div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Discount</label>
					  <div class="col-sm-4"> 
						<input type="double" name="discount" class="form-control discountamount" value="<?php echo set_value('discount',$before['order']->discountamount); ?>" readonly>
					  </div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Final Amount</label>
					  <div class="col-sm-4"> 
						
						<input type="text" name="finalamount" class="form-control finalamount" value="<?php echo set_value('finalamount',$before['order']->finalamount); ?>" readonly>
					  </div>
					</div>
					
					<div class=" form-group">
					  <label class="col-sm-2 control-label"> Amount Paid</label>
					  <div class="col-sm-4"> 
						<input type="double" name="amountpaid" class="form-control amountpaid" value="<?php echo set_value('amountpaid',$before['order']->amountpaid); ?>">
					  </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="button" class="btn btn-info finalsubmit">Submit</button>
						</div>
					</div>
				</form>-->
			</div>
		</section>
    
<script>
    
    $(document).ready(function () {
        $(".deleteorder").click(function() {
            var id=$(this).parents("tr").children(".id").text();
            var mytr=$(this).parents("tr");
            $.get("<?php echo site_url("site/deleteorderitem");?>",{id:id}, function(data) {
                console.log("demo");
                $(mytr).remove();
                
            });
            
            
            
        });
    });
        
    /*
function getURLParameter(name) {
    	return decodeURI(
        	(RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    	);
	}
function totalcalc()
{
	var totalamount=0.0;
	var totaldiscount=0.0;
	var totaltax=0.0;
	var finaltotal=0.0;
	var finalamount=0.0;
	var productrows= new Array();
	var productrows=$('.producttable tr');
	//console.log(productrows);
	for(var i=0;i<productrows.length;i++)
	{
		finaltotal+=parseFloat($(".producttable tr:eq("+i+")").children('.productamount').text());
	}
	totaldiscount = parseFloat($(".discountamount").val());
	if(totaldiscount == "")
	{
		totaldiscount=0;
		$(".discountamount").val("0");
	}
	totalamount = finaltotal;
	finalamount = finaltotal - totaldiscount;
	$('.totalamount').val(totalamount);
	$('.finalamount').val(finalamount);
	//$('.finaltotal').text(finaltotal.toFixed(2));
	
	var amountpaid=parseFloat($('.amountpaid').text());
	//var balanceleft=finaltotal-advanceamount;
	//$('.balanceleft').text(balanceleft.toFixed(2));
}
	$(document).ready(function() {
		$(".category").change(function (){
			var form_data = { category:$(".category").select2("val") };
			$.getJSON("<?php echo site_url('site/getproductbycategory') ?>",form_data,function(msg){
				$('select.product').html(""); 
				for(var i=0;i<msg.length;i++)
				{
					$('select.product').append("<option value='"+msg[i].id+"'>"+msg[i].name+"</option>");
				}
				
				//$(".product").trigger("liszt:updated");
				$("select.product").select2();
			});
		});
		
		$('.deleteproduct').click(function(){
			$(this).parents('tr').remove();
			totalcalc();
		});
		$('.editproduct').click(function(){
			console.log($(this).parents('tr').children('.productid').text());
			$('.category').val($(this).parents('tr').children('.categoryid').text());
			var form_data = {
				category: $('.category').val(),
			}
			$('.quantityval').val($(this).parents('tr').children('.quantitytable').text());
			var row=$(this).parents('tr');
			var productval=$(this).parents('tr').children('.productid').text();
			console.log(productval);
			$.getJSON("<?php echo site_url('site/getproductbycategory'); ?>",form_data, function(msg) {
					//console.log(msg);
					var message= msg;
					//console.log(message);
					
					$('.product').html("");
					for(var i=0;i<message.length;i++)
					{
						$('.product').append("<option value='"+message[i].id+"'>"+message[i].name+"</option>");
						$('.product').val(productval);
						//$(".product").trigger("liszt:updated");
					}
					
					$(".category").trigger("liszt:updated");
					$("select.product").select2();
					$(row).remove();
					totalcalc();
				
			});
		
		});
		$(".productsubmit").click(function(){
			var form_data = {
				product: $('.product').select2("val"),category: $('.category').select2("val"),
				}
				console.log(form_data);
				$.getJSON("<?php echo site_url('site/getproductdetails'); ?>", form_data, function(msg) {
					var message= msg;
					var quantity=$('.quantityval').val();
					if($('.quantityval').val()=="")
					{
						quantity=1;
					}
					var category =$(".category").select2("val");
					var discount=$(".discount").val();
					//console.log(tax);
					//console.log(total);
					var totalamount = (message.price * quantity)-discount;
					$('tbody.tablebody').append("<tr ><td style='display:none;' class='productid'>"+message.id+"</td><td style='display:none;' class='categoryid'>"+category+"</td><td class='productname'>"+message.name+"</td><td class='productquantity'>"+quantity+"</td><td class='productdiscount'>"+discount+"</td><td class='productamount' >"+totalamount+"</td><td><button class='editproduct'  type='button'><i class='icon-pencil'></i></button>&nbsp;<button class='deleteproduct'  type='button'><i class='icon-trash'></i></button>&nbsp;</td></tr>");
					
					totalcalc();
					$('.deleteproduct').click(function(){
						$(this).parents('tr').remove();
						totalcalc();
					});
					$('.editproduct').click(function(){
						console.log($(this).parents('tr').children('.productid').text());
						$('.category').val($(this).parents('tr').children('.categoryid').text());
						var form_data = {
							category: $('.category').val(),
						}
						$('.quantityval').val($(this).parents('tr').children('.quantitytable').text());
						var row=$(this).parents('tr');
						var productval=$(this).parents('tr').children('.productid').text();
						console.log(productval);
						$.getJSON("<?php echo site_url('site/getproductbycategory'); ?>",form_data, function(msg) {
								//console.log(msg);
								var message= msg;
								//console.log(message);
								
								$('.product').html("");
								for(var i=0;i<message.length;i++)
								{
									$('.product').append("<option value='"+message[i].id+"'>"+message[i].name+"</option>");
									$('.product').val(productval);
									//$(".product").trigger("liszt:updated");
								}
								
								$(".category").trigger("liszt:updated");
								$("select.product").select2();
								$(row).remove();
								totalcalc();
							
						});
					
					});
				});
		});
		$('.finalsubmit').click(function(){
			var productrows= new Array();
			var productrows=$('.producttable tr');
			var product=new Array();
			var quantity= new Array();
			var productamount = new Array();
			var category = new Array();
			for(var i=0;i<productrows.length;i++)
			{
				product.push(parseFloat($(".producttable tr:eq("+i+")").children('.productid').text()));
				quantity.push(parseFloat($(".producttable tr:eq("+i+")").children('.productquantity').text()));
				productamount.push(parseFloat($(".producttable tr:eq("+i+")").children('.productamount').text()));
				category.push(parseFloat($(".producttable tr:eq("+i+")").children('.categoryid').text()));
			}
			var totalamount = parseFloat($('.totalamount').val());
			var amountpaid = parseFloat($('.amountpaid').val());
			var balanceamount = (totalamount - (amountpaid));
			if(balanceamount == 0 || balanceamount >= 0)
			{
				var form_data = {
					id: getURLParameter('id'),
					product : product,
					quantity : quantity ,
					productamount: productamount,
					category : category,
					}
					console.log(form_data);
				//console.log(productrows);	
					$.ajax({
						url: "<?php echo site_url('site/editordersubmit'); ?>",
						type: 'POST',
						data: form_data,
						success: function(msg) {
										console.log("DONE")
							window.location.href = "<?php echo site_url('site/vieworder'); ?>";
								
						}
						});
			}
			else
			{
				
				$('.amount-message').fadeIn(500);
				$('.amount-message').html("<span class='alert alert-error'>Please Enter Valid Amount..Balance Amount is "+$('.balanceleft').text()+"</span>");
				$('.amount-message').delay(2000).fadeOut(1000);
				return false;

			}
			});
	});*/
</script>