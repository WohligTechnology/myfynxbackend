<!--
<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createproduct"); ?>">Create</a>
    <div class=" pull-right  createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportproductcsv'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
	</div>
    <h1 class="page-header text-overflow">product Details </h1>
</div>
-->
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
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("product List");?>
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selecctall"/> Select All</th>
                                    <th data-field="id">ID</th>
                                    <th data-field="name">Name</th>
                                    <th data-field="sku">SKU</th>
                                    <th data-field="price">price</th>
                                    <th data-field="quantity">quantity</th>
                                    <th data-field="Action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
        <div  onclick="return confirm('Are you sure you want to delete?')" id="delete" class="btn btn-success">Delete Selected</div>
                   <?php $this->chintantable->createpagination();?>
            </div>
                    </div>
<!--
                    <div class="fixed-table-pagination" style="display: block;">
                        <div class="pull-left pagination-detail">
                            <?php $this->chintantable->createpagination();?>
                        </div>
                    </div>
-->
                </div>
            </div>
        </div>
    </div>
    <script>
        function drawtable(resultrow) {
            var image="<a href='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' width='80px' height='80px'></a>";
                if(resultrow.image=="")
                {
                image="No Receipt Available";
                }
            if(resultrow.status==1)
            {
                resultrow.status="Enable";
            }
            else
            {
                resultrow.status="Disable";
            }
            return "<tr><td><input type='checkbox' class='deleteall all checkbox1' name='name[]' value='"+ resultrow.id +"'></td><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.sku + "</td><td>" + resultrow.price + "</td><td>" + resultrow.quantity + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editproduct?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deleteproduct?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
        }
//        <td>
//						<input type="hidden" name="iniquantity" class="iniquantity form-control" value="<?php echo $row->quantity; ?>">
//						<input type="text" name="quantity" class="quantity form-control" value="<?php echo $row->quantity; ?>" readonly style="width:58px"> &nbsp;
//						<button class="btn btn-xs btn-primary editquantity"><i class="icon-pencil"></i></button>
//						<button class="btn btn-xs btn-success savequantity" style="display:none;"><i class="icon-save"></i></button>
//						<button class="btn btn-xs btn-danger cancelquantity" style="display:none;"><i class="icon-remove-sign"></i></button>
//						</td>
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>
<script>
 $(document).ready(function(){
	$("#delete").click(function(event){
        console.log(event);
        
				if(event.isDefaultPrevented.name=='tt')
				{
					console.log("Cancel");
				}
                else
                {
                event.preventDefault();
                  var ids=$("input:checkbox:checked").map(function(){
                        return $(this).val();
                    }).toArray();
                console.log(ids);
                var form_data = { ids : ids };
                    $.post("<?php echo site_url('site/deleteallselectedproducts'); ?>", form_data,function(msg){
        //                if(msg==1)
        //                    alert("Listing deleted");

                        window.location.replace("<?php echo site_url('site/viewproduct'); ?>");
                    },'json');
                }
				
        
	});
     
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
    </script>
