<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Offer_model extends CI_Model
{
	//offer
	public function createoffer($title,$description,$price,$startdate,$enddate,$status,$image)
	{
		$data  = array(
			'title' => $title,
			'description' => $description,
			'price' => $price,
			'startdate' => $startdate,
			'enddate' => $enddate,
			'image' => $image,
			'status' => $status
		);
		$query=$this->db->insert( 'offer', $data );
		return  1;
	}
	function viewoffer()
	{
		$query=$this->db->query("SELECT `offer`.`id`,`offer`.`name`,`offer`.`product`,`offer`.`image`,`offer`.`order` FROM `offer` 
		ORDER BY `offer`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditoffer( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'offer' )->row();
		return $query;
	}
	
	public function editoffer($id,$title,$description,$price,$startdate,$enddate,$status,$image)
	{
		$data  = array(
			'title' => $title,
			'description' => $description,
			'price' => $price,
			'startdate' => $startdate,
			'enddate' => $enddate,
			'image' => $image,
			'status' => $status
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'offer', $data );
		return 1;
	}
	function deleteoffer($id)
	{
		$q = $this->db->query("DELETE FROM `offer` WHERE `id`='$id'");
        return 1;
	}
	public function getofferdropdown()
	{
		$query=$this->db->query("SELECT * FROM `offer`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->title;
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
    
	public function getofferimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `offer` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>