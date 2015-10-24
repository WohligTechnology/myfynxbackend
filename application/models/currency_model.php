<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Currency_model extends CI_Model
{
	//currency
	public function createcurrency($name,$isdefault,$conversionrate,$country)
	{
		$data  = array(
			'name' => $name,
			'isdefault' => $isdefault,
			'conversionrate' => $conversionrate,
		);
		$query=$this->db->insert( 'currency', $data );
		$id=$this->db->insert_id();
		if(!empty($country))
		{
			foreach($country as $key => $coun)
			{
				$data1  = array(
					'currency' => $id,
					'country' => $coun,
				);
				$query=$this->db->insert( 'currency_country', $data1 );
			}
		}
		return  1;
	}
	function viewcurrency()
	{
		$query=$this->db->query("SELECT `currency`.`id`,`currency`.`name`,`currency`.`conversionrate`,`currency`.`isdefault` FROM `currency` 
		ORDER BY `currency`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditcurrency( $id )
	{
		$this->db->where( 'id', $id );
		$query['currency']=$this->db->get( 'currency' )->row();
		$currency_country=$this->db->query("SELECT `country` FROM `currency_country` WHERE `currency_country`.`currency`='$id'")->result();
		$query['currency_country']=array();
		foreach($currency_country as $cout)
		{
			$query['currency_country'][]=$cout->country;
		}
		return $query;
	}
	
	public function editcurrency( $id,$name,$isdefault,$conversionrate,$country)
	{
		$data = array(
			'name' => $name,
			'isdefault' => $isdefault,
			'conversionrate' => $conversionrate,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'currency', $data );
		
		$this->db->query("DELETE FROM `currency_country` WHERE `currency`='$id'");
		
		if(!empty($country))
		{
			foreach($country as $key => $coun)
			{
				$data1  = array(
					'currency' => $id,
					'country' => $coun,
				);
				$query=$this->db->insert( 'currency_country', $data1 );
			}
		}
		return 1;
	}
	function deletecurrency($id)
	{
		$query=$this->db->query("DELETE FROM `currency` WHERE `id`='$id'");
		$this->db->query("DELETE FROM `currency_country` WHERE `currency`='$id'");
	}
	public function getcurrencydropdown()
	{
		$query=$this->db->query("SELECT * FROM `currency`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
	public function getisdefault()
	{
		$status= array(
			 "1" => "Yes",
			 "0" => "No",
			);
		return $status;
	}
	public function getcountry()
	{
		$query=$this->db->query("SELECT * FROM `country`  ORDER BY `name` ASC")->result();
		$return=array(
		
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>