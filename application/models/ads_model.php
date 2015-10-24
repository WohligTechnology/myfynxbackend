<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Ads_model extends CI_Model
{
	//ads
	public function createads($name,$category,$area,$phone,$address,$email,$featured,$description)
	{
		$data  = array(
			'name' => $name,
			'area' => $area,
			'phone' => $phone,
			'address' => $address,
			'email' => $email,
			'featured' => $featured,
			'description' => $description,
		);
		$query=$this->db->insert( 'ads', $data );
		$ads=$this->db->insert_id();
		if(!empty($category))
		{
			foreach($category as $key => $cat)
			{
				$data  = array(
					'ads' => $ads,
					'category' => $cat,
				);
				$query=$this->db->insert( 'ads_category', $data );
			}
		}
		return  1;
	}
	function viewads()
	{
		$query=$this->db->query("SELECT `ads`.`id`,`ads`.`name`,`ads`.`email`,`ads`.`phone`,`area`.`name` as `area` FROM `ads` 
		INNER JOIN `area` ON `ads`.`area`=`area`.`id`
		ORDER BY `ads`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditads( $id )
	{
		$this->db->where( 'id', $id );
		$query['ads']=$this->db->get( 'ads' )->row();
		$ads_category=$this->db->query("SELECT `category` FROM `ads_category` WHERE `ads_category`.`ads`='$id'")->result();
		$query['ads_category']=array();
		foreach($ads_category as $cat)
		{
			$query['ads_category'][]=$cat->category;
		}
		return $query;
	}
	
	public function editads( $id,$name,$category,$area,$phone,$address,$email,$featured,$description)
	{
		$data  = array(
			'name' => $name,
			'area' => $area,
			'phone' => $phone,
			'address' => $address,
			'email' => $email,
			'featured' => $featured,
			'description' => $description,
		);
		
		$this->db->where( 'id', $id );
		$this->db->update( 'ads', $data );
		$this->db->query("DELETE FROM `ads_category` WHERE `ads`='$id'");
		if(!empty($category))
		{
			foreach($category as $key => $cat)
			{
				$data  = array(
					'ads' => $id,
					'category' => $cat,
				);
				$query=$this->db->insert( 'ads_category', $data );
			}
		}
		
		return 1;
	}
	function deleteads($id)
	{
		$query=$this->db->query("DELETE FROM `ads` WHERE `id`='$id'");
	}
	public function getadsdropdown()
	{
		$query=$this->db->query("SELECT * FROM `ads`  ORDER BY `id` ASC")->result();
		$return=array(
		'' => ''
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
}
?>