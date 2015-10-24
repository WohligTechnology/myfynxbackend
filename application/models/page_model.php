<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class page_model extends CI_Model
{
	//page
	public function createpage($name,$content)
	{
		$data  = array(
			'name' => $name,
			'content' => $content,
		);
		$query=$this->db->insert( 'page', $data );
		return  1;
	}
	function viewpage()
	{
		$query=$this->db->query("SELECT `page`.`id`,`page`.`name`,`page`.`content` FROM `page` 
		ORDER BY `page`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditpage( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'page' )->row();
		return $query;
	}
	
	public function editpage( $id,$name,$content)
	{
		$data = array(
			'name' => $name,
			'content' => $content,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'page', $data );
		return 1;
	}
	function deletepage($id)
	{
		$query=$this->db->query("DELETE FROM `page` WHERE `id`='$id'");
	}
	public function getpagedropdown()
	{
		$query=$this->db->query("SELECT * FROM `page`  ORDER BY `id` ASC")->result();
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