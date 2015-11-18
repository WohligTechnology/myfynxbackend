<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class restapi_model extends CI_Model
{
    public function getmultipleoffer($userid)
    {
        $todaysdate=date("Y-m-d");
//          // latest offers 
        
            $abc->offer = array();
          $query1=$this->db->query("SELECT * FROM `offer` WHERE `startdate` <= '$todaysdate' AND `enddate` >= '$todaysdate'")->result();
        foreach($query1 as $row1)
        {
         $query=$this->db->query("SELECT `product` FROM `offerproduct` WHERE `offer`='$row1->id'")->result();
                $row1->offerproducts=array();
            foreach($query as $productid)
            {
              $offerproducts=$this->db->query("SELECT `product`.`id` as `productid`,`product`.`name`,`product`.`sku`,`product`.`url`,`product`.`price`
,`product`.`wholesaleprice`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`image1`.`image` as `image1`,`image2`.`image` as `image2`,`product`.`quantity` FROM `product`
LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 
LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1 WHERE `product`.`visibility`=1 AND `product`.`status`=1 AND `product`.`id` = '$productid->product'")->row();
                        array_push($row1->offerproducts,$offerproducts);
            }
            
        }
          array_push($abc->offer, $query1);
        
        //PAST OFFER PRODUCTS
        $abc->pastoffer = array();
         
            $query2=$this->db->query("SELECT * FROM `offer` WHERE `enddate` < '$todaysdate' ORDER BY `timestamp` DESC")->row(); 
          array_push( $abc->pastoffer,$query2);  
            $abc->pastofferproducts = array();
         $pastoffer=$this->db->query("SELECT `product` FROM `offerproduct` WHERE `offer`='$query2->id'")->result();
            foreach($pastoffer as $productid)
            {
              $pastofferproducts=$this->db->query("SELECT `product`.`id` as `productid`,`product`.`name`,`product`.`sku`,`product`.`url`,`product`.`price`
,`product`.`wholesaleprice`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`image1`.`image` as `image1`,`image2`.`image` as `image2`,`product`.`quantity` FROM `product`
LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 
LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1 WHERE `product`.`visibility`=1 AND `product`.`status`=1 AND `product`.`id` = '$productid->product'")->row();
               
                    array_push($abc->pastofferproducts,$pastofferproducts);    
                 
            }

        
        //UPCOMING OFFER PRODUCTS
        $abc->upcomingoffer = array();
         $query3=$this->db->query("SELECT * FROM `offer` WHERE `startdate` > '$todaysdate' ORDER BY `timestamp` DESC")->row(); 
        array_push( $abc->upcomingoffer,$query3);
            $abc->upcomingofferproducts = array();
         $upcomingoffer=$this->db->query("SELECT `product` FROM `offerproduct` WHERE `offer`='$query3->id'")->result();
            foreach($upcomingoffer as $productid)
            {
              $upcomingofferproducts=$this->db->query("SELECT `product`.`id` as `productid`,`product`.`name`,`product`.`sku`,`product`.`url`,`product`.`price`
,`product`.`wholesaleprice`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`image1`.`image` as `image1`,`image2`.`image` as `image2`,`product`.`quantity` FROM `product`
LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 
LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1 WHERE `product`.`visibility`=1 AND `product`.`status`=1 AND `product`.`id` = '$productid->product'")->row();
                        array_push($abc->upcomingofferproducts,$upcomingofferproducts);
            }
        
        return $abc;
    }
    
    public function getofferproducts($offerid){
         $abc->offerproducts = array();
          $abc->offerdetails=$this->db->query("SELECT * FROM `offer` WHERE `id`=$offerid")->row();
     $query=$this->db->query("SELECT `product` FROM `offerproduct` WHERE `offer`='$offerid'")->result();
         foreach($query as $productid)
            {
              $offerproducts=$this->db->query("SELECT `product`.`id` as `productid`,`product`.`name`,`product`.`sku`,`product`.`url`,`product`.`price`
,`product`.`wholesaleprice`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`image1`.`image` as `image1`,`image2`.`image` as `image2`,`product`.`quantity` FROM `product`
LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 
LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1 WHERE `product`.`visibility`=1 AND `product`.`status`=1 AND `product`.`id` = '$productid->product'")->row();
                        array_push($abc->offerproducts,$offerproducts);
            }
        return $abc;
    }
    public function removefromwishlist($user, $product){
        $query=$this->db->query(" DELETE FROM `userwishlist` WHERE `user`='$user' AND `product`='$product'");
        if($query){
        return 1;
        }
        else{
        return false;
        }
    }
    
    public function getsubscribe($email){
        $query1=$this->db->query("SELECT * FROM `subscribe` WHERE `email`='$email'");
        $num=$query1->num_rows();
        if($num>0)
        {
        return 0;
        }
        else{
        $this->db->query("INSERT INTO `subscribe`(`email`) VALUE('$email')");
        $id=$this->db->insert_id();
        if($id)
        return true;
        else
        return false;
        }
    }
    public function getallcategory(){
    $query=$this->db->query("SELECT `id`, `name`, `parent`, `status`, `order`, `image1`, `image2` FROM `category` WHERE `parent`=0")->result();
        return $query;
    }
     public function gethomecontent(){
    $query=$this->db->query("SELECT `id`,  `image` as `src`, `template`,`link` as `url`,`class`, `text`, `centrealign` as `centerAlign` FROM `banner1` WHERE `status`=1")->result();
        return $query;
    }
    public function getSubCategoryProductHome($id){
    $query['subcategorynames']=$this->db->query("SELECT `homecategoryproduct`.`id`, `homecategoryproduct`.`subcategory`,`subcategory`.`name` FROM `homecategoryproduct` LEFT OUTER JOIN `subcategory` ON `subcategory`.`id`=`homecategoryproduct`.`subcategory` GROUP BY `homecategoryproduct`.`subcategory`")->result();
        $query1=$this->db->query("SELECT `product` FROM `homecategoryproduct` WHERE `subcategory`=$id")->result();
        $productids="(";
            foreach($query1 as $key=>$value){
//            $catid=$row->id;
                if($key==0)
                {
                    $productids.=$value->product;
                }
                else
                {
                    $productids.=",".$value->product;
                }
            }
            $productids.=")";
        if($productids=="()"){
        $productids="(0)";
        }
        $query['product']=$this->db->query("SELECT `id`, `name`, `sku`, `description`, `url`, `visibility`, `price`, `wholesaleprice`, `firstsaleprice`, `secondsaleprice`, `specialpriceto`, `specialpricefrom`, `metatitle`, `metadesc`, `metakeyword`, `quantity`, `status`, `modelnumber`, `brandcolor`, `eanorupc`, `eanorupcmeasuringunits`, `type`, `compatibledevice`, `compatiblewith`, `material`, `color`, `design`, `width`, `height`, `depth`, `portsize`, `packof`, `salespackage`, `keyfeatures`, `videourl`, `modelname`, `finish`, `weight`, `domesticwarranty`, `domesticwarrantymeasuringunits`, `internationalwarranty`, `internationalwarrantymeasuringunits`, `warrantysummary`, `warrantyservicetype`, `coveredinwarranty`, `notcoveredinwarranty`, `size`, `typename`, `subcategory`, `category` FROM `product` WHERE `id` IN $productids")->result();
        return $query;
    }
	
}
?>