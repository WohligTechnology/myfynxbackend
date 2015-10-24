<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class productimage_model extends CI_Model
{
	//topic
	public function create($product,$image,$order,$isdefault)
	{
		$data  = array(
			'product' => $product,
			'order' => $order,
			'is_default' => $isdefault,
			'image' => $image
		);
		$query=$this->db->insert( 'productimage', $data );
		
		return  1;
	}
	function viewproductimagebyproduct($id)
	{
		$query="SELECT `productimage`.`id`,`productimage`.`product`, `productimage`.`image`, `product`.`name` AS `productname`
        FROM `productimage` LEFT OUTER JOIN `product` ON `product`.`id`=`productimage`.`product` WHERE `productimage`.`product`='$id'";
        $result=$this->db->query($query)->result();
        
        return $result;
        
//		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'productimage' )->row();
		return $query;
	}
    
	public function getproductimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `productimage` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function edit( $id,$product,$image,$order,$isdefault)
	{
		$data = array(
			'product' => $product,
			'order' => $order,
			'is_default' => $isdefault,
			'image' => $image
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'productimage', $data );
		
		return 1;
	}
	function deleteproductimage($id)
	{
		$query=$this->db->query("DELETE FROM `productimage` WHERE `id`='$id'");
		
	}
    
     public function getproductdropdown()
	{
		$query=$this->db->query("SELECT * FROM `product`  ORDER BY `id` ASC")->result();
		$return=array();
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
    
	public function getisdefaultdropdown()
	{
		$isdefault= array(
			 "0" => "No",
			 "1" => "Yes"
			);
		return $isdefault;
	}
}
?>