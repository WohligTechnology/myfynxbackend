<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Product_model extends CI_Model
{
	//product
    function addtowishlist($user,$product)
    {
        if($user!="")
        {
            $userwishlist=$this->db->query("SELECT * FROM `userwishlist` WHERE `user`='$user' AND `product`='$product'")->row();
            if(empty($userwishlist))
            {
                $query=$this->db->query("INSERT INTO `userwishlist`(`user`,`product`) VALUES ('$user','$product')");
                return $query;
            }
            else
            {
                return 0;
            }
        }
        
        return 0;
        
//        $query=$this->db->query("INSERT INTO `userwishlist`(`user`,`product`) VALUES ('$user','$product')");
//        return $query;
    }
	public function createproduct($name,$sku,$description,$url,$visibility,$price,$wholesaleprice,$firstsaleprice,$secondsaleprice,$specialpricefrom,$specialpriceto,$metatitle,$metadesc,$metakeyword,$quantity,$status,$category,$relatedproduct,$brand,$type,$modelnumber,$brandcolor,$eanorupc,$eanorupcmeasuringunits,$compatibledevice,$compatiblewith,$material,$color,$width,$height,$depth,$salespackage,$keyfeatures,$videourl,$modelname,$finish,$weight,$domesticwarranty,$warrantysummary,$size,$typename)
	{
		$data  = array(
			'name' => $name,
			'sku' => $sku,
			'description' => $description,
			'url' => $url,
			'visibility' => $visibility,
			'price' => $price,
			'wholesaleprice' => $wholesaleprice,
			'firstsaleprice' => $firstsaleprice,
			'secondsaleprice' => $secondsaleprice,
			'specialpricefrom' => $specialpricefrom,
			'specialpriceto' => $specialpriceto,
			'metatitle' => $metatitle,
			'metadesc' => $metadesc,
			'metakeyword' => $metakeyword,
			'quantity' => $quantity,
			'status' => $status,
            'modelnumber' => $modelnumber,
			'brandcolor' => $brandcolor,
			'eanorupc' => $eanorupc,
			'eanorupcmeasuringunits' => $eanorupcmeasuringunits,
			'compatibledevice' => $compatibledevice,
			'compatiblewith' => $compatiblewith,
			'material' => $material,
			'color' => $color,
			'width' => $width,
			'height' => $height,
			'depth' => $depth,
			'salespackage' => $salespackage,
			'keyfeatures' => $keyfeatures,
			'videourl' => $videourl,
			'modelname' => $modelname,
			'finish' => $finish,
			'weight' => $weight,
			'domesticwarranty' => $domesticwarranty,
			'warrantysummary' => $warrantysummary,
			'size' => $size,
			'typename' => $typename
		);
		$query=$this->db->insert( 'product', $data );
		$id=$this->db->insert_id();
        $productid=$id;
        foreach($brand AS $key=>$value)
        {
            $this->product_model->createproductbrand($value,$productid);
        }
    
        foreach($type AS $key=>$value)
        {
            $this->product_model->createproducttype($value,$productid);
        }
    
		if(!empty($category))
		{
			foreach($category as $key => $cat)
			{
				$data1  = array(
					'product' => $id,
					'category' => $cat,
				);
				$query=$this->db->insert( 'productcategory', $data1 );
			}
		}
		if($query)
		{
			$this->saveproductlog($id,"Product Created");
		}
		/*
		if(!empty($relatedproduct))
		{
			foreach($relatedproduct as $key => $pro)
			{
				$data2  = array(
					'product' => $id,
					'relatedproduct' => $pro,
				);
				$query=$this->db->insert( 'relatedproduct', $data2 );
			}
		}*/
		return  1;
	}
    
    public function createproductbrand($value,$productid)
	{
		$data  = array(
			'brand' => $value,
			'product' => $productid
		);
		$query=$this->db->insert( 'productbrand', $data );
		return  1;
	}
    public function createproducttype($value,$productid)
	{
		$data  = array(
			'type' => $value,
			'product' => $productid
		);
		$query=$this->db->insert( 'producttype', $data );
		return  1;
	}
    function deleteall($id)
    {
        
        foreach($id as $idu)
        {
            $query=$this->db->query("DELETE FROM `product` WHERE `id`='$idu'");
        }
        if($query){
            return 1;
        }else{
            return 0;
        }
    }
	function viewproduct()
	{
	$query=$this->db->query("SELECT `product`.`id`,`product`.`name`,`product`.`sku`,`product`.`price`,`product`.`quantity` FROM `product` 
		ORDER BY `product`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditproduct( $id )
	{
		$this->db->where( 'id', $id );
		$query['product']=$this->db->get( 'product' )->row();
		$product_category=$this->db->query("SELECT `category` FROM `productcategory` WHERE `productcategory`.`product`='$id'")->result();
		$query['product_category']=array();
		foreach($product_category as $cat)
		{
			$query['product_category'][]=$cat->category;
		}
		$related_product=$this->db->query("SELECT `relatedproduct` FROM `relatedproduct` WHERE `relatedproduct`.`product`='$id'")->result();
		$query['related_product']=array();
		foreach($related_product as $pro)
		{
			$query['related_product'][]=$pro->relatedproduct;
		}
		return $query;
	}
	
	public function editproduct( $id,$name,$sku,$description,$url,$visibility,$price,$wholesaleprice,$firstsaleprice,$secondsaleprice,$specialpricefrom,$specialpriceto,$metatitle,$metadesc,$metakeyword,$quantity,$status,$category,$relatedproduct,$brand,$type,$modelnumber,$brandcolor,$eanorupc,$eanorupcmeasuringunits,$compatibledevice,$compatiblewith,$material,$color,$width,$height,$depth,$salespackage,$keyfeatures,$videourl,$modelname,$finish,$weight,$domesticwarranty,$warrantysummary,$size,$typename)
	{
		$data = array(
			'name' => $name,
			'sku' => $sku,
			'description' => $description,
			'url' => $url,
			'visibility' => $visibility,
			'price' => $price,
			'wholesaleprice' => $wholesaleprice,
			'firstsaleprice' => $firstsaleprice,
			'secondsaleprice' => $secondsaleprice,
			'specialpricefrom' => $specialpricefrom,
			'specialpriceto' => $specialpriceto,
			'metatitle' => $metatitle,
			'metadesc' => $metadesc,
			'metakeyword' => $metakeyword,
			'quantity' => $quantity,
			'status' => $status,
            'modelnumber' => $modelnumber,
			'brandcolor' => $brandcolor,
			'eanorupc' => $eanorupc,
			'eanorupcmeasuringunits' => $eanorupcmeasuringunits,
			'compatibledevice' => $compatibledevice,
			'compatiblewith' => $compatiblewith,
			'material' => $material,
			'color' => $color,
			'width' => $width,
			'height' => $height,
			'depth' => $depth,
			'salespackage' => $salespackage,
			'keyfeatures' => $keyfeatures,
			'videourl' => $videourl,
			'modelname' => $modelname,
			'finish' => $finish,
			'weight' => $weight,
			'domesticwarranty' => $domesticwarranty,
			'warrantysummary' => $warrantysummary,
			'size' => $size,
			'typename' => $typename
		);
		$this->db->where( 'id', $id );
		$q=$this->db->update( 'product', $data );
		$this->db->query("DELETE FROM `productcategory` WHERE `product`='$id'");
		$this->db->query("DELETE FROM `relatedproduct` WHERE `product`='$id'");
		$this->db->query("DELETE FROM `productbrand` WHERE `product`='$id'");
		$this->db->query("DELETE FROM `producttype` WHERE `product`='$id'");
        
        foreach($brand AS $key=>$value)
        {
            $this->product_model->createproductbrand($value,$id);
        }
    
        foreach($type AS $key=>$value)
        {
            $this->product_model->createproducttype($value,$id);
        }
    
		if(!empty($category))
		{
			foreach($category as $key => $cat)
			{
				$data1  = array(
					'product' => $id,
					'category' => $cat,
				);
				$query=$this->db->insert( 'productcategory', $data1 );
			}
		}
		if($q)
		{
			$this->saveproductlog($id,"Product Details Edited");
		}
		/*
		if(!empty($relatedproduct))
		{
			foreach($relatedproduct as $key => $pro)
			{
				$data2  = array(
					'product' => $id,
					'relatedproduct' => $pro,
				);
				$query=$this->db->insert( 'relatedproduct', $data2 );
			}
		}*/
		
		return 1;
	}
	function deleteproduct($id)
	{
		$query=$this->db->query("DELETE FROM `product` WHERE `id`='$id'");
		$this->db->query("DELETE FROM `productcategory` WHERE `product`='$id'");
		$this->db->query("DELETE FROM `relatedproduct` WHERE `product`='$id'");
		$this->db->query("DELETE FROM `productimage` WHERE `product`='$id'");
		$this->db->query("DELETE FROM `productbrand` WHERE `product`='$id'");
	}
	public function getcategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `category`  ORDER BY `id` ASC")->result();
		$return=array(
		
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	public function getproductdropdown()
	{
		$query=$this->db->query("SELECT * FROM `product`  ORDER BY `id` ASC")->result();
		$return=array(
		
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
	public function getvisibility()
	{
		$status= array(
			 "1" => "Yes",
			 "0" => "No",
			);
		return $status;
	}
	function viewallimages($id)
	{
		$query=$this->db->query(" SELECT `productimage`.`id` as `id`, `productimage`.`image` as `productimage`,`productimage`.`product` as `productid`,`productimage`.`is_default` as `is_default`,`productimage`.`order` as `order`  FROM `productimage` WHERE `productimage`.`product`='$id' ORDER BY `productimage`.`order` ")->result();
		return $query;
	}
	function addimage($id,$uploaddata)
	{
		$productimage	= $uploaddata[ 'file_name' ];
		$path = $uploaddata[ 'full_path' ];
		$nextorder=$this->db->query("SELECT IFNULL(MAX(`order`)+1,0) AS `nextorder` FROM `productimage` WHERE `product`='$id'")->row();
		$nextorder= $nextorder->nextorder;
		
		if($nextorder=="0")
		$isdefault="1";
		else
		$isdefault="0";
		$data  = array(
			'image' => $productimage,
			'product' => $id,
			'is_default' => $isdefault,
			'order' => $nextorder,
			);
		$query=$this->db->insert( 'productimage', $data );
		if($query)
		{
			$this->saveproductlog($id,"Product Image Added");
		}
		
	}
	function deleteimage($productimageid,$id)
	{
		$query=$this->db->query("DELETE FROM `productimage` WHERE `product`='$id' AND `id`='$productimageid'");
		if($query)
		{
			$this->saveproductlog($id,"Product Image Deleted");
		}
	}
	function defaultimage($productimageid,$id)
	{
		$order=$this->db->query("SELECT `order` FROM `productimage` WHERE `id`='$productimageid'")->row();
		$order=$order->order;
		
		$this->db->query(" UPDATE `productimage` SET `order`='$order' WHERE `is_default`='1' ");		
		$this->db->query(" UPDATE `productimage` SET `is_default`='0' WHERE `productimage`.`product`='$id' ");
		
		$query=$this->db->query(" UPDATE `productimage` SET `is_default`='1',`order`='0' WHERE `productimage`.`id`='$productimageid' AND `productimage`.`product`='$id' ");
		if($query)
		{
			$this->saveproductlog($id,"Product Image set to default");
		}
	}
	function changeorder($productimageid,$order,$product)
	{
		$query=$this->db->query("UPDATE `productimage` SET `order`='$order' WHERE `id`='$productimageid' ");
		if($query)
		{
			$this->saveproductlog($product,"Product Image Order Edited");
		}
	}
	function savequantity($product,$quantity)
	{
		$data = array(
			'quantity' => $quantity,
		);
		$this->db->where( 'id', $product );
		$query=$this->db->update( 'product', $data );
		
		if($query)
		{
			$this->saveproductlog($product,"Product Quantity Updated ,Quantity:$quantity");
		}
		if($query)
			return 1;
		else
			return 0;
	}
	function editprice($id,$price,$wholesaleprice,$firstsaleprice,$secondsaleprice,$specialpricefrom,$specialpriceto)
	{
		$data = array(
			'price' => $price,
			'wholesaleprice' => $wholesaleprice,
			'firstsaleprice' => $firstsaleprice,
			'secondsaleprice' => $secondsaleprice,
			'specialpricefrom' => $specialpricefrom,
			'specialpriceto' => $specialpriceto,
			
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'product', $data );
		if($query)
		{
			$this->saveproductlog($id,"Product Price Edited");
		}
		return 1;
	}
	function editrelatedproduct($id,$relatedproduct)
	{
		$this->db->query("DELETE FROM `relatedproduct` WHERE `product`='$id'");
		
		if(!empty($relatedproduct))
		{
			foreach($relatedproduct as $key => $pro)
			{
				$data2  = array(
					'product' => $id,
					'relatedproduct' => $pro,
				);
				$query=$this->db->insert( 'relatedproduct', $data2 );
			}
		}
		
		{
			$this->saveproductlog($id,"Related Product updated");
		}
		return 1;
	}
	public function getproducts($product)
	{
		$query=$this->db->query("SELECT `id`,`name` FROM `product` WHERE `id` NOT IN ($product)  ORDER BY `id` ASC")->result();
		
		
		return $query;
	}
	function viewproductwaiting()
	{
		$query=$this->db->query("SELECT `user`.`firstname`,`user`.`lastname`,`productwaiting`.`email`,`productwaiting`.`timestamp`,`productwaiting`.`id` as `id` FROM `productwaiting` 
		LEFT JOIN `user` ON `user`.`id`=`productwaiting`.`user`
		ORDER BY `productwaiting`.`timestamp` DESC")->result();
		return $query;
	}
	function saveproductlog($id,$action)
	{
		$user = $this->session->userdata('id');
		$data2  = array(
			'product' => $id,
			'user' => $user,
			'action' => $action,
		);
		$query2=$this->db->insert( 'productlog', $data2 );
	}
	function getproductbycategory($category,$color,$price1,$price2)
	{
		
		$where = "";
		if($price1!="")
		{
		$pricefilter="AND (`product`.`price` BETWEEN $price1 AND $price2 OR `product`.`price`=$price1 OR `product`.`price`=$price2)";
		}
		else
		{
		$pricefilter="";
		}
		$q3 = $this->db->query("SELECT COUNT(*) as `cnt` FROM `category` WHERE `category`.`parent`= '$category'")->row();
		if($q3->cnt > 0)
			$where .= " OR `category`.`parent`='$category' ";
		$query['category']=$this->db->query("SELECT `category`.`name` ,`category`.`image1` FROM `category`
		WHERE `category`.`id`='$category'")->row();
        
       
        
		$query['product']=$this->db->query("SELECT `product`.`id`,`product`.`name`,`product`.`sku`,`product`.`url`,`product`.`price`,`product`.`wholesaleprice`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`productimage`.`image` FROM `product`
		INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` 
		INNER JOIN `category` ON `category`.`id`=`productcategory`.`category` 
		LEFT JOIN `productimage` ON `productimage`.`product`=`product`.`id`
		WHERE  `product`.`quantity` > 0 AND `product`.`name` LIKE '%$color%' $pricefilter
        AND (   `productcategory`.`category`=$category $where )
		GROUP BY `product`.`sku`
		ORDER BY `product`.`id` DESC")->result();
		
		foreach($query['product'] as $p_row)
		{
			$productid = $p_row->id;
			$p_row->productimage=$this->db->query("SELECT `productimage`.`image` FROM `productimage` 
			WHERE `productimage`.`product`='$productid'
			ORDER BY `productimage`.`order`
			LIMIT 0,2")->result();
		}
		foreach($query['product'] as $p_row)
		{
			$productid = $p_row->id;
			$query5=$this->db->query("SELECT count(`category`) as `isnew`  FROM `productcategory` 
			WHERE  `productcategory`.`category`='31' AND `product`='$productid'
			LIMIT 0,1")->row();
			$p_row->isnew=$query5->isnew;
			
		}
		/*$query['subcategory']=$this->db->query("SELECT `category`.`name`,`category`.`image1`,`category`.`image2` FROM `category`
		WHERE `category`.`parent`='$category' AND `category`.`status`=1
		ORDER BY `category`.`order`")->result();*/
		$query['subcategory'] = $this->db->query("SELECT `tab1`.`id`,`tab1`.`name`,`tab1`.`image1`,`tab1`.`image2`,COUNT(`tab2`.`id`) as `cnt` FROM 
		(
		SELECT `category`.`name`,`category`.`id`,`category`.`image1`,`category`.`image2`,`category`.`order` FROM `category` 
			WHERE `category`.`parent`='$category' AND `category`.`status`=1
		) as `tab1`
		INNER JOIN `productcategory` ON `productcategory`.`category`=`tab1`.`id` 
		INNER JOIN `product`  as `tab2` ON `productcategory`.`product`=`tab2`.`id` AND `tab2`.`status`=1
		GROUP BY `tab1`.`id`
		ORDER BY `tab1`.`order` ")->result();
		$query['template']=new StdClass();
		$query['breadcrumbs']=$this->getparentcategories($category);
		$query['currentcategory']=$category;
		$query['template']->pageurl = "partials/product.html";
		return $query;
	}
	function getproductdetails($product,$user)
	{
//		$query['product']=$this->db->query("SELECT `product`.`id`,`product`.`name`,`product`.`sku`,`product`.`url`,`product`.`price`,`product`.`wholesaleprice`,`product`.`description`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`product`.`quantity`,`userwishlist`.`user` FROM `product` LEFT OUTER JOIN `userwishlist` ON `userwishlist`.`product`=`product`.`id` AND `userwishlist`.`user`='$user' 
//		WHERE `product`.`id`='$product'")->row();
        
        $query['product']=$this->db->query("SELECT `product`.`id`, `product`.`name`, `product`.`sku`, `product`.`description`, `product`.`url`, `product`.`visibility`, `product`.`price`, `product`.`wholesaleprice`, `product`.`firstsaleprice`, `product`.`secondsaleprice`, `product`.`specialpriceto`, `product`.`specialpricefrom`, `product`.`metatitle`, `product`.`metadesc`, `product`.`metakeyword`, `product`.`quantity`, `product`.`status`, `product`.`modelnumber`, `product`.`brandcolor`, `product`.`eanorupc`, `product`.`eanorupcmeasuringunits`, `product`.`type`, `product`.`compatibledevice`, `product`.`compatiblewith`, `product`.`material`, `product`.`color`, `product`.`design`, `product`.`width`, `product`.`height`, `product`.`depth`, `product`.`portsize`, `product`.`packof`, `product`.`salespackage`, `product`.`keyfeatures`, `product`.`videourl`, `product`.`modelname`, `product`.`finish`, `product`.`weight`, `product`.`domesticwarranty`,`product`.`domesticwarrantymeasuringunits`, `product`.`internationalwarranty`, `product`.`internationalwarrantymeasuringunits`, `product`.`warrantysummary`, `product`.`warrantyservicetype`,`product`.`coveredinwarranty`, `product`.`notcoveredinwarranty`, `product`.`size`,`userwishlist`.`user` FROM `product` LEFT OUTER JOIN `userwishlist` ON `userwishlist`.`product`=`product`.`id` AND `userwishlist`.`user`='$user' 
		WHERE `product`.`id`='$product'")->row();
		
	
		$query['productimage'] = $this->db->query("SELECT `image` ,`productimage`.`order` FROM `productimage` 
		WHERE `product`='$product'
		ORDER BY `productimage`.`order`")->result();
		
		$query['relatedproduct']=$this->db->query("SELECT `product`.`id`,`product`.`name`,`product`.`sku`,`product`.`url`,`product`.`price`,`product`.`wholesaleprice`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`product`.`quantity`,`productimage`.`image` FROM `relatedproduct`
		INNER JOIN `product` ON `product`.`id`=`relatedproduct`.`relatedproduct` AND `relatedproduct`.`product`='$product' AND `product`.`visibility`=1 AND `product`.`status`=1 AND `product`.`quantity` > 0
		INNER JOIN `productimage` ON `productimage`.`id`=`product`.`id` 
		GROUP BY `product`.`id`
		ORDER BY `productimage`.`order`")->result();
		
        $query['productrating'] = $this->db->query("SELECT AVG(`rating`) as `averagerating` FROM `productrating` WHERE `product`='$product'")->row();
		 $query['productrating']=$query['productrating']->averagerating;
		
		return $query;
	}
	public function getchildrencategories($category) 
	{
		$children=array();
		$children[]=$category;
		$query=$this->db->query("SELECT `id` as `children` FROM `category` WHERE `category`.`parent`='$category' ");
		if ( $query->num_rows() <= 0 ) {
			return $children;
		} 
		else {
			
			$query=$query->result();
			//print_r($query);
			foreach($query as $row)
			{	
				$other=array();
				$other=$this->getchildrencategories($row->children);
				$children=array_merge($children, $other);	
				
			}
			return $children;
		}
	}
	public function getparentcategories($categoryid) 
	{
		$parents=array();
		$q = $this->db->query("SELECT `name` FROM `category` WHERE `id`='$categoryid'")->row();
        $c=new stdClass();
		$c->id=$categoryid;
		$c->name=$q->name;
		
		do
		{
			$row=$this->db->query("SELECT `category`.`parent` as `category`,`tab2`.`name` FROM `category`
			LEFT JOIN `category` as `tab2` ON `category`.`parent`=`tab2`.`id` 
			WHERE `category`.`id`='$categoryid'")->row();
			//echo ($row->category);
			$category = new StdClass();
			$category->id=$row->category;
			$category->name=$row->name;
			if($row->category != 0 || $row->category != "0")
			{
				
				array_push($parents,$category);
			}
			$categoryid = $row->category;
			
		}while($categoryid!=0) ;
		//$parents[]=$c;
		array_push($parents,$c);
		
		return $parents;
	}
    public function addproductwaitinglist($email,$product)
    {
        $this->db->query("INSERT INTO `productwaiting`(`email`,`user`,`product`) VALUES ('$email','','$product')");
        return true;
    }
	
	public function beforeeditproductwaiting( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'productwaiting' )->row();
		return $query;
	}
    
	public function editproductwaiting($id,$product,$user,$email)
	{
		$data = array(
			'product' => $product,
			'user' => $user,
			'email' => $email,
			'timestamp' => NULL
		);
		$this->db->where( 'id', $id );
		$q=$this->db->update( 'productwaiting', $data );
		
		return 1;
	}
    
	function deleteproductwaiting($id)
	{
		$query=$this->db->query("DELETE FROM `productwaiting` WHERE `id`='$id'");
	}
    
    function exportproductcsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT  `product`.`id`  AS `id` ,  `product`.`name`  AS `Name`, GROUP_CONCAT(`brand`.`name`) AS `Brand`, `product`.`modelnumber`, `product`.`brandcolor`, `product`.`eanorupc`, `product`.`eanorupcmeasuringunits`, GROUP_CONCAT(`type`.`name`) AS `Type`, `product`.`compatibledevice`,`product`.`compatiblewith` ,  `product`.`price`  AS `price` ,  `product`.`wholesaleprice`  AS `wholesaleprice` ,  `product`.`firstsaleprice`  AS `firstsaleprice` ,  `product`.`secondsaleprice`  AS `secondsaleprice` ,  `product`.`specialpriceto`  AS `specialpriceto` ,  `product`.`specialpricefrom`  AS `specialpricefrom` , GROUP_CONCAT(`productimage`.`image`) AS `image`, GROUP_CONCAT(`category`.`name`) AS `category`, `product`.`quantity`  AS `quantity` 
FROM `product` 
INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` 
INNER JOIN `category` ON `category`.`id`=`productcategory`.`category` 
INNER JOIN `producttype` ON `product`.`id`=`producttype`.`product` 
INNER JOIN `type` ON `type`.`id`=`producttype`.`type`  
INNER JOIN `productbrand` ON `product`.`id`=`productbrand`.`product` 
INNER JOIN `brand` ON `brand`.`id`=`productbrand`.`brand` 
LEFT OUTER JOIN `productimage` ON `productimage`.`product`=`product`.`id` 
GROUP BY `product`.`id` ORDER BY  `product`.`id` DESC");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
//        file_put_contents("gs://magicmirroruploads/products_$timestamp.csv", $content);
//		redirect("http://magicmirror.in/servepublic?name=products_$timestamp.csv", 'refresh');
        if ( ! write_file('./csvgenerated/productfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url('csvgenerated/productfile.csv'), 'refresh');
             echo 'File written!';
        }
//		file_put_contents("gs://lylafiles/product_$timestamp.csv", $content);
//		redirect("http://lylaloves.co.uk/servepublic?name=product_$timestamp.csv", 'refresh');
	}
    
	public function createbycsv($file)
	{
//        echo "in Model";
//            print_r($file);
        
        foreach ($file as $row)
        {
            
            if($row['Special Price From'] != "")
				$specialpricefrom = date("Y-m-d",strtotime($row['Special Price From']));
			if($row['Special Price To'] != "")
				$specialpriceto = date("Y-m-d",strtotime($row['Special Price To']));
            $sku=$row['SKU'];
            $productfeatures=$row['Product Features'];
            $image=$row['Images'];
            $allimages=explode(",",$image);
            $category=$row['Category'];
            $allcategories=explode(",",$category);
            
            $name=$row['Name'];
            $description=$row['Description'];
            $url=$row['url'];
            $metatitle=$row['Meta Title'];
            $metadescription=$row['Meta Description'];
            $metakeyword=$row['Meta Keyword'];
            $quantity=$row['Quantity'];
            $price=$row['Price'];
            $wholesaleprice=$row['Wholesale Price'];
            $firstsaleprice=$row['Firstsale Price'];
            $secondsaleprice=$row['Secondsale Price'];
            
            $brand=$row['Brand'];
            
            $allbrand=explode(",",$brand);
            
            $modelnumber=$row['Model Number'];
            $brandcolor=$row['Brand Color'];
            $eanorupc=$row['EAN/UPC'];
            $eanorupcmeasuringunits=$row['EAN/UPC-Measuring Unit'];
            
            $type=$row['Type'];
            $alltype=explode(",",$type);
            
            $compatibledevice=$row['Compatible Device'];
            $compatiblewith=$row['Compatible With'];
            $material=$row['Material'];
            $color=$row['Color'];
            $design=$row['Design'];
            $width=$row['Width'];
            $height=$row['Height'];
            $depth=$row['Depth'];
            $portsize=$row['Port Size'];
            $packof=$row['Pack Of'];
            $salespackage=$row['Sales Package'];
            $keyfeatures=$row['Key Features'];
            $videourl=$row['Video URL'];
            $modelname=$row['Model Name'];
            $finish=$row['Finish'];
            $weight=$row['Weight'];
            $domesticwarranty=$row['Warranty'];
            $domesticwarrantymeasuringunits=$row['Domestic Warranty Measuring Units'];
            $internationalwarranty=$row['Internation Warranty'];
            $internationalwarrantymeasuringunits=$row['International Warranty Measuring Units'];
            $warrantysummary=$row['Warranty Summary'];
            $warrantyservicetype=$row['Warranty Service Type'];
            $coveredinwarranty=$row['Covered In Warranty'];
            $notcoveredinwarranty=$row['Not Covered In Warranty'];
            $size=$row['Size'];
            $typename=$row['Typename'];
            
            $q="INSERT INTO `product`( `name`, `sku`, `description`, `url`, `visibility`, `price`, `wholesaleprice`, `firstsaleprice`, `secondsaleprice`, `specialpriceto`, `specialpricefrom`, `metatitle`, `metadesc`, `metakeyword`, `quantity`, `status`,`typename`) VALUES ('$name','$sku','$description','$url','1','$price','$wholesaleprice','$firstsaleprice','$secondsaleprice','$specialpriceto','$specialpricefrom','$metatitle','$metadescription','$metakeyword','$quantity',1,'$typename')";
//            echo $q;
            $category=$row['category'];
//            $data  = array(
//                'name' => $row['name'],
//                'sku' => $row['sku'],
//                'description' => $row['description'],
//                'url' => $row['url'],
//                'metatitle' => $row['metatitle'],
//                'metadesc' => $row['metadescription'],
//                'metakeyword' => $row['metakeyword'],
//                'quantity' => $row['quantity'],
//                'price' => $row['price'],
//                'wholesaleprice' => $row['wholesaleprice'],
//                'firstsaleprice' => $row['firstsaleprice'],
//                'secondsaleprice' => $row['secondsaleprice'],
//                'specialpricefrom' => $specialpricefrom,
//                'specialpriceto' => $specialpriceto,
//                'visibility' => 1,
//                'status' => 1
//            );
            $data  = array(
			'name' => $row['name'],
			'sku' => $row['sku'],
			'description' => $row['description'],
			'url' => $row['url'],
			'visibility' => 1,
			'price' => $row['price'],
			'wholesaleprice' => $row['wholesaleprice'],
			'firstsaleprice' => $row['firstsaleprice'],
			'secondsaleprice' => $row['secondsaleprice'],
			'specialpricefrom' => $specialpricefrom,
			'specialpriceto' => $specialpriceto,
			'metatitle' => $row['metatitle'],
			'metadesc' => $row['metadescription'],
			'metakeyword' => $row['metakeyword'],
			'quantity' => $row['quantity'],
			'status' => 1
		);
            $q1="SELECT COUNT(`id`) as `count1` FROM `product` WHERE `sku`='$sku'";
            
            $checkproductpresent=$this->db->query("SELECT COUNT(`id`) as `count1` FROM `product` WHERE `sku`='$sku'")->row();
            
//            if($checkproductpresent->count1 == 0)
//            {
//                $query=$this->db->insert('product', $data );
                $query=$this->db->query("INSERT INTO `product`( `name`, `sku`, `description`, `url`, `visibility`, `price`, `wholesaleprice`, `firstsaleprice`, `secondsaleprice`, `specialpriceto`, `specialpricefrom`, `metatitle`, `metadesc`, `metakeyword`, `quantity`, `status`, `modelnumber`, `brandcolor`, `eanorupc`, `eanorupcmeasuringunits`, `type`, `compatibledevice`, `compatiblewith`, `material`, `color`, `design`, `width`, `height`, `depth`, `portsize`, `packof`, `salespackage`, `keyfeatures`, `videourl`, `modelname`, `finish`, `weight`, `domesticwarranty`, `domesticwarrantymeasuringunits`, `internationalwarranty`, `internationalwarrantymeasuringunits`, `warrantysummary`, `warrantyservicetype`, `coveredinwarranty`, `notcoveredinwarranty`,`size`,`typename`) VALUES ('$name','$sku','$description','$url','1','$price','$wholesaleprice','$firstsaleprice','$secondsaleprice','$specialpriceto','$specialpricefrom','$metatitle','$metadescription','$metakeyword','$quantity',1,'$modelnumber','$brandcolor','$eanorupc','$eanorupcmeasuringunits','$type','$compatibledevice','$compatiblewith','$material','$color','$design','$width','$height','$depth','$portsize','$packof','$salespackage','$keyfeatures','$videourl','$modelname','$finish','$weight','$domesticwarranty','$domesticwarrantymeasuringunits','$internationalwarranty','$internationalwarrantymeasuringunits','$warrantysummary','$warrantyservicetype','$coveredinwarranty','$notcoveredinwarranty','$size','$typename')");
                $productid=$this->db->insert_id();
//                echo "pid".$productid;
                
//            }
//            else
//            {
//            return 0;
//            }
			foreach($allimages as $key => $image)
			{
				$data1  = array(
					'product' => $productid,
					'image' => $image,
                    'order' => $key
				);
				$queryproductimage=$this->db->insert( 'productimage', $data1 );
			}
            
			foreach($allcategories as $key => $category)
			{
                $category=trim($category);
                $categoryquery=$this->db->query("SELECT * FROM `category` where `name`LIKE '$category'")->row();
                if(empty($categoryquery))
                {
                    $this->db->query("INSERT INTO `category`(`name`) VALUES ('$category')");
                    $categoryid=$this->db->insert_id();
                }
                else
                {
                    $categoryid=$categoryquery->id;
                }
            
				$data2  = array(
					'product' => $productid,
					'category' => $categoryid,
				);
				$queryproductcategory=$this->db->insert( 'productcategory', $data2 );
			}
            
			foreach($allbrand as $key => $brand)
			{
                $brand=trim($brand);
                $brandquery=$this->db->query("SELECT * FROM `brand` where `name` LIKE '$brand'")->row();
                if(empty($brandquery))
                {
                    $this->db->query("INSERT INTO `brand`(`name`) VALUES ('$brand')");
                    $brandid=$this->db->insert_id();
                }
                else
                {
                    $brandid=$brandquery->id;
                }
            
				$data2  = array(
					'product' => $productid,
					'brand' => $brandid,
				);
				$queryproductbrand=$this->db->insert( 'productbrand', $data2 );
			}
            
			foreach($alltype as $key => $type)
			{
                $type=trim($type);
                $typequery=$this->db->query("SELECT * FROM `type` where `name` LIKE '$type'")->row();
                if(empty($typequery))
                {
                    $this->db->query("INSERT INTO `type`(`name`) VALUES ('$type')");
                    $typeid=$this->db->insert_id();
                }
                else
                {
                    $typeid=$typequery->id;
                }
            
				$data2  = array(
					'product' => $productid,
					'type' => $typeid,
				);
				$queryproducttype=$this->db->insert( 'producttype', $data2 );
			}
        }
		if(!$query)
			return  0;
		else
			return  1;
	}
    
    //new functions by avinash
    
    function deleteallselectedproducts($id)
    {
        
        foreach($id as $idu)
        {
            $query=$this->db->query("DELETE FROM `product` WHERE `id`='$idu'");
            $query=$this->db->query("DELETE FROM `productcategory` WHERE `product`='$idu'");
        }
        if($query){
            return 1;
        }else{
            return 0;
        }
    }
    
    function productimagereorderbyid($id)
    {
        $allimages=$this->db->query("SELECT * FROM `productimage` WHERE `product`='$id' ORDER BY `order`")->result();
        if(!empty($allimages))
        {
            foreach($allimages as $key=>$row)
            {
                $productimageid=$row->id;
                $order=$row->order;
                $updatequery=$this->db->query("UPDATE `productimage` SET `order`='$key' WHERE `id`='$productimageid'");
            }
            $selectproductimagecroncheck=$this->db->query("SELECT * FROM `productimagecroncheck` WHERE `product`='$id'")->row();
            if(!empty($selectproductimagecroncheck))
            {
                $productimagecroncheckid=$selectproductimagecroncheck->id;
                $update=$this->db->query("UPDATE `productimagecroncheck` SET `timestamp`=NULL WHERE `id`='$productimagecroncheckid'");
            }
            else
            {
                $message="Images for productid ".$id." are reordered";
                $insert=$this->db->query("INSERT INTO `productimagecroncheck`( `product`, `message`, `timestamp`) VALUES ('$id','$message',NULL)");
            }
        }
        else
        {
            return 0;
        }
        return 1;
    
    }
    
    function getproductsforimageorderchange()
    {
        $query=$this->db->query("SELECT * FROM `product`")->result();
        return $query;
    }
    
}
?>