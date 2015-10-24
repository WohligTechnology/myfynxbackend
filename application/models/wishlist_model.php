<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Wishlist_model extends CI_Model
{
	public function wishlistsubmit($user,$product)
	{
		$data  = array(
			'user' => $user,
			'product' => $product,
			
		);
		
		$this->db->insert( 'user', $data );
		return 1;
	}
	public function viewwishlist()
	{
		$query="SELECT `user`.`name` as `name`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`product`.`name` as `product`,`userwishlist`.`timestamp` as `timestamp` FROM `userwishlist`
		LEFT JOIN `user` ON `user`.`id` = `userwishlist`.`user`
		INNER JOIN `product` ON `userwishlist`.`product` = `product`.`id`		
		ORDER BY `userwishlist`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
	public function viewuserwishlist($user)
	{
		$query="SELECT `user`.`name` as `name`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`product`.`name` as `product`,`userwishlist`.`timestamp` as `timestamp` FROM `userwishlist`
		INNER JOIN `user` ON `user`.`id` = `userwishlist`.`user` AND `userwishlist`.`user`='$user'
		INNER JOIN `product` ON `userwishlist`.`product` = `product`.`id`		
		ORDER BY `userwishlist`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
        public function showwishlist($user)
	{
		$query="SELECT distinct `userwishlist`.`user`,`userwishlist`.`product`,`product`.`id`,`product`.`name`,`product`.`sku`,`product`.`description`,`product`.`url`,
`product`.`price`,`product`.`wholesaleprice`, `product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`productimage`.`image` FROM `userwishlist` 
INNER JOIN `product` ON `product`.`id`=`userwishlist`.`product` 
LEFT JOIN `productimage` ON `productimage`.`product`=`product`.`id`  WHERE `userwishlist`.`user`='$user' GROUP BY `product`.`id`";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
}
?>