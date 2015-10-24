	    <script src="<?php echo base_url("assets/js/jquery.form.js"); ?>"></script>
	    <section class="panel">
		    <header class="panel-heading">
				 Product Details
			</header>
			<div class="panel-body">
<!--
				 <form class="form-horizontal row-fluid" method="post" enctype="multipart/form-data" action="<?php echo site_url('site/uploadproductimagesubmit?id=').$before['product']->id;?>">
					
					  <div class="form-group">
							<label class="col-sm-2 control-label">Image Upload</label>
							<div class="col-sm-4">
				                <input type="file" class="spa1n6 fileinput" id="search-input" name="image" class="imagename" >
							</div>
						</div>
					  
					  <div class="span3"> <button class="btn btn-primary imagesubmit">Submit</button>
							<a href="<?php echo site_url('site/viewproduct'); ?>" type="submit" class="btn btn-info">Cancel</a></div>
				 </form>
				 
				 
-->
                <form action="http://www.magicmirror.in" method="post" enctype="multipart/form-data" id="MyUploadForm">
                    <label class="col-sm-2 control-label">Image Upload</label>
                    <div class="col-sm-4">
                        <input name="uploaded_files" id="imageInput" type="file" />
                    </div>
                    <input type="submit"  id="submit-btn" class="btn btn-default submitbutton" value="Upload" />
                    <img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
                    <div id="output"></div>
                </form>
             <div class="hidden jsontable"><?php echo json_encode($table);?></div>
             
             
<!--
            <script>
                $(document).ready(function() {
                    var jsontable=JSON.parse($(".jsontable").text());
                    function createtable(data)
                    {
                        var table=$(".tablecontent");
                        $(table).html("");
                        for(var i=0;i<data.length;i++)
                        {
                            $(table).append("<tr><td style='display:none;' class='rowid'>"+data[i].id+"</td><td><img src='http://www.magicmirror.in/showimage?size=300&image="+data[i].productimage+"' style='height:100px;width:100px;'></td><td>Image is default</td><td><a style='' class='btn btn-primary' href2='http://localhost:10080/admin/index.php/site/defaultimage?imageid="+data[i].id+" &amp;&amp; id=10'>Default</a></td><td><input type='text' id='normal-field' class='order3 form-control' value='"+data[i].order+"' class='form-control' name='ordernumber'><td style='width:30px;'></td><td class='ms'><div class='btn-group'><a href2='http://localhost:10080/admin/index.php/site/deleteimage?imageid="+data[i].id+" &amp;&amp; id=10' class='button red deleteimage btn btn-danger btn-xs' rel='tooltip'><i class='icon-trash'></i></a></div></td></tr>");
                        }
                    };
                    
                    createtable(jsontable);
                });
                
                
            </script>
-->
              
              
<!--
                <table class="table table-striped table-hover" id="" style="width:100%;margin-bottom:0; ">
                    <thead>
                        <tr>
                            <th class="to_hide_phone  no_sort">Name</th>
                            <th>Status</th>
                            <th>Make it Default?</th>
                            <th>Order Number</th>
                            <th class="ms no_sort "> Actions </th>
                        </tr>
                    </thead>
                    <tbody class="tablecontent">
                        
                    </tbody>
              </table>
-->

				  <table id="datatable_example" class="table table-striped table-hover" id="sample_1" style="width:100%;margin-bottom:0; ">
					<thead>
					  <tr>
						  <th class="to_hide_phone  no_sort">Name</th>
						  <th>Status</th>
						  <th>Make it Default?</th>
						  <th>Order Number</th>
						 <th class="ms no_sort "> Actions </th>
					  </tr>
					</thead>
					<tbody class="tablebody">
					<tr>
					 <?php foreach($table as $row) {  ?>
						<td style="display:none;" class="rowid"><?php echo $row->id;?></td>          
						<td ><img src="<?php 
                                                    $subproduct=substr($row->productimage,0,5);
                                                    if($subproduct=="gs://")
                                                    {
                                                        echo "http://www.magicmirror.in/showimage?size=300&image=";
                                                    }
                                                    else
                                                    {
                                                        echo "http://www.magicmirror.in/showimage?size=800&image=gs://magicmirroruploads/uploads/";
                                                    }
                                                    echo $row->productimage;?>" style="height:100px;width:100px;" /></td>
						<td><?php if($row->is_default=="1") { echo "Image is default"; } else { echo "";} ?></td>
						<td><a style="" href="<?php echo site_url('site/defaultimage?imageid='.$row->id.' && id='.$before['product']->id);?>">Default</a></td>
						<td style="width:30px;"><?php  echo "<input type='text' id='normal-field' class='order3' value='".$row->order."' class='form-control' name='ordernumber'>"; ?></td>
						<td class="ms"><div class="btn-group"><a href="<?php echo site_url('site/deleteimage?imageid='.$row->id.' && id='.$before['product']->id );?>" class="button red deleteimage btn btn-danger btn-xs" rel="tooltip" ><i class="icon-trash"></i></a> </div></td>
						</tr>
					   <?php } ?>
						</tbody>
				</table>

			</div>
		</section>
    
 <script>
	$(document).ready(function(e) {
		$('.order3').keyup(function() {
			var form_data={
				order: $(this).val(),
				id: parseInt($(this).parents('tr').children('.rowid').text()),
				product:"<?php echo $_REQUEST['id']; ?>"
			};
			console.log(form_data);
			$.post("<?php echo site_url("site/changeorder"); ?>", form_data);
		});
	});
</script>
<script type="text/javascript">

    function beforeSubmit(data) {
        // console.log("Android");
        // console.log(data);  
        console.log(data);
        //$("#output").html(data.tmp_name);
        var jsontable=JSON.parse($(".jsontable").text());
        var num=jsontable.length-1;
        var product="<?php echo $before['product']->id; ?>";
        var image=data.tmp_name;
        if(num>0)
        {
            var order=parseInt(jsontable[num].order)+1;
        }
        else
        {
            var order=1;
        }
        console.log({product:product,image:image,order:order});
        $.post("<?php echo site_url("json/addimagetoproduct");?>",{product:product,image:image,order:order},function(data) {
            location.reload();
        });
    };
    function errorEncounter(data) {
        console.log(data);
    };
    var newurl="";
    var options = { 
        target:   '#output',   // target element(s) to be updated with server response 
        //beforeSubmit:  beforeSubmit,  // pre-submit callback 
        resetForm: true,        // reset the form after successful submit 
        success: beforeSubmit,
        error: errorEncounter,
        dataType: 'json',
        url: newurl,
    }; 
    $(document).ready(function() { 
        
        $.getJSON("http://www.magicmirror.in/myuploads",{},function(data) {
            console.log(data);
			
            options = { 
                target:   '#output',   // target element(s) to be updated with server response 
                //beforeSubmit:  beforeSubmit,  // pre-submit callback 
                resetForm: true,        // reset the form after successful submit 
                success: beforeSubmit,
                error: beforeSubmit,
                dataType: 'json',
                url: data.url,
            }; 
        });



        $('#MyUploadForm').submit(function() { 
            $(".submitbutton").hide();
			$("#output").text("Please wait uploading Image.");
            $(this).ajaxSubmit(options);  //Ajax Submit form            
            // return false to prevent standard browser submit and page navigation 
            return false; 
        }); 
    });

    //function to check file size before uploading.




</script>