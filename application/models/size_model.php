<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class size_model extends CI_Model
{
	//size
	public function createsize($name)
	{
		$data  = array(
			'name' => $name,
		);
		$query=$this->db->insert( 'size', $data );
		return  1;
	}
	function viewsize()
	{
		$query=$this->db->query("SELECT `size`.`id`,`size`.`order`,`size`.`title`,`size`.`image`,`size`.`status` FROM `size` 
		ORDER BY `size`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditsize( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'size' )->row();
		return $query;
	}
	
	public function editsize($id,$name)
	{
		$data = array(
		'name' => $name,
			
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'size', $data );
		return 1;
	}

	function deletesize($id)
	{
		$query=$this->db->query("DELETE FROM `size` WHERE `id`='$id'");
	}
    function getsizelogobyid($id){
		$query=$this->db->query("SELECT `image` FROM `size` WHERE `id`='$id'")->row();
		return $query;
    }
  
    public function getsizedropdown()
    {
        $query = $this->db->query('SELECT * FROM `size`  ORDER BY `id` ASC')->result();
        $return=array(
		"" => "Choose Size"
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