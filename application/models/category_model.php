<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Category_model extends CI_Model
{
	//category
	public function createcategory($name,$parent,$status,$order,$image1,$image2)
	{
		$data  = array(
			'name' => $name,
			'parent' => $parent,
			'status' => $status,
			'order' => $order,
			'image1' => $image1,
			'image2' => $image2,
		);
		$query=$this->db->insert( 'category', $data );
		if($query)
		{
			$id=$this->db->insert_id();
			$this->savelog($id,"Category Created");
		}
		return  1;
	}
	function viewcategory()
	{
		$query=$this->db->query("SELECT `category`.`id`,`category`.`name`,`tab2`.`name` as `parent`,`category`.`order` FROM `category` 
		LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`
		ORDER BY `category`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditcategory( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'category' )->row();
		return $query;
	}
	
	public function editcategory( $id,$name,$parent,$status,$order,$image1,$image2)
	{
		$data = array(
			'name' => $name,
			'parent' => $parent,
			'status' => $status,
			'order' => $order,
		
		);
		if($image1 != "")
			$data['image1']=$image1;
		if($image2 != "")
			$data['image2']=$image2;
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'category', $data );
		if($query)
		{
			$this->savelog($id,"Category Edited");
		}
		return 1;
	}
	function deletecategory($id)
	{
		$query=$this->db->query("DELETE FROM `category` WHERE `id`='$id'");
		if($query)
		{
			$this->savelog($id,"Category Deleted");
		}
	}
	public function getcategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `category`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
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
			'category' => $id,
			'user' => $user,
			'action' => $action,
		);
		$query2=$this->db->insert( 'categorylog', $data2 );
	}
}
?>