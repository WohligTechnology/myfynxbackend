<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class designs_model extends CI_Model
{
	//designs
	public function createdesigns($fromuser,$image,$status)
	{
		$data  = array(
			'fromuser' => $fromuser,
			'image' => $image,
            'timestamp' => $timestamp,
            'status' => $status
		);
		$query=$this->db->insert( 'designs', $data );
		return  1;
	}
	function viewdesigns()
	{
		$query=$this->db->query("SELECT `designs`.`id`,`designs`.`order`,`designs`.`title`,`designs`.`image`,`designs`.`status` FROM `designs` 
		ORDER BY `designs`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditdesigns( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'designs' )->row();
		return $query;
	}
	
	public function editdesigns($id,$fromuser,$image,$timestamp,$status)
	{
		$data = array(
		'fromuser' => $fromuser,
			'image' => $image,
            'timestamp' => $timestamp,
            'status' => $status
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'designs', $data );
		return 1;
	}

	function deletedesigns($id)
	{
		$query=$this->db->query("DELETE FROM `designs` WHERE `id`='$id'");
	}
    function getdesignslogobyid($id){
		$query=$this->db->query("SELECT `image` FROM `designs` WHERE `id`='$id'")->row();
		return $query;
    }
    public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Approved",
			 "2" => "Waiting",
			 "3" => "Reject",
			 "4" => "Publish"
			);
		return $status;
	}
    public function getdesigndropdown()
    {
        $query = $this->db->query('SELECT * FROM `designs`  ORDER BY `id` ASC')->result();
        foreach ($query as $row) {
            $return[$row->id] = $row->name;
        }

        return $return;
    }

 
    
}
?>