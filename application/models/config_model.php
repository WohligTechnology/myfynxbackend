<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class config_model extends CI_Model
{
	public function beforeeditconfig( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'config' )->row();
		return $query;
	}
	
	public function editconfig($id,$text,$content)
	{
		$data = array(
		'text' => $text,
			'content' => $content
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'config', $data );
		return 1;
	}

	function deleteconfig($id)
	{
		$query=$this->db->query("DELETE FROM `config` WHERE `id`='$id'");
	}
    function getremainingproducts1()
	{
		$query=$this->db->query("SELECT * FROM `config` WHERE `id`='1'")->row();
        $remainingproduct=$query->text;
        return $remainingproduct;
	}
    function getremainingproducts()
	{
        $query1=$this->db->query("SELECT * FROM `config` WHERE `id`='1'")->row();
        $remainingproduct=$query1->text;
		$query=$this->db->query("SELECT `id`, `name`, `sku`, `description`, `url`, `visibility`, `price`, `wholesaleprice`, `firstsaleprice`, `secondsaleprice`, `specialpriceto`, `specialpricefrom`, `metatitle`, `metadesc`, `metakeyword`, `quantity`, `status`, `modelnumber`, `brandcolor`, `eanorupc`, `eanorupcmeasuringunits`, `type`, `compatibledevice`, `compatiblewith`, `material`, `color`, `design`, `width`, `height`, `depth`, `portsize`, `packof`, `salespackage`, `keyfeatures`, `videourl`, `modelname`, `finish`, `weight`, `domesticwarranty`, `domesticwarrantymeasuringunits`, `internationalwarranty`, `internationalwarrantymeasuringunits`, `warrantysummary`, `warrantyservicetype`, `coveredinwarranty`, `notcoveredinwarranty`, `size`, `typename` FROM `product` WHERE `quantity` < '$remainingproduct' GROUP BY `type`,`color`,`size`")->result();
        
       return $query;
	}
    
}
?>