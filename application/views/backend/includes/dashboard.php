<!--

 <h1 class="page-header text-overflow">Total Designs :-</h1>
 <h1 class="page-header text-overflow">Total Designs Sold :-</h1>



<div id="page-title">
    <h1 class="page-header text-overflow">Products having quantity less than <?php echo $remainingproducts?> </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="name">Product</th>
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
            return "<tr><td>" + resultrow.id + "</td><td><a href='<?php echo site_url('site/editproduct?id=');?>" + resultrow.id + "'>" + resultrow.name + "</td><td></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>
-->
