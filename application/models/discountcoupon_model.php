<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class discountcoupon_model extends CI_Model
{
	//discountcoupon
	public function creatediscountcoupon($coupontype,$discountpercent,$discountamount,$minamount,$xproducts,$yproducts,$couponcode,$product)
	{
		$data  = array(
			'coupontype' => $coupontype,
			'discountpercent' => $discountpercent,
			'discountamount' => $discountamount,
			'minamount' => $minamount,
			'xproducts' => $xproducts,
			'yproducts' => $yproducts,
			'couponcode' => $couponcode,
			
		);
		$query=$this->db->insert( 'discountcoupon', $data );
		$id=$this->db->insert_id();
		if(!empty($product))
		{
			foreach($product as $key => $coun)
			{
				$data1  = array(
					'discountcoupon' => $id,
					'product' => $coun,
				);
				$query=$this->db->insert( 'discountproducts', $data1 );
			}
		}
		return  1;
	}
	function viewdiscountcoupon()
	{
		$query=$this->db->query("SELECT `discountcoupon`.`id`,`coupontype`.`name` as `coupontype`,`discountcoupon`.`couponcode`,`discountcoupon`.`coupontype` as `coupontypeid` FROM `discountcoupon` 
		INNER JOIN  `coupontype` ON  `coupontype`.`id`=`discountcoupon`.`coupontype`
		ORDER BY `discountcoupon`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditdiscountcoupon( $id )
	{
		$this->db->where( 'id', $id );
		$query['dc']=$this->db->get( 'discountcoupon' )->row();
		$discountproducts=$this->db->query("SELECT `product` FROM `discountproducts` WHERE `discountproducts`.`discountcoupon`='$id'")->result();
		$query['dcproducts']=array();
		foreach($discountproducts as $pro)
		{
			$query['dcproducts'][]=$pro->product;
		}
		return $query;
	}
	
	public function editdiscountcoupon( $id,$coupontype,$discountpercent,$discountamount,$minamount,$xproducts,$yproducts,$couponcode,$product)
	{
		$data = array(
			'coupontype' => $coupontype,
			'discountpercent' => $discountpercent,
			'discountamount' => $discountamount,
			'minamount' => $minamount,
			'xproducts' => $xproducts,
			'yproducts' => $yproducts,
			'couponcode' => $couponcode,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'discountcoupon', $data );
		
		$this->db->query("DELETE FROM `discountproducts` WHERE `discountcoupon`='$id'");
		
		if(!empty($product))
		{
			foreach($product as $key => $coun)
			{
				$data1  = array(
					'discountcoupon' => $id,
					'product' => $coun,
				);
				$query=$this->db->insert( 'discountproducts', $data1 );
			}
		}
		return 1;
	}
	function deletediscountcoupon($id)
	{
		$query=$this->db->query("DELETE FROM `discountcoupon` WHERE `id`='$id'");
		$this->db->query("DELETE FROM `discountproducts` WHERE `discountcoupon`='$id'");
	}
	public function getdiscountcoupondropdown()
	{
		$query=$this->db->query("SELECT * FROM `discountcoupon`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	public function getcoupontype()
	{
		$query=$this->db->query("SELECT * FROM `coupontype`  ORDER BY `name` ASC")->result();
		$return=array(
		
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
	public function getproducts()
	{
		$query=$this->db->query("SELECT * FROM `product`  ORDER BY `name` ASC")->result();
		$return=array(
		
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>