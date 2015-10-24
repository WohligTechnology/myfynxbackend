<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Locator_model extends CI_Model
{
	//city
	public function createcity($name)
	{
		$data  = array(
			'name' => $name,
		);
		$query=$this->db->insert( 'city', $data );
		return  1;
	}
	function viewcity()
	{
		$query=$this->db->query("SELECT `city`.`id`,`city`.`name` FROM `city` 
		ORDER BY `city`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditcity( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'city' )->row();
		return $query;
	}
	
	public function editcity( $id,$name)
	{
		$data = array(
			'name' => $name,
		
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'city', $data );
		return 1;
	}
	function deletecity($id)
	{
		$query=$this->db->query("DELETE FROM `city` WHERE `id`='$id'");
	}
	public function getcitydropdown()
	{
		$query=$this->db->query("SELECT * FROM `city`  ORDER BY `id` ASC")->result();
		$return=array(
		'' => ''
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	//area
	public function createarea($name,$city)
	{
		$data  = array(
			'name' => $name,
			'city' => $city,
		);
		$query=$this->db->insert( 'area', $data );
		return  1;
	}
	function viewarea()
	{
		$query=$this->db->query("SELECT `area`.`id`,`area`.`name`,`city`.`name` as `city` FROM `area` 
		INNER JOIN `city` ON `area`.`city`=`city`.`id` 
		ORDER BY `area`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditarea( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'area' )->row();
		return $query;
	}
	
	public function editarea( $id,$name,$city)
	{
		$data = array(
			'name' => $name,
			'city' => $city,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'area', $data );
		return 1;
	}
	function deletearea($id)
	{
		$query=$this->db->query("DELETE FROM `area` WHERE `id`='$id'");
	}
	public function getareadropdown()
	{
		$query=$this->db->query("SELECT * FROM `area`  ORDER BY `id` ASC")->result();
		$return=array(
		'' => ''
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>