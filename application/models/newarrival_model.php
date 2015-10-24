<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class newarrival_model extends CI_Model
{
    public function create($product,$type)
	{
		$data  = array(
			'product' => $product,
			'type' => $type
		);
		$query=$this->db->insert( 'newarrival', $data );
		return  1;
	}
	function viewnewarrival()
	{
		$query=$this->db->query("SELECT `newarrival`.`id` AS `newarrivalid`,`newarrival`.`product`,`newarrival`.`type`,`product`.`name` FROM `newarrival` LEFT OUTER JOIN `product` ON `product`.`id`=`newarrival`.`product` 
		ORDER BY `newarrival`.`id` ASC")->result();
//        print_r($query);
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'newarrival' )->row();
		return $query;
	}
	
	public function edit( $id,$product,$type)
	{
		$data = array(
			'product' => $product,
			'type' => $type
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'newarrival', $data );
		return 1;
	}
	function deletenewarrival($id)
	{
		$query=$this->db->query("DELETE FROM `newarrival` WHERE `id`='$id'");
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