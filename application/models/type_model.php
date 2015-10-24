<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class type_model extends CI_Model
{
	//type
	public function createtype($name)
	{
		$data  = array(
			'name' => $name
		);
		$query=$this->db->insert( 'type', $data );
		return  1;
	}
	function viewtype()
	{
		$query=$this->db->query("SELECT `type`.`id`,`type`.`name` FROM `type` 
		ORDER BY `type`.`id` ASC")->result();
		return $query;
	}
	public function beforeedittype( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'type' )->row();
		return $query;
	}
	
	public function edittype( $id,$name)
	{
		$data = array(
			'name' => $name
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'type', $data );
		return 1;
	}
	function deletetype($id)
	{
		$query=$this->db->query("DELETE FROM `type` WHERE `id`='$id'");
	}
	public function gettypedropdown()
	{
		$query=$this->db->query("SELECT * FROM `type`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>