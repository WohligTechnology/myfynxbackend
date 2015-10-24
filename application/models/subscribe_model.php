<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class subscribe_model extends CI_Model
{
	//subscribe
	public function createsubscribe($email)
	{
		$data  = array(
			'email' => $email,
            'timestamp' => $timestamp
		);
		$query=$this->db->insert( 'subscribe', $data );
		return  1;
	}
	function viewsubscribe()
	{
		$query=$this->db->query("SELECT `subscribe`.`id`,`subscribe`.`email`,`subscribe`.`timestamp` FROM `subscribe` 
		ORDER BY `subscribe`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditsubscribe( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'subscribe' )->row();
		return $query;
	}
	
	public function editsubscribe($id,$email,$timestamp)
	{
		$data = array(
			'email' => $email,
			'timestamp' => $timestamp
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'subscribe', $data );
		return 1;
	}

	function deletesubscribe($id)
	{
		$query=$this->db->query("DELETE FROM `subscribe` WHERE `id`='$id'");
	}
	
  
}
?>