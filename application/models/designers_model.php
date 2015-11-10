<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class designers_model extends CI_Model
{
	//designers
	public function createdesigners($name,$email,$location)
	{
		$data  = array(
			'name' => $name,
			'email' => $email,
			'location' => $location
		);
		$query=$this->db->insert( 'designers', $data );
		return  1;
	}
	function viewdesigners()
	{
		$query=$this->db->query("SELECT `designers`.`id`,`designers`.`order`,`designers`.`title`,`designers`.`image`,`designers`.`status` FROM `designers` 
		ORDER BY `designers`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditdesigners( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'designers' )->row();
		return $query;
	}
	
	public function editdesigners($id,$name,$email,$location)
	{
		$data = array(
		'name' => $name,
			'email' => $email,
			'location' => $location
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'designers', $data );
		return 1;
	}

	function deletedesigners($id)
	{
		$query=$this->db->query("DELETE FROM `designers` WHERE `id`='$id'");
	}
    function getdesignerslogobyid($id){
		$query=$this->db->query("SELECT `image` FROM `designers` WHERE `id`='$id'")->row();
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
    public function getdesignerdropdown()
    {
        $query = $this->db->query('SELECT * FROM `designers`  ORDER BY `id` ASC')->result();
        foreach ($query as $row) {
            $return[$row->id] = $row->name;
        }

        return $return;
    }
    public function designcount($id){
     $query1=$this->db->query("SELECT COUNT(*) as `count` FROM `designs` WHERE `fromuser`=$id")->row();
        $designscount=$query1->count;
    }
 
    
}
?>