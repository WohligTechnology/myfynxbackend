<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Cart_model extends CI_Model
{
	public function cartsubmit($user,$product,$quantity)
	{
		$data  = array(
			'user' => $user,
			'product' => $product,
			'quantity' => $quantity,
		);
		
		$this->db->insert( 'user', $data );
		return 1;
	}
	public function viewcart()
	{
		$query="SELECT `user`.`name` as `name`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`product`.`name` as `product`,`usercart`.`timestamp` as `timestamp`,`usercart`.`quantity` FROM `usercart`
		LEFT JOIN `user` ON `user`.`id` = `usercart`.`user`
		INNER JOIN `product` ON `usercart`.`product` = `product`.`id`		
		ORDER BY `usercart`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	public function viewusercart($user)
	{
		$query="SELECT `user`.`name` as `name`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`product`.`name` as `product`,`usercart`.`timestamp` as `timestamp`,`usercart`.`quantity` FROM `usercart`
		INNER JOIN `user` ON `user`.`id` = `usercart`.`user` AND `usercart`.`user`='$user'
		INNER JOIN `product` ON `usercart`.`product` = `product`.`id`		
		ORDER BY `usercart`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
}
?>