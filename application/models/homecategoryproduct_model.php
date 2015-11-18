<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class homecategoryproduct_model extends CI_Model
{
    public function create($product,$subcategory,$order)
	{
		$data  = array(
			'product' => $product,
			'order' => $order,
			'subcategory' => $subcategory
		);
		$query=$this->db->insert( 'homecategoryproduct', $data );
		return  1;
	}
	function viewhomecategoryproduct()
	{
		$query=$this->db->query("SELECT `homecategoryproduct`.`id` AS `homecategoryproductid`,`homecategoryproduct`.`product` as `product`,`product`.`name`,`homecategoryproduct`.`order` as `order`,`homecategoryproduct`.`subcategory`,`subcategory`.`name` as `subcategoryname` FROM `homecategoryproduct` LEFT OUTER JOIN `product` ON `product`.`id`=`homecategoryproduct`.`product`
        LEFT OUTER JOIN `subcategory` ON `subcategory`.`id`=`homecategoryproduct`.`subcategory` 
		ORDER BY homecategoryproductid ASC")->result();
//        print_r($query);
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'homecategoryproduct' )->row();
		return $query;
	}
	
	public function edit($id,$product,$subcategory,$order)
	{
		$data = array(
			'product' => $product,
			'order' => $order,
			'subcategory' => $subcategory
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'homecategoryproduct', $data );
		return 1;
	}
	function deletehomecategoryproduct($id)
	{
		$query=$this->db->query("DELETE FROM `homecategoryproduct` WHERE `id`='$id'");
	}
    function gettypedropdown(){
    $type= array(
			 "1" => "Exclusive",
			 "2" => "New Arrival",
			 "3" => "Both"
			);
		return $type;
    }
	
}
?>