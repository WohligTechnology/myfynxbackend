<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Celebcorner_model extends CI_Model
{
	//celebcorner
	public function createcelebcorner($name,$link,$target,$status,$order,$image)
	{
		$data  = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			'order' => $order,
			'image' => $image,
		);
		$query=$this->db->insert( 'celebcorner', $data );
		return  1;
	}
	function viewcelebcorner()
	{
		$query=$this->db->query("SELECT `celebcorner`.`id`,`celebcorner`.`name`,`celebcorner`.`link`,`celebcorner`.`target`,`celebcorner`.`image`,`celebcorner`.`order` FROM `celebcorner` 
		ORDER BY `celebcorner`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditcelebcorner( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'celebcorner' )->row();
		return $query;
	}
	
	public function editcelebcorner( $id,$name,$link,$target,$status,$order,$image)
	{
		$data = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			'order' => $order,
		);
		if($image != "")
			$data['image']=$image;
		$this->db->where( 'id', $id );
		$this->db->update( 'celebcorner', $data );
		return 1;
	}
	function deletecelebcorner($id)
	{
		$this->load->helper("file");
		$this->load->helper("url");
		$q = $this->db->query("SELECT `image` FROM `celebcorner` WHERE `id`='$id'")->row();
		if($q->image != "")
		{
			
			unlink("uploads/".$q->image);
		}
		$query=$this->db->query("DELETE FROM `celebcorner` WHERE `id`='$id'");
	}
	public function getcelebcornerdropdown()
	{
		$query=$this->db->query("SELECT * FROM `celebcorner`  ORDER BY `id` ASC")->result();
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