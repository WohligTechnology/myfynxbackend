<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class color_model extends CI_Model
{
	//color
	public function createcolor($name)
	{
		$data  = array(
			'name' => $name,
		);
		$query=$this->db->insert( 'color', $data );
		return  1;
	}
	function viewcolor()
	{
		$query=$this->db->query("SELECT `color`.`id`,`color`.`order`,`color`.`title`,`color`.`image`,`color`.`status` FROM `color` 
		ORDER BY `color`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditcolor( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'color' )->row();
		return $query;
	}
	
	public function editcolor($id,$name)
	{
		$data = array(
		'name' => $name,
			
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'color', $data );
		return 1;
	}

	function deletecolor($id)
	{
		$query=$this->db->query("DELETE FROM `color` WHERE `id`='$id'");
	}
    function getcolorlogobyid($id){
		$query=$this->db->query("SELECT `image` FROM `color` WHERE `id`='$id'")->row();
		return $query;
    }
  
    public function getcolordropdown()
    {
        $query = $this->db->query('SELECT * FROM `color`  ORDER BY `id` ASC')->result();
        $return=array(
		"" => "Choose color"
		);
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