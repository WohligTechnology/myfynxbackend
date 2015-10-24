<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Enquiry_model extends CI_Model
{
	//enquiry
	public function createenquiry($name,$category,$area,$phone,$email,$jsoncolumn,$jsonvalue)
	{
		$json=array();
		if($jsoncolumn != "" && $jsoncolumn != "")
		{
			foreach($jsoncolumn as $key => $jsoncolumn)
			{
				if($jsoncolumn != "" && $jsonvalue[$key] != "")
					$json[$jsoncolumn] = $jsonvalue[$key];
			}
		}
		$data  = array(
			'name' => $name,
			'area' => $area,
			'contact' => $phone,
			'email' => $email,
			'category' => $category,
			'json' => json_encode($json),
		);
		
		$query=$this->db->insert( 'enquiry', $data );
		
		return  1;
	}
	function viewenquiry()
	{
		$query=$this->db->query("SELECT `enquiry`.`id`,`enquiry`.`name`,`enquiry`.`email`,`enquiry`.`contact`,`area`.`name` as `area`,`category`.`name` as `category` FROM `enquiry` 
		INNER JOIN `area` ON `enquiry`.`area`=`area`.`id`
		INNER JOIN `category` ON `enquiry`.`category`=`category`.`id`
		ORDER BY `enquiry`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditenquiry( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'enquiry' )->row();
		
		return $query;
	}
	
	public function editenquiry( $id,$name,$category,$area,$phone,$address,$email,$featured,$description)
	{
		$json=array();
		if($jsoncolumn != "" && $jsoncolumn != "")
		{
			foreach($jsoncolumn as $key => $jsoncolumn)
			{
				if($jsoncolumn != "" && $jsonvalue[$key] != "")
					$json[$jsoncolumn] = $jsonvalue[$key];
			}
		}
		$data  = array(
			'name' => $name,
			'area' => $area,
			'contact' => $phone,
			'email' => $email,
			'category' => $category,
			'json' => json_encode($json),
		);
		
		$this->db->where( 'id', $id );
		$this->db->update( 'enquiry', $data );
		
		return 1;
	}
	function deleteenquiry($id)
	{
		$query=$this->db->query("DELETE FROM `enquiry` WHERE `id`='$id'");
	}
	
	
}
?>