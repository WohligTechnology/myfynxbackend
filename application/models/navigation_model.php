<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Navigation_model extends CI_Model
{
	//navigation
	public function createnavigation($name,$link,$target,$status,$order,$image,$parent)
	{
		$data  = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			'order' => $order,
			'icon' => $image,
			'parent' => $parent,
		);
		$query=$this->db->insert( 'navigation', $data );
		return  1;
	}
	function viewnavigation()
	{
		$query=$this->db->query("SELECT `navigation`.`id`,`navigation`.`name`,`navigation`.`link`,`navigation`.`target`,`navigation`.`icon`,`navigation`.`order`,`tab2`.`name` as `parent` FROM `navigation` 
		LEFT JOIN `navigation` as `tab2` ON `tab2`.`id`=`navigation`.`parent`
		ORDER BY `navigation`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditnavigation( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'navigation' )->row();
		return $query;
	}
	
	public function editnavigation( $id,$name,$link,$target,$status,$order,$image,$parent)
	{
		$data = array(
			'name' => $name,
			'link' => $link,
			'target' => $target,
			'status' => $status,
			'order' => $order,
			'parent' => $parent,
		);
		if($image != "")
			$data['icon']=$image;
		$this->db->where( 'id', $id );
		$this->db->update( 'navigation', $data );
		return 1;
	}
	function deletenavigation($id)
	{
		$this->load->helper("file");
		$this->load->helper("url");
		$q = $this->db->query("SELECT `icon` FROM `navigation` WHERE `id`='$id'")->row();
		if($q->icon != "")
		{
			
			unlink("uploads/".$q->icon);
		}
		$query=$this->db->query("DELETE FROM `navigation` WHERE `id`='$id'");
	}
	public function getnavigationdropdown()
	{
		$query=$this->db->query("SELECT * FROM `navigation`  ORDER BY `id` ASC")->result();
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
	function getnavigation()
	{
		$navigation=$this->db->query("SELECT `navigation`.`id`,`navigation`.`name`,`navigation`.`link`,`navigation`.`target`,`navigation`.`icon`,`navigation`.`order`,`tab2`.`name` as `parent` FROM `navigation` 
		LEFT JOIN `navigation` as `tab2` ON `tab2`.`id`=`navigation`.`parent`
		WHERE `navigation`.`parent`=0
		ORDER BY `navigation`.`order` ASC")->result();
		//$navigation = array();
		foreach($navigation as $key=> $row)
		{
			$id = $row->id;
			$q2 = $this->db->query("SELECT `navigation`.`id`,`navigation`.`name`,`navigation`.`link`,`navigation`.`target`,`navigation`.`icon`,`navigation`.`order`,`tab2`.`name` as `parent` FROM `navigation` 
			LEFT JOIN `navigation` as `tab2` ON `tab2`.`id`=`navigation`.`parent`
			WHERE `navigation`.`parent`='$id'
			ORDER BY `navigation`.`order` ASC")->result();
			
			//$navigation[] = $row ;
			
			if($q2 > 0)
			{
				//$navigation[$key] = new stdClass();
				$row->dropdown=$q2;
			}
		}
		return $navigation;
	}
}
?>