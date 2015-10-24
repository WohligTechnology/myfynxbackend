<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class brand_model extends CI_Model
{
	//brand
	public function createbrand($name,$order,$logo,$isdistributer)
	{
		$data  = array(
			'name' => $name,
			'order' => $order,
			'logo' => $logo,
            'isdistributer' => $isdistributer
		);
		$query=$this->db->insert( 'brand', $data );
		return  1;
	}
	function viewbrand()
	{
		$query=$this->db->query("SELECT `brand`.`id`,`brand`.`name`,`brand`.`order` FROM `brand` 
		ORDER BY `brand`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditbrand( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'brand' )->row();
		return $query;
	}
	
	public function editbrand( $id,$name,$order,$logo,$isdistributer)
	{
		$data = array(
			'name' => $name,
			'order' => $order,
			'logo' => $logo,
            'isdistributer' => $isdistributer
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'brand', $data );
		return 1;
	}
    public function getdistributerdropdown()
	{
		$isdistributer = array(
			'0' => "No",
			'1' => "Yes"
		);
		return $isdistributer;
	}
	function deletebrand($id)
	{
		$query=$this->db->query("DELETE FROM `brand` WHERE `id`='$id'");
	}
	public function getbranddropdown()
	{
		$query=$this->db->query("SELECT * FROM `brand`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    public function getbrandbyproduct($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`product`,`brand` FROM `productbrand`  WHERE `product`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->brand;
            }
        }
         return $return;
         
		
	}
    
	public function getbrandlogobyid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `brand` WHERE `id`='$id'")->row();
		return $query;
	}
    
	public function gettypedropdown()
	{
		$query=$this->db->query("SELECT * FROM `type`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
    public function gettypebyproduct($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`product`,`type` FROM `producttype`  WHERE `product`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->type;
            }
        }
         return $return;
         
		
	}
    
}
?>