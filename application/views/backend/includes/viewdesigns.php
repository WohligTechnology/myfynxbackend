<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createdesigns?id=").$this->input->get('id'); ?>">Create</a>
    <h1 class="page-header text-overflow">Designs Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("Designs List");?>
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
<!--                                    <th data-field="fromuser">From</th>-->
                                    <th data-field="status">Status</th>
                                    <th data-field="image">image</th>
                                    <th data-field="timestamp">Timestamp</th>
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
    </div>
    <script>
        function drawtable(resultrow) {
             if (resultrow.status == 1) {
                resultrow.status = "Approved";
            } else if (resultrow.status == 2) {
                resultrow.status = "Waiting";
            } else if (resultrow.status == 3) {
                resultrow.status = "Reject";
            }
            else if (resultrow.status == 4) {
                resultrow.status = "Publish";
            }
            var image="<a href='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' width='80px' height='80px'></a>";
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.status + "</td><td>" + image + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editdesigns?id=');?>" + resultrow.id + "&designerid="+ resultrow.designerid +"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deletedesigns?id='); ?>" + resultrow.id + "&designerid="+ resultrow.designerid +"'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>


