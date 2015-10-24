<!--
<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createuser"); ?>">Create</a>
    <h1 class="page-header text-overflow">user Details </h1>
</div>
-->
<div class=" row" style="padding:1% 0;">
	<div class="col-md-10">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportusercsv'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
	</div>
	
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createuser'); ?>"><i class="icon-plus"></i>Create </a></div>
	
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("user List");?>
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="name">name</th>
                                    <th data-field="firstname">firatname</th>
                                    <th data-field="lastname">lastname</th>
                                    <th data-field="companyname">companyname</th>
<!--                                    <th data-field="country">country</th>-->
                                    <th data-field="accesslevel">accesslevel</th>
                                    <th data-field="status">status</th>
                                    <th data-field="Action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed-table-pagination" style="display: block;">
                        <div class="pull-left pagination-detail">
                            <?php $this->chintantable->createpagination();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function drawtable(resultrow) {
            if(resultrow.status=="1")
            {
                resultrow.status="Enable";
            }
            else
            {
                resultrow.status="Disable";
            }
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.firstname + "</td><td>" + resultrow.lastname + "</td><td>" + resultrow.companyname + "</td><td>" + resultrow.accesslevel + "</td><td>" + resultrow.status + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/edituser?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deleteuser?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>
