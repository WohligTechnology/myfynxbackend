<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class subcategory_model extends CI_Model
{
	//category
	public function createsubcategory($name,$category,$status,$order,$image1,$image2)
	{
		$data  = array(
			'name' => $name,
			'category' => $category,
			'status' => $status,
			'order' => $order,
			'image1' => $image1,
			'image2' => $image2,
		);
		$query=$this->db->insert( 'subcategory', $data );
		if($query)
		{
                return  1;
		}
		
	}
	function viewsubcategory()
	{
		$query=$this->db->query("SELECT `subcategory`.`id`, `subcategory`.`name`, `category`.`name` as `category`, `subcategory`.`status`, `subcategory`.`order`, `subcategory`.`image1`, `subcategory`.`image2` FROM `subcategory` LEFT OUTER JOIN `category` ON `category`.`id`=`subcategory`.`category`
		ORDER BY `subcategory`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditsubcategory( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'subcategory' )->row();
		return $query;
	}
	
	public function editsubcategory($id,$name,$category,$status,$order,$image1,$image2)
	{
		$data = array(
			'name' => $name,
			'category' => $category,
			'status' => $status,
			'order' => $order,
		
		);
		if($image1 != "")
			$data['image1']=$image1;
		if($image2 != "")
			$data['image2']=$image2;
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'subcategory', $data );
		if($query)
		{
			return  1;
		}
	}
    public function getsubcategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `subcategory`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	function deletesubcategory($id)
	{
		$query=$this->db->query("DELETE FROM `subcategory` WHERE `id`='$id'");
		if($query)
		{
			return $query;
		}
	}
	
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
	function savelog($id,$action)
	{
		$user = $this->session->userdata('id');
		$data2  = array(
			' subcategory' => $id,
			'user' => $user,
			'action' => $action,
		);
		$query2=$this->db->insert( 'subcategorylog', $data2 );
	}
}
?>