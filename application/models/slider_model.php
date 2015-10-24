<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Slider_model extends CI_Model
{
	//slider
	public function createslider($name,$status,$order,$product,$image)
	{
		$data  = array(
			'name' => $name,
			'status' => $status,
			'order' => $order,
			'image' => $image,
			'product' => $product
		);
		$query=$this->db->insert( 'slider', $data );
		return  1;
	}
	function viewslider()
	{
		$query=$this->db->query("SELECT `slider`.`id`,`slider`.`name`,`slider`.`product`,`slider`.`image`,`slider`.`order` FROM `slider` 
		ORDER BY `slider`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditslider( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'slider' )->row();
		return $query;
	}
	
	public function editslider( $id,$name,$status,$order,$product,$image)
	{
		$data = array(
			'name' => $name,
			'status' => $status,
			'order' => $order,
			'product' => $product
		);
		if($image != "")
			$data['image']=$image;
		$this->db->where( 'id', $id );
		$this->db->update( 'slider', $data );
		return 1;
	}
	function deleteslider($id)
	{
		$this->load->helper("file");
		$this->load->helper("url");
		$q = $this->db->query("SELECT `image` FROM `slider` WHERE `id`='$id'")->row();
		if($q->image != "")
		{
			
			unlink("uploads/".$q->image);
		}
		$query=$this->db->query("DELETE FROM `slider` WHERE `id`='$id'");
	}
	public function getsliderdropdown()
	{
		$query=$this->db->query("SELECT * FROM `slider`  ORDER BY `id` ASC")->result();
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
}
?>