<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class aboutus_model extends CI_Model
{
	//aboutus
	public function createaboutus($order,$image,$status,$title)
	{
		$data  = array(
			'order' => $order,
			'image' => $image,
            'status' => $status,
            'title' => $title
		);
		$query=$this->db->insert( 'about', $data );
		return  1;
	}
	function viewaboutus()
	{
		$query=$this->db->query("SELECT `about`.`id`,`about`.`order`,`about`.`title`,`about`.`image`,`about`.`status` FROM `about` 
		ORDER BY `about`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditaboutus( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'about' )->row();
		return $query;
	}
	
	public function editaboutus($id,$order,$image,$status,$title)
	{
		$data = array(
		'order' => $order,
			'image' => $image,
            'status' => $status,
            'title' => $title
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'about', $data );
		return 1;
	}

	function deleteaboutus($id)
	{
		$query=$this->db->query("DELETE FROM `about` WHERE `id`='$id'");
	}
    function getaboutuslogobyid($id){
		$query=$this->db->query("SELECT `image` FROM `about` WHERE `id`='$id'")->row();
		return $query;
    }

 
    
}
?>