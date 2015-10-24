<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Order_model extends CI_Model
{
    function placelimited($name,$email,$address)
    {
        $query=$this->db->query("SELECT `id` FROM `limitedstock` WHERE `email`='$email'");
        if($query->num_rows == 0)
        {
            $this->db->query("INSERT INTO `newsletterusers`(`email`, `status`) VALUES ('$email','0')");
            $query=$this->db->query("INSERT INTO `limitedstock`(`name`, `email`, `address`) VALUES ('$name','$email','$address')");
            return true;
        }else{
            return false;
        }
    }
	function getorderstatus1($orderstatus)
	{
		$query="SELECT `name` FROM `orderstatus` WHERE `id`='$orderstatus'";   
		$query=$this->db->query($query)->row();
		return $query;
	}
	function vieworder()
	{
		$query="SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
        WHERE `order`.`orderstatus` <> 1
		ORDER BY `order`.`timestamp` DESC";   
		$query=$this->db->query($query)->result();
		return $query;
	}
	function viewpendingorder()
	{
		$query="SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
        WHERE `order`.`orderstatus` ='1'
		ORDER BY `order`.`timestamp` DESC";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    
	function getusercart($user)
	{
		$query="SELECT `product`.`name`,`product`.`price`, `product`.`wholesaleprice`,`product`.`firstsaleprice`,`usercart`.`user`,`usercart`.`product`,`usercart`.`quantity`,`product`.`id` FROM `product` LEFT JOIN `usercart` ON `product`.`id`=`usercart`.`product` WHERE `usercart`.`user`='$user'";   
		$query=$this->db->query($query)->result();
		return $query;
	}
    function addtocart($user,$product,$quantity)
    {
        $query=$this->db->query("SELECT `user`, `product`, `quantity`, `status`, `timestamp` FROM `usercart` WHERE `user`='$user' AND `product`='$product'");
        if($query->num_rows > 0)
        {
            $query=$this->db->query("UPDATE `usercart` SET `quantity`='$quantity' WHERE '$user'");
        }
        else
        {
            $query=$this->db->query("INSERT INTO `usercart`(`user`, `product`, `quantity`) VALUES ('$user','$product','$quantity')");
        }
    }
    function placeorder($user, $firstname, $lastname, $email,$billingcontact,$billingaddress, $billingcity, $billingstate, $billingcountry, $shippingaddress, $shippingcity, $shippingcountry, $shippingstate, $shippingpincode, $billingpincode, $status, $company, $carts, $finalamount, $shippingmethod, $shippingname, $shippingcontact, $customernote)
	{
        
        $mysession=$this->session->all_userdata();
        
          if($shippingaddress==""){
         $query=$this->db->query("INSERT INTO `order`(`user`, `firstname`, `lastname`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `finalamount`, `billingpincode`,`shippingmethod`,`orderstatus`,`customernote`,`billingcontact`,`shippingcontact`) VALUES ('$user','$firstname','$lastname','$email','$billingaddress','$billingcity','$billingstate','$billingcountry','$billingaddress','$billingcity','$billingcountry','$billingstate','$billingpincode','$finalamount','$billingpincode','$shippingmethod','1','$customernote','$billingcontact','$billingcontact')");
        }
        else{
        $query=$this->db->query("INSERT INTO `order`(`user`, `firstname`, `lastname`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `finalamount`, `billingpincode`,`shippingmethod`,`orderstatus`,`shippingname`,`shippingcontact`,`customernote`,`billingcontact`) VALUES ('$user','$firstname','$lastname','$email','$billingaddress','$billingcity','$billingstate','$billingcountry','$shippingaddress','$shippingcity','$shippingcountry','$shippingstate','$shippingpincode','$finalamount','$billingpincode','$shippingmethod','1','$shippingname','$shippingcontact','$customernote','$billingcontact')");
        }
        
      
        
        $billingaddressforuser=$billingaddress;
        $shippingaddressforuser=$shippingaddress;
        
        $order=$this->db->insert_id();
        $mysession["orderid"]=$order;
        $this->session->set_userdata($mysession);
        foreach($carts as $cart)
        {
            $querycart=$this->db->query("INSERT INTO `orderitems`(`order`, `product`, `quantity`, `price`, `finalprice`) VALUES ('$order','".$cart['id']."','".$cart['qty']."','".$cart['price']."','".$cart['subtotal']."')");
            $quantity=intval($cart['qty']);
            $productid=$cart['id'];
            $this->db->query("UPDATE `product` SET `product`.`quantity`=`product`.`quantity`-$quantity WHERE `product`.`id`='$productid'");
            
            
        }
        
        
		$table =$this->order_model->getorderitem($order);
		$before=$this->order_model->beforeedit($order);
        
        $todaydata=date("Y-m-d");
        $this->load->library('email');
        $this->email->from('info@magicmirror.in', 'Magicmirror');
        $this->email->to($email);
        $this->email->subject('Magic Mirror Order');
        if($before['order']->billingaddress=="")
                        {
            $billingaddress=$before['order']->firstname." ".$before['order']->lastname."<br>".$before['order']->shippingaddress."<br>".$before['order']->shippingcity."<br>".$before['order']->shippingstate."<br>".$before['order']->shippingpincode;
                        
                        }
                        else
                        {
                            $billingaddress=$before['order']->firstname." ".$before['order']->lastname."<br>".$before['order']->billingaddress."<br>".$before['order']->billingcity."<br>".$before['order']->billingstate."<br>".$before['order']->billingpincode;
                        }
        if($before['order']->shippingaddress=="")
                        {
                             $shippingaddress=$before['order']->firstname." ".$before['order']->lastname."<br>".$before['order']->billingaddress."<br>".$before['order']->billingcity."<br>".$before['order']->billingstate."<br>".$before['order']->billingpincode;
                        }
                        else
                        {
                             $shippingaddress=$before['order']->firstname." ".$before['order']->lastname."<br>".$before['order']->shippingaddress."<br>".$before['order']->shippingcity."<br>".$before['order']->shippingstate."<br>".$before['order']->shippingpincode;
                        }
        
        $message="<html><body style=\"background:url('http://magicmirror.in/emaildata/emailer.jpg')no-repeat center; background-size:cover;\">
    <div style='text-align:center; padding-top: 40px;'>
        <img src='http://magicmirror.in/emaildata/email.png'>
    </div>
    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
        <h2 style='padding-bottom: 5px;color: #e82a96;'>Orders Details</h2>
        <table align='center' border='1' cellpadding='2' cellspacing='0' width='100%' style='border: 0px solid black;padding-bottom: 40px;'>
            <tr align='right' style='border: 0px;'>
                <td width='70%' style='border: 0px;'>
&nbsp;
                </td>             
                     <td width='30%' style='border: 0px;'>
                   Date :<span>$todaydata</span> 
                </td>
                                                   </tr> 
                                                   <tr align='right' style='border: 0px;'>
                                                  <td width='70%' style='border: 0px;'>
&nbsp;
                </td> 
                                <td width='30%' style='border: 0px;'>
                  Invoice No.:<span>$order</span>
                </td>
            </tr>
        </table>
        
        <table align='center' border='1' cellpadding='0' cellspacing='0' width='100%' style='border: 0px solid black;padding-bottom: 40px;'>
           <tr>
    <th style='padding: 10px 0;'>Billing Address</th>
    <th style='padding: 10px 0;'>Shipping Address</th> 
  </tr>
          <tr >
              <td width='50%' style='padding: 10px 15px;'>
<p>$billingaddress</p>
</td>
              <td width='50%' style='padding: 10px 15px;'>
<p>$shippingaddress</p>
 </td> 
  </tr>  
        </table>
         
                 <table align='center' border='1' cellpadding='0' cellspacing='0' width='100%' style='border: 0px solid black;padding-bottom: 40px;'>
  <tr>
    <th style='padding: 10px 0;'>Id</th>
    <th style='padding: 10px 0;'>Product</th> 
    <th style='padding: 10px 0;'>Quantity</th>
    <th style='padding: 10px 0;'>Price</th>
    <th style='padding: 10px 0;'>Total Amount</th>
  </tr>";
        $count=1;
        $finalpricetotal=0;
        foreach($table as $row)
        {
            $namesku=$row->name."-".$row->sku;
            $quantity=$row->quantity;
            $price=$row->price;
            $finalprice=$row->finalprice;
            $message.="
            <tr>
                <td align='center' style='padding: 10px 0;'>$count</td>
                <td align='center' style='padding: 10px 0;'>$namesku</td> 
                <td align='center' style='padding: 10px 0;'>$quantity</td>
                <td align='center' style='padding: 10px 0;'>$price</td>
                <td align='center' style='padding: 10px 0;'>$finalprice</td>
              </tr>";
            $finalpricetotal=$finalpricetotal+$value->finalprice;
                            $counter++;
        }
  $message.="
      
        </table>
    </div>
    <div style='text-align:center;position: relative;'>
        <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
            Your Order is Pending.
        </p>
        <img src='http://magicmirror.in/emaildata/magicfooter.png'>
    </div>
</body>

</html>";
        $this->email->message($message);
        // $this->email->html('<b>hello</b>');
        $this->email->send();
                
        $userquery=$this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$billingcontact',`status`='$status',`billingaddress`='$billingaddressforuser',`billingcity`='$billingcity',`billingstate`='$billingstate',`billingcountry`='$billingcountry',`shippingaddress`='$shippingaddressforuser',`shippingcity`='$shippingcity',`shippingcountry`='$shippingcountry',`shippingstate`='$shippingstate',`shippingpincode`='$shippingpincode',`companyname`='$company' WHERE `id`='$user'");
        if($query){
        return 1;
        }
        else{
		return 0;
        }
	}
	
	/*function placeorder($user,$firstname,$lastname,$email,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$billingpincode,$phone,$status,$company,$fax,$carts)
	{
		$query=$this->db->query("INSERT INTO `order`(`user`, `firstname`, `lastname`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `billingpincode`) VALUES ('$user','$firstname','$lastname','$email','$billingaddress','$billingcity','$billingstate','$billingcountry','$shippingaddress','$shippingcity','$shippingcountry','$shippingstate','$shippingpincode','$billingpincode')");
        
       
        $userquery=$this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone',`status`='$status',`billingaddress`='$billingaddress',`billingcity`='$billingcity',`billingstate`='$billingstate',`billingcountry`='$billingcountry',`shippingaddress`='$shippingaddress',`shippingcity`='$shippingcity',`shippingcountry`='$shippingcountry',`shippingstate`='$shippingstate',`shippingpincode`='$shippingpincode',`companyname`='$company',`fax`='$fax' WHERE `id`='$user'");
		return $order;
	}*/
	
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query['order']=$this->db->get( 'order' )->row();
		$query['orderitems']=$this->db->query("SELECT `orderitems`.`quantity`,`orderitems`.`price`,`product`.`name` as `productname`,`product`.`id` as `product`,`productcategory`.`category`,`orderitems`.`product`,`orderitems`.`finalprice`,`orderitems`.`discount`,`category`.`name` as `categoryname` FROM `orderitems`
		INNER JOIN `product` ON `orderitems`.`product`=`product`.`id` AND `orderitems`.`order`='$id'
		INNER JOIN `productcategory` ON `productcategory`.`product`=`product`.`id`
		INNER JOIN `category` ON `productcategory`.`category`=`category`.`id`
		")->result();
		return $query;
	}
	public function beforeedititem( $id )
	{
		$query['orderitems']=$this->db->query("SELECT * FROM `orderitems` WHERE `orderitems`.`id`='$id'")->result();
		return $query;
	}
	
	public function edit($id,$user,$firstname,$lastname,$email,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$currency,$orderstatus,$trackingcode,$billingcontact,$shippingcontact)
	{
		
		$data  = array(
			'user' => $user,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'email' => $email,
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingstate' => $shippingstate,
			'shippingcountry' => $shippingcountry,
			'shippingpincode' => $shippingpincode,
			'currency' => $currency,
			'orderstatus' =>$orderstatus,
			'trackingcode' => $trackingcode,
			'billingcontact' => $billingcontact,
			'shippingcontact' => $shippingcontact
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'order', $data );
		
		if($query)
		{
			$user = $this->session->userdata('id');
			$action ="Order Address Updated";
			$data2  = array(
				'user' => $user,
				'order' => $id,
				'action' => $action,
			);
			$query2=$this->db->insert( 'orderlog', $data2 );
		}
		//$this->db->query("DELETE FROM `orderitems` WHERE `order`='$id'");
		/*foreach($product as $key => $productid)
		{
			$productetail=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
			$productdata = array(
				'order' => $id,
				'product' => $productid,
				'quantity' => $quantity[$key],
				'price' => $productprice[$key],
			);
			$this->db->insert( 'orderitems', $productdata );
		}*/
		return 1;
	}
    public function updateorderitem($id,$order,$product,$price,$quantity,$discount,$finalprice)
	{
		
		$data  = array(
			'order' => $order,
			'product' => $product,
			'price' => $price,
			'quantity' => $quantity,
			'discount' => $discount,
			'finalprice' => $finalprice
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'orderitems', $data );
    }
    
    
    public function createorder($user,$firstname,$lastname,$email,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$currency,$orderstatus,$trackingcode,$billingcontact,$shippingcontact)
	{
		
		$data  = array(
			'user' => $user,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'email' => $email,
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingstate' => $shippingstate,
			'shippingcountry' => $shippingcountry,
			'shippingpincode' => $shippingpincode,
			'currency' => $currency,
			'orderstatus' =>$orderstatus,
			'trackingcode' => $trackingcode,
			'billingcontact' => $billingcontact,
			'shippingcontact' => $shippingcontact
		);
		$query=$this->db->insert( 'order', $data );
		
		if($query)
		{
			$user = $this->session->userdata('id');
			$action ="Order Address Updated";
			$data2  = array(
				'user' => $user,
				'action' => $action,
			);
			$query2=$this->db->insert( 'orderlog', $data2 );
		}
		//$this->db->query("DELETE FROM `orderitems` WHERE `order`='$id'");
		/*foreach($product as $key => $productid)
		{
			$productetail=$this->db->query("SELECT * FROM `product` WHERE `id`='$productid'")->row();
			$productdata = array(
				'order' => $id,
				'product' => $productid,
				'quantity' => $quantity[$key],
				'price' => $productprice[$key],
			);
			$this->db->insert( 'orderitems', $productdata );
		}*/
		return 1;
	}
    public function createorderitems($order,$product,$price,$quantity,$discount,$finalprice)
	{
		
		$data  = array(
			'order' => $order,
			'product' => $product,
			'price' => $price,
			'quantity' => $quantity,
			'discount' => $discount,
			'finalprice' => $finalprice
		);
		$query=$this->db->insert( 'orderitems', $data );
		
	}
	function deleteorder($id)
	{
		$query=$this->db->query("DELETE FROM `order` WHERE `id`='$id'");
        $query=$this->db->query("DELETE FROM `orderitems` WHERE `order`='$id'");
	}
    function deleteorderitem($id)
	{
		$query=$this->db->query("DELETE FROM `orderitems` WHERE `id`='$id'");
	}
	public function getuser()
	{
		$query=$this->db->query("SELECT * FROM `user` WHERE `accesslevel`=2 ORDER BY `name` ASC" )->result();
		$return=array(
		
		);
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname." ".$row->lastname;
		}
		return $return;
	}
	public function getorderstatus()
	{
		$query=$this->db->query("SELECT * FROM `orderstatus` ORDER BY `name` ASC" )->result();
		$return=array(
		
		);
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		return $return;
	}
	function getproductbycategory($category)
	{
		$query=$this->db->query("SELECT `product`.`id`,`product`.`name` FROM `product`
		INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` AND `productcategory`.`category`='$category'
		ORDER BY `name` ASC" )->result();
		
		return $query;
	}
	function getproductdetails($category,$product)
	{
		$query=$this->db->query("SELECT `product`.`id`,`product`.`name`,`category`.`name` as `categoryname`,`product`.`price`,`product`.`wholesaleprice`,`product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpricefrom`,`product`.`specialpriceto` FROM `product`
		INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` 
		INNER JOIN `category` ON `category`.`id`=`productcategory`.`category` 
		AND `category`.`id`='$category'
		ORDER BY `name` ASC" )->row();
		
		return $query;
	}
    
	function getorderitem($id)
	{
        $query=$this->db->query("SELECT `orderitems`.`id`,`order`.`firstname`,`orderitems`.`order`,`orderitems`.`product`,`product`.`name`,`product`.`sku`, `orderitems`.`quantity`,`orderitems`.`price`,`orderitems`.`discount`,`orderitems`.`finalprice` FROM `orderitems`
		INNER JOIN `order` ON `order`.`id`=`orderitems`.`order` 
		INNER JOIN `product` ON `product`.`id`=`orderitems`.`product` AND `orderitems`.`order`='$id'
        " )->result();
		
		return $query;
	}
    
    
	public function getorderdropdown()
	{
		$query=$this->db->query("SELECT * FROM `order`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname." ".$row->lastname;
		}
		
		return $return;
	}
    
    function exportordercsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,`order`.`timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
		ORDER BY `order`.`timestamp` DESC");

       $content= $this->dbutil->csv_from_result($query);
        $timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        //$data = 'Some file data';

//        file_put_contents("gs://magicmirroruploads/orders_$timestamp.csv", $content);
//		redirect("http://magicmirror.in/servepublic?name=orders_$timestamp.csv", 'refresh');
        //$data = 'Some file data';
//magicmirroruploads
        if ( ! write_file('./csvgenerated/orderfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url('csvgenerated/orderfile.csv'), 'refresh');
             echo 'File written!';
        }
	}
    function exportorderitemcsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `order`.`id` AS `Order ID`,`order`.`timestamp` AS `Date`,'Completed' AS `Order status`,'0' AS `Shipping`,'0' AS `Shipping Tax`,'0' AS `OrderDiscount`,`product`.`id` AS `ProductID`,`product`.`name` AS `Item Name`,`product`.`price` AS `Item Amount`,`product`.`quantity`AS`Quantity`, `order`.`email` AS `Email`,`orderstatus`.`name` AS `Status`
        FROM `orderitems`
		INNER JOIN `order` ON `order`.`id`=`orderitems`.`order` 
		INNER JOIN `product` ON `product`.`id`=`orderitems`.`product`
        LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`");

       $content= $this->dbutil->csv_from_result($query);
        
        $timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        
//        file_put_contents("gs://magicmirroruploads/orderItems_$timestamp.csv", $content);
//		redirect("http://magicmirror.in/servepublic?name=orderItems_$timestamp.csv", 'refresh');
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/orderitemfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url('csvgenerated/orderitemfile.csv'), 'refresh');
             echo 'File written!';
        }
	}
    
