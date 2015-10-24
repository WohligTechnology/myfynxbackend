<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createbrand"); ?>">Create</a>
    <h1 class="page-header text-overflow">brand Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("brand List");?>
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="name">name</th>
                                    <th data-field="order">order</th>
                                    <th data-field="logo">logo</th>
                                    <th data-field="isdistributer">Isdistributer</th>
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
            if(resultrow.isdistributer==1){
            resultrow.isdistributer="Yes";
            } 
            else if(resultrow.isdistributer==0){
            resultrow.isdistributer="No";
            }
            var logo="<a href='<?php echo base_url('uploads').'/'; ?>"+resultrow.logo+"' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>"+resultrow.logo+"' width='80px' height='80px'></a>";
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.order + "</td><td>" + logo + "</td><td>" + resultrow.isdistributer + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editbrand?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deletebrand?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>
