<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class config_model extends CI_Model
{
//	//config
//	public function createconfig($fromuser,$image,$status)
//	{
//		$data  = array(
//			'fromuser' => $fromuser,
//			'image' => $image,
//            'timestamp' => $timestamp,
//            'status' => $status
//		);
//		$query=$this->db->insert( 'config', $data );
//		return  1;
//	}
//	function viewconfig()
//	{
//		$query=$this->db->query("SELECT `config`.`id`,`config`.`order`,`config`.`title`,`config`.`image`,`config`.`status` FROM `config` 
//		ORDER BY `config`.`id` ASC")->result();
//		return $query;
//	}
	public function beforeeditconfig( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'config' )->row();
		return $query;
	}
	
	public function editconfig($id,$text,$content)
	{
		$data = array(
		'text' => $text,
			'content' => $content
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'config', $data );
		return 1;
	}

	function deleteconfig($id)
	{
		$query=$this->db->query("DELETE FROM `config` WHERE `id`='$id'");
	}
    function getremainingproducts()
	{
		$query=$this->db->query("SELECT * FROM `config` WHERE `id`='1'")->row();
        $remainingproduct=$query->text;
        return $remainingproduct;
	}
    
}
?>