//	function getorderitemforchange($id)
//	{
//        $query=$this->db->query("SELECT `order`.`id` AS `Order ID`,`order`.`timestamp` AS `Date`,'Completed' AS `Order status`,'0' AS `Shipping`,'0' AS `Shipping Tax`,'0' AS `OrderDiscount`,`product`.`id` AS `ProductID`,`product`.`name` AS `Item Name`,`product`.`price` AS `Item Amount`,`product`.`quantity`AS`Quantity`, `order`.`email` AS `Email`
//        FROM `orderitems`
//		INNER JOIN `order` ON `order`.`id`=`orderitems`.`order` 
//		INNER JOIN `product` ON `product`.`id`=`orderitems`.`product`
//        " )->result();
//		
//		return $query;
//	}
    
    function emailcustomerdiscount()
    {
        $date = new DateTime('7 days ago');
        $date=$date->format('Y-m-d');
        $query=$this->db->query("SELECT `order`.`id` as `id`,`order`.`firstname` as `firstname`,`order`.`lastname` as `lastname`,`order`.`email` as `email`,`order`.`user` as `user`,`order`.`orderstatus` as `orderstatusid`,`orderstatus`.`name` as `orderstatus`,`order`.`totalamount`,`order`.`discountamount`,`order`.`finalamount`,`order`.`trackingcode`,DATE(`order`.`timestamp`) AS `timestamp` FROM `order` 	
		LEFT OUTER JOIN  `user` ON `user`.`id`=`order`.`user`
		LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`
		LEFT OUTER JOIN `currency` ON `currency`.`id`=`order`.`currency`
WHERE DATE(`order`.`timestamp`) = '$date'")->result();
        foreach($query as $row)
        {
            $email=$row->email;
        $email = explode(",", $email);
//            $email=$this->input->get('email');
//            $orderid=$this->input->get('orderid');
            $this->load->library('email');
            $this->email->from('magicmirrorm.in', 'Magicmirror');
            $this->email->to($email);

            $this->email->subject('Lyla');
            $this->email->message('Thank You.<br><img src="http://zibacollection.co.uk/lylalovecouk/img/orderlyla.jpg" width="560px" height="398px">');
          // $this->email->html('<b>hello</b>');

            $this->email->send();

            $data["message"]=$this->email->print_debugger();
            $this->load->view("json",$data);
        
        }
        
    }
    function updateorderstatusafterpayment($orderid)
    {
        $query=$this->db->query("UPDATE `order` SET `orderstatus`=2 WHERE `id`=$orderid");
        return $query;
    }
    
	function getstatusbyorderid($orderid)
	{
		$query=$this->db->query("SELECT `order`.`orderstatus` AS `orderid`,`orderstatus`.`name` AS `orderstatusname` FROM `order` LEFT OUTER JOIN `orderstatus` ON `order`.`orderstatus`=`orderstatus`.`id` WHERE `order`.`id`='$orderid'" )->row();
//		$query=$query->orderstatus;
		return $query;
	}
    
	public function checkorderstatus($orderid)
    {
        $query=$this->db->query("SELECT `orderstatus` FROM `order` WHERE `id`='$orderid'")->row();
        $status=$query->orderstatus;
        if($status==2)
        {
            return 1;
        }
        else
        {
            return 0;
        }
//        return $query;
	}
    
}
?>