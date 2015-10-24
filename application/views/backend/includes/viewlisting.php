<div class=" row" style="padding:1% 0;">

	<div class="col-md-6">
	<?php
        $userid=$this->session->userdata('id');
        $accesslevel=$this->session->userdata('accesslevel');
        if($userid==74 && $accesslevel==1)
        {
        ?>
		<a class="btn btn-danger"  href="<?php echo site_url('site/tejasdelete'); ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-upload"></i>DELETE ALL LISTING</a> &nbsp; 
		<?php
        }
        ?>
	</div>
	<div class="col-md-3">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createlisting'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
	<div class="col-md-3">
	
		<a class="btn btn-primary"  href="<?php echo site_url('site/uploadlistingcsv'); ?>"><i class="icon-upload" onclick="return confirm('Are you sure you want to delete?')"></i>Upload Listing</a> &nbsp; 
	</div>
	
<!--
	<div class="col-md-2">
	<div id="delete" class="btn btn-success">Delete Selected</div>
	</div>
-->
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Listing Details 
            </header>
			<div class="drawchintantable">
                <?php $this->chintantable->createsearch("Listing Details");?>
                <div class="messagedisplay" style="display:none;">Listing Deleted Successfully</div>
                <div class="">Total Number of Listings are:- <b><span class="data-totalvalues"></span></b></div>
                <div class="">Total Number of Pages are:- <b><span class="data-totalpagenumbers"></span></b></div>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0" >
                <thead>
                    <tr>
                        <th>
<input type="checkbox" id="selecctall"/> Selecct All</th>
                        <th data-field="id">Id</th>
                        <th data-field="name">Name</th>
                        <th data-field="categoryname">Category</th>
                        <th data-field="address">Address</th>
<!--                        <th data-field="area">Area</th>-->
                        <th data-field="email">Email</th>
<!--
                        <th data-field="contactno">Contact No</th>
                        <th data-field="pointer">Pointer</th>
-->
                        <th data-field="action"> Actions </th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                </table>
        <div  onclick="return confirm('Are you sure you want to delete?')" id="delete" class="btn btn-success">Delete Selected</div>
                   <?php $this->chintantable->createpagination();?>
            </div>
		</section>
		<script>
            function drawtable(resultrow) {
                if(!resultrow.address)
                {
                    resultrow.address="";
                }
                var deletestring="";
                return "<tr><td><input type='checkbox' class='deleteall all checkbox1' name='name[]' value='"+ resultrow.id +"'></td><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.categoryname + "</td><td>" + resultrow.address + "</td><td>" + resultrow.email + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editlisting?id=');?>"+resultrow.id +"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs'  onclick=\"return confirm('Are you sure you want to delete?')\" href='<?php echo site_url('site/deletelisting?id='); ?>"+resultrow.id +"'><i class='icon-trash '></i></a></td><tr>";
            }
            generatejquery('<?php echo $base_url;?>');
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
                    $.post("<?php echo site_url('site/deletealllistings'); ?>", form_data,function(msg){
        //                if(msg==1)
        //                    alert("Listing deleted");

                        window.location.replace("<?php echo site_url('site/viewlisting?id=2'); ?>");
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