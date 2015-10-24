<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Bloggerscorner_model extends CI_Model
{
	//bloggerscorner
	public function createbloggerscorner($name,$link,$target,$status,$order,$image)
	{
		$data  = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			'order' => $order,
			'image' => $image,
		);
		$query=$this->db->insert( 'bloggerscorner', $data );
		return  1;
	}
	function viewbloggerscorner()
	{
		$query=$this->db->query("SELECT `bloggerscorner`.`id`,`bloggerscorner`.`name`,`bloggerscorner`.`link`,`bloggerscorner`.`target`,`bloggerscorner`.`image`,`bloggerscorner`.`order` FROM `bloggerscorner` 
		ORDER BY `bloggerscorner`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditbloggerscorner( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'bloggerscorner' )->row();
		return $query;
	}
	
	public function editbloggerscorner( $id,$name,$link,$target,$status,$order,$image)
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
		$this->db->update( 'bloggerscorner', $data );
		return 1;
	}
	function deletebloggerscorner($id)
	{
		$this->load->helper("file");
		$this->load->helper("url");
		$q = $this->db->query("SELECT `image` FROM `bloggerscorner` WHERE `id`='$id'")->row();
		if($q->image != "")
		{
			
			unlink("uploads/".$q->image);
		}
		$query=$this->db->query("DELETE FROM `bloggerscorner` WHERE `id`='$id'");
	}
	public function getbloggerscornerdropdown()
	{
		$query=$this->db->query("SELECT * FROM `bloggerscorner`  ORDER BY `id` ASC")->result();
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