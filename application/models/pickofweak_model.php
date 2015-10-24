<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Pickofweak_model extends CI_Model
{
	//category
	public function createpickofweak($order,$image)
	{
		$data  = array(
			'order' => $order,
			'image' => $image
		);
		$query=$this->db->insert( 'pickofweak', $data );
		if($query)
		{
			$id=$this->db->insert_id();
			$this->savelog($id,"Pickofweak Created");
		}
		return  1;
	}
	function viewpickofweak()
	{
		$query=$this->db->query("SELECT `pickofweak`.`id`, `pickofweak`.`image`, `pickofweak`.`order`,`order`.`firstname` AS `firstname`,`order`.`lastname` AS `lastname`, `pickofweak`.`timestamp` FROM `pickofweak` 
		LEFT JOIN `order` ON `order`.`id`=`pickofweak`.`order`")->result();
		return $query;
	}
	public function beforeeditpickofweak( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'pickofweak' )->row();
		return $query;
	}
	
	public function editpickofweak( $id,$order,$image)
	{
		$data = array(
			'order' => $order,
			'image' => $image
		
		);
		if($image != "")
			$data['image']=$image;
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'pickofweak', $data );
		if($query)
		{
			$this->savelog($id,"Pickofweak Edited");
		}
		return 1;
	}
	function deletepickofweak($id)
	{
		$query=$this->db->query("DELETE FROM `pickofweak` WHERE `id`='$id'");
		if($query)
		{
			$this->savelog($id,"pickofweak Deleted");
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
			'category' => $id,
			'user' => $user,
			'action' => $action,
		);
		$query2=$this->db->insert( 'categorylog', $data2 );
	}
}
?>