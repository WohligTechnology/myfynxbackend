<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Paymentgateway_model extends CI_Model
{
	//paymentgateway
	public function createpaymentgateway($name,$isdefault,$order,$status)
	{
		$data  = array(
			'name' => $name,
			'isdefault' => $isdefault,
			'order' => $order,
			'status' => $status,
		);
		$query=$this->db->insert( 'paymentgateway', $data );
		
		return  1;
	}
	function viewpaymentgateway()
	{
		$query=$this->db->query("SELECT `paymentgateway`.`id`,`paymentgateway`.`name`,`paymentgateway`.`status`,`paymentgateway`.`order`,`paymentgateway`.`isdefault` FROM `paymentgateway` 
		ORDER BY `paymentgateway`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditpaymentgateway( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'paymentgateway' )->row();
		return $query;
	}
	
	public function editpaymentgateway( $id,$name,$isdefault,$order,$status)
	{
		$data = array(
			'name' => $name,
			'isdefault' => $isdefault,
			'order' => $order,
			'status' => $status,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'paymentgateway', $data );
		
		
		return 1;
	}
	function deletepaymentgateway($id)
	{
		$query=$this->db->query("DELETE FROM `paymentgateway` WHERE `id`='$id'");
		
	}
	public function getpaymentgatewaydropdown()
	{
		$query=$this->db->query("SELECT * FROM `paymentgateway`  ORDER BY `id` ASC")->result();
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
	
}
?>