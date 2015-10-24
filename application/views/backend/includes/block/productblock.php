<section class="panel">

<div class="panel-body">
<ul class="nav nav-stacked">
<li><a href="<?php echo site_url('site/editproduct?id=').$before['product']->id; ?>">Product Details</a></li>
<li><a href="<?php echo site_url('site/editprice?id=').$before['product']->id; ?>">Price</a></li>
<!--<li><a href="<?php echo site_url('site/viewproductimage?id=').$before['product']->id; ?>">Image</a></li>-->
<li><a href="<?php echo site_url('site/viewproductimage?id=').$before['product']->id; ?>">Image</a></li>
<li><a href="<?php echo site_url('site/editrelatedproducts?id=').$before['product']->id; ?>">Same Colour</a></li>
<li><a href="<?php echo site_url('site/viewproductwaiting?id=').$before['product']->id; ?>">Product Wating</a></li>
</ul>
</div>
</section>