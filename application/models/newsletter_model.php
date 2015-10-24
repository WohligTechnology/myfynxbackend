<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Newsletter_model extends CI_Model
{
	
    function limitedstock()
    {
        $query=$this->db->query("SELECT `id`, `name`, `email`, `address`, `timestamp` FROM `limitedstock`")->result();
		return $query;
    }
    function viewnewsletter()
    {
        $query=$this->db->query("SELECT `id`,`user`,`email`,`status` FROM `newsletterusers`")->result();
		return $query;
    }
    function viewcontact()
    {
        $query=$this->db->query("SELECT `id`, `name`, `email`, `telephone`, `comment`, `timestamp` FROM `contact`")->result();
		return $query;
    }

	function deletecontact($id)
	{
		$query=$this->db->query("DELETE FROM `contact` WHERE `id`='$id'");
	}
	function deletelimitedstock($id)
	{
		$query=$this->db->query("DELETE FROM `limitedstock` WHERE `id`='$id'");
	}
	function deletenewsletter($id)
	{
		$query=$this->db->query("DELETE FROM `newsletterusers` WHERE `id`='$id'");
	}
	
	function changestatus($id)
	{
		$query=$this->db->query("SELECT `status` FROM `newsletter` WHERE `id`='$id'")->row();
		$status=$query->status;
		if($status==1)
		{
			$status=0;
		}
		else if($status==0)
		{
			$status=1;
		}
		$data  = array(
			'status' =>$status,
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'newsletter', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
	public function getuserdropdown()
	{
		$query=$this->db->query("SELECT `firstname`,`lastname`,`id` FROM `user` WHERE `accesslevel`=2 ORDER BY `name`  ASC")->result();
		$return=array(
		
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname." ".$row->lastname;
		}
		
		return $return;
	}
	public function getuserdropdownproductwaiting()
	{
		$query=$this->db->query("SELECT `firstname`,`lastname`,`id` FROM `user` ORDER BY `name`  ASC")->result();
		$return=array(
		
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname." ".$row->lastname;
		}
		
		return $return;
	}
	function editaddress($id,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode)
	{
		$data  = array(
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingstate' => $shippingstate,
			'shippingcountry' => $shippingcountry,
			'shippingpincode' => $shippingpincode,
		);
		
		$this->db->where( 'id', $id );
		$this->db->update( 'newsletter', $data );
		return 1;
	}
	function addcredits($id,$credits)
	{
		$this->db->query("UPDATE `newsletter` SET `credits`=`credits`+$credits WHERE `id`='$id'");
		return 1;
	}
    
    function exportnewslettercsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `newsletterusers`.`id`,CONCAT(`user`.`firstname`,'',`user`.`lastname`) as `username`,`newsletterusers`.`email`,`newsletterusers`.`status`
        FROM `newsletterusers`
        LEFT OUTER JOIN `user` ON `user`.`id`=`newsletterusers`.`user`");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/newsletterfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url('csvgenerated/newsletterfile.csv'), 'refresh');
             echo 'File written!';
        }
	}
}
?>