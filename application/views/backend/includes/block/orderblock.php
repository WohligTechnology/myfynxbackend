<section class="panel">

<div class="panel-body">
<ul class="nav nav-stacked">
<li><a href="<?php echo site_url('site/editorder?id=').$before['order']->id; ?>">User Details</a></li>
<li><a href="<?php echo site_url('site/editorderitems?id=').$before['order']->id; ?>">Order Items</a></li>
<li><a href="<?php echo site_url('site/printorderinvoice?id=').$before['order']->id; ?>" target="_blank">Print Invoice</a></li>
<li><a href="<?php echo site_url('site/printorderlabel?id=').$before['order']->id; ?>" target="_blank">Print Label</a></li>
</ul>
</div>
</section>