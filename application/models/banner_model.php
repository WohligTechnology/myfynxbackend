<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Banner_model extends CI_Model
{
	//banner1
	public function createbanner1($name,$link,$target,$status,$fromdate,$todate,$image)
	{
		$data  = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			'image' => $image,
			'fromdate' => $fromdate,
			'todate' => $todate,
		);
		$query=$this->db->insert( 'banner1', $data );
		return  1;
	}
	function viewbanner1()
	{
		$query=$this->db->query("SELECT `banner1`.`id`,`banner1`.`name`,`banner1`.`link`,`banner1`.`target`,`banner1`.`fromdate`,`banner1`.`todate`,`banner1`.`image` FROM `banner1` 
		ORDER BY `banner1`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditbanner1( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'banner1' )->row();
		return $query;
	}
	
	public function editbanner1( $id,$name,$link,$target,$status,$fromdate,$todate,$image)
	{
		$data = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			'fromdate' => $fromdate,
			'todate' => $todate,
		);
		if($image != "")
			$data['image']=$image;
		$this->db->where( 'id', $id );
		$this->db->update( 'banner1', $data );
		return 1;
	}
	function deletebanner1($id)
	{
		$this->load->helper("file");
		$this->load->helper("url");
		$q = $this->db->query("SELECT `image` FROM `banner1` WHERE `id`='$id'")->row();
		if($q->image != "")
		{
			
			unlink("uploads/".$q->image);
		}
		$query=$this->db->query("DELETE FROM `banner1` WHERE `id`='$id'");
	}
	public function getbanner1dropdown()
	{
		$query=$this->db->query("SELECT * FROM `banner1`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	//banner2
	public function createbanner2($name,$link,$target,$status,$fromdate,$todate,$image)
	{
		$data  = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			
			'image' => $image,
			'fromdate' => $fromdate,
			'todate' => $todate,
		);
		$query=$this->db->insert( 'banner2', $data );
		return  1;
	}
	function viewbanner2()
	{
		$query=$this->db->query("SELECT `banner2`.`id`,`banner2`.`name`,`banner2`.`link`,`banner2`.`target`,`banner2`.`fromdate`,`banner2`.`todate`,`banner2`.`image` FROM `banner2` 
		ORDER BY `banner2`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditbanner2( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'banner2' )->row();
		return $query;
	}
	
	public function editbanner2( $id,$name,$link,$target,$status,$order,$fromdate,$todate,$image)
	{
		$data = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			
			'fromdate' => $fromdate,
			'todate' => $todate,
		);
		if($image != "")
			$data['image']=$image;
		$this->db->where( 'id', $id );
		$this->db->update( 'banner2', $data );
		return 1;
	}
	function deletebanner2($id)
	{
		$this->load->helper("file");
		$this->load->helper("url");
		$q = $this->db->query("SELECT `image` FROM `banner2` WHERE `id`='$id'")->row();
		if($q->image != "")
		{
			
			unlink("uploads/".$q->image);
		}
		$query=$this->db->query("DELETE FROM `banner2` WHERE `id`='$id'");
	}
	public function getbanner2dropdown()
	{
		$query=$this->db->query("SELECT * FROM `banner2`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	//banner3
	public function createbanner3($name,$link,$target,$status,$order,$fromdate,$todate,$image)
	{
		$data  = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			
			'image' => $image,
			'fromdate' => $fromdate,
			'todate' => $todate,
		);
		$query=$this->db->insert( 'banner3', $data );
		return  1;
	}
	function viewbanner3()
	{
		$query=$this->db->query("SELECT `banner3`.`id`,`banner3`.`name`,`banner3`.`link`,`banner3`.`target`,`banner3`.`fromdate`,`banner3`.`todate`,`banner3`.`image` FROM `banner3` 
		ORDER BY `banner3`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditbanner3( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'banner3' )->row();
		return $query;
	}
	
	public function editbanner3( $id,$name,$link,$target,$status,$order,$fromdate,$todate,$image)
	{
		$data = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			
			'fromdate' => $fromdate,
			'todate' => $todate,
		);
		if($image != "")
			$data['image']=$image;
		$this->db->where( 'id', $id );
		$this->db->update( 'banner3', $data );
		return 1;
	}
	function deletebanner3($id)
	{
		$this->load->helper("file");
		$this->load->helper("url");
		$q = $this->db->query("SELECT `image` FROM `banner3` WHERE `id`='$id'")->row();
		if($q->image != "")
		{
			
			unlink("uploads/".$q->image);
		}
		$query=$this->db->query("DELETE FROM `banner3` WHERE `id`='$id'");
	}
	public function getbanner3dropdown()
	{
		$query=$this->db->query("SELECT * FROM `banner3`  ORDER BY `id` ASC")->result();
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