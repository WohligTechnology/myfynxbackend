<section class="panel">

<div class="panel-body">
<ul class="nav nav-stacked">
<li><a href="<?php echo site_url('site/edituser?id=').$before->id; ?>">User Details</a></li>
<li><a href="<?php echo site_url('site/editaddress?id=').$before->id; ?>">Address</a></li>
<li><a href="<?php echo site_url('site/viewusercart?id=').$before->id; ?>">Cart</a></li>
<li><a href="<?php echo site_url('site/viewuserwishlist?id=').$before->id; ?>">Wishlist</a></li>
<li><a href="<?php echo site_url('site/addcredits?id=').$before->id; ?>">Credits</a></li>
</ul>
</div>
</section>