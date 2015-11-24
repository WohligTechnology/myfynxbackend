<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class sizechart_model extends CI_Model
{
	//sizechart
	public function createsizechart($name,$image)
	{
		$data  = array(
			'name' => $name,
			'image' => $image
		);
		$query=$this->db->insert( 'sizechart', $data );
		return  1;
	}
	function viewsizechart()
	{
		$query=$this->db->query("SELECT `sizechart`.`id`,`sizechart`.`order`,`sizechart`.`title`,`sizechart`.`image`,`sizechart`.`status` FROM `sizechart` 
		ORDER BY `sizechart`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditsizechart( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'sizechart' )->row();
		return $query;
	}
	
	public function editsizechart($id,$name,$image)
	{
		$data = array(
		'name' => $name,
        'image' => $image
			
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'sizechart', $data );
		return 1;
	}

	function deletesizechart($id)
	{
		$query=$this->db->query("DELETE FROM `sizechart` WHERE `id`='$id'");
	}
    function getsizechartlogobyid($id){
		$query=$this->db->query("SELECT `image` FROM `sizechart` WHERE `id`='$id'")->row();
		return $query;
    }
  
    public function getsizechartdropdown()
    {
        $query = $this->db->query('SELECT * FROM `sizechart`  ORDER BY `id` ASC')->result();
        $return=array(
		"" => "Choose Sizechart"
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