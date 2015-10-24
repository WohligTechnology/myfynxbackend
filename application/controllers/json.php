<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller {
    public function placelimitedemail() {
        $limited = json_decode(file_get_contents('php://input'), true);
        print_r($limited['limited']['name']);
        $name = $limited['limited']['name'];
        $email = $limited['limited']['email'];
        $address = $limited['limited']['address'];
        $this->load->library('email');
        $this->email->from('magicmirror.in', 'Lyla');
        $this->email->to($email);
        $this->email->subject('Limited Stock');
        $this->email->message('<img src="http://zibacollection.co.uk/lylalovecouk/img/onformsubmit.jpg" width="560px" height="398px">');
        $this->email->send();
        $data["message"] = $this->email->print_debugger();
        $this->load->view("json", $data);
    }
    public function placelimited() {
        $limited = json_decode(file_get_contents('php://input'), true);
        $name = $limited['limited']['name'];
        $email = $limited['limited']['email'];
        $address = $limited['limited']['address'];
        $data["message"] = $this->order_model->placelimited($name, $email, $address);
        $this->load->view("json", $data);
    }
    public function signupemail() {
        $email = $this->input->get('email');
        $this->load->library('email');
        $this->email->from('info@magicmirror.in', 'Magic Mirror');
        $this->email->to($email);
        $this->email->subject('Welcome to Magic Mirror');
        $message = "<html>

<body style=\"background:url('http://magicmirror.in/emaildata/emailer.jpg')no-repeat center; background-size:cover;\">
    <div style='text-align:center; padding-top: 40px;'>
        <img src='http://magicmirror.in/emaildata/email.png'>
    </div>
    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
        <h4 style='font-size:1.5em;padding-bottom: 5px;color: #e82a96;'>Gorgeous Greetings!</h4>
        <p style='font-size: 1em;padding-bottom: 10px;'>It's really awesome to see you here!</p>
        <p style='font-size: 1em;padding-bottom: 10px;'> Welcome to our exquisite, bright and elegant family of adorable designs and dedicated service.</p>
        <p style='font-size: 1em;padding-bottom: 10px;'>We are sure you are going to love the magical journey we are about to begin!
        </p>
    </div>
    <div style='text-align:center;position: relative;'>
        <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
            Thank You Again
        </p>
        <img src='http://magicmirror.in/emaildata/magicfooter.png '>
    </div>
</body>

</html>";
        $this->email->message($message);
        $this->email->send();
        $data["message"] = $this->email->print_debugger();
        $this->load->view("json", $data);
    }
    public function orderemail() {
        $email = $this->input->get('email');
        $orderid = $this->input->get('orderid');
        
		$table =$this->order_model->getorderitem($this->input->get('orderid'));
		$before=$this->order_model->beforeedit($this->input->get('orderid'));
        
        $todaydata=date("Y-m-d");
        $this->load->library('email');
        $this->email->from('info@magicmirror.in', 'Magicmirror');
        $this->email->to($email);
        $this->email->subject('Magicmirror Order');
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
    <div text-align: center; width: 60%; margin: 0 auto; padding-left: 65px;'>
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
                  Invoice No.:<span>$orderid</span>
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
         
                 <table align='center' border='1' cellpadding='0' cellspacing='0' width='100%' style='border: 0px solid black;padding-bottom: 30px;'>
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
            Thank You Again
        </p>
        <img src='http://magicmirror.in/emaildata/magicfooter.png' style='height: 225px;'>
    </div>
</body>

</html>";
        $this->email->message($message);
        // $this->email->html('<b>hello</b>');
        $this->email->send();
        $data['message'] = $this->email->print_debugger();
        $this->load->view('json', $data);
    }
    function usercontact() {
        $name = $this->input->get_post('name');
        $email = $this->input->get_post('email');
        $phone = $this->input->get_post('phone');
        $comment = $this->input->get_post('comment');
        $data["message"] = $this->user_model->usercontact($id, $name, $email, $phone, $comment);
        
//        $toemail="support@magicmirror.in";
//        $this->load->library('email');
//        $this->email->from($email, 'Magic Mirror');
//        $this->email->to($toemail);
//        $this->email->subject('Magic Mirror Contact');   
//            
//        $message = "<html>
//
//<body style=\"background:url('http://magicmirror.in/emaildata/emailer.jpg')no-repeat center; background-size:cover;\">
//    <div style='text-align:center; padding-top: 40px;'>
//        <img src='http://magicmirror.in/emaildata/email.png'>
//    </div>
//    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
//        <h4 style='font-size:1.5em;padding-bottom: 5px;color: #e82a96;'>Contact</h4>
//        <p style='font-size: 1em;padding-bottom: 10px;'>Name: $name</p>
//        <p style='font-size: 1em;padding-bottom: 10px;'>Email: $email</p>
//        <p style='font-size: 1em;padding-bottom: 10px;'>Contact Number: $phone</p>
//        <p style='font-size: 1em;padding-bottom: 10px;'>Feedback: $comment</p>
//
//    </div>
//    <div style='text-align:center;position: relative;'>
//        <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
//            Thank You
//        </p>
//        <img src='http://magicmirror.in/emaildata/magicfooter.png '>
//    </div>
//</body>
//
//</html>";
//        $this->email->message($message);
//        $this->email->send();
//        $data["message"] = $this->email->print_debugger();
        $this->load->view("json", $data);
    }
    /*function orderitem()
    {
        $carts = json_decode(file_get_contents('php://input'), true);

        //print_r($carts['cart']);


    $data["message"]=$this->order_model->orderitem($carts['cart']);
    $this->load->view("json",$data);
    }*/
    function placeorder() {
        $order = json_decode(file_get_contents('php://input'), true);
        //print_r($order);
        $user = $order['user'];
        $firstname = $order['firstname'];
        $lastname = $order['lastname'];
        $email = $order['email'];
        $billingcontact = $order['billingcontact'];
        $status = $order['status'];
        $company = $order['company'];
        $billingaddress = $order['billingaddress'];
        $billingcity = $order['billingcity'];
        $billingstate = $order['billingstate'];
        $billingcountry = $order['billingcountry'];
        $shippingaddress = $order['shippingaddress'];
        $shippingcity = $order['shippingcity'];
        $shippingcountry = $order['shippingcountry'];
        $shippingstate = $order['shippingstate'];
        $shippingpincode = $order['shippingpincode'];
        $billingpincode = $order['billingpincode'];
        $shippingmethod = $order['shippingmethod'];
        $carts = $order['cart'];
        $finalamount = $order['finalamount'];
        $shippingname = $order['shippingname'];
        $shippingcontact = $order['shippingcontact'];
        $customernote = $order['customernote'];
        $data["message"] = $this->order_model->placeorder($user, $firstname, $lastname, $email,$billingcontact,$billingaddress, $billingcity, $billingstate, $billingcountry, $shippingaddress, $shippingcity, $shippingcountry, $shippingstate, $shippingpincode, $billingpincode, $status, $company, $carts, $finalamount, $shippingmethod, $shippingname, $shippingcontact, $customernote);
        //$data["message"]=$this->order_model->placeorder($user,$firstname,$lastname,$email,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingcountry,$shippingstate,$shippingpincode,$billingpincode,$phone,$status,$company,$fax);
        $this->load->view("json", $data);
    }
    function getusercart() {
        $user = $this->input->get_post('user');
        $data["message"] = $this->order_model->getusercart($user);
        $this->load->view("json", $data);
    }
    function addcartsession() {
        $cart = $this->input->get_post('cart');
        $data["message"] = $this->order_model->addcartsession($cart);
        $this->load->view("json", $data);
    }
    function addtocart() {
         $product = $this->input->get_post('product');
         $productname = $this->input->get_post('productname');
         $quantity = $this->input->get_post('quantity');
         $price = $this->input->get_post('price');
//        $data = json_decode(file_get_contents('php://input'), true);
//        $product=$data['product'];
//        $productname=$data['productname'];
//        $quantity=$data['quantity'];
//        $price=$data['price'];
        $data["message"] = $this->user_model->addtocart($product, $productname, $quantity, $price);
        //$data["message"]=$this->order_model->addtocart($user,$product,$quantity);
        $this->load->view("json", $data);
    }
    function destroycart() {
        $data["message"] = $this->user_model->destroycart();
        $this->load->view("json", $data);
    }
    function showcart() {
        $userid=$this->session->userdata("id");
        if($userid!="")
        {
            $cart = $this->cart->contents();
            $newcart = array();
            foreach ($cart as $item) {
                array_push($newcart, $item);
            }
            $data["message"] = $newcart;
            $this->load->view("json", $data);
        }
        else
        {
            $cart = $this->cart->contents();
            $newcart = array();
            foreach ($cart as $item) {
                array_push($newcart, $item);
            }
            $data["message"] = $newcart;
            $this->load->view("json", $data);
        }
    }
    function totalcart() {
        $data["message"] = $this->cart->total();
        $this->load->view("json", $data);
    }
    function totalitemcart() {
        $data["message"] = $this->cart->total_items();
        $this->load->view("json", $data);
    }
    function searchbyname() {
        $search = $this->input->get_post('search');
        $data["message"] = $this->user_model->searchbyname($search);
        $this->load->view("json", $data);
    }
    function showwishlist() {
        $user = $this->input->get_post('user');
        $data["message"] = $this->wishlist_model->showwishlist($user);
        $this->load->view("json", $data);
    }
    function newsletter() {
        $id = $this->input->get_post('id');
        $email = $this->input->get_post('email');
        $status = $this->input->get_post('status');
        $data["message"] = $this->user_model->newsletter($id, $email, $status);
        $this->load->view("json", $data);
    }
    function registeruser() {
        $data = json_decode(file_get_contents('php://input'), true);
        $firstname=$data['firstname'];
        $lastname=$data['lastname'];
        $email=$data['email'];
        $password=$data['password'];
//        $firstname = $this->input->get_post('firstname');
//        $lastname = $this->input->get_post('lastname');
//        $email = $this->input->get_post('email');
//        $password = $this->input->get_post('password');
        $data["message"] = $this->user_model->registeruser($firstname, $lastname, $email, $password);
        $this->load->view("json", $data);
    }
    function registewholesaler() {
        $firstname = $this->input->get_post('firstname');
        $lastname = $this->input->get_post('lastname');
        $phone = $this->input->get_post('phone');
        $email = $this->input->get_post('email');
        $password = $this->input->get_post('password');
        $data["message"] = $this->user_model->registewholesaler($firstname, $lastname, $phone, $email, $password);
        $this->load->view("json", $data);
    }
    function addtowishlist() {
         $data = json_decode(file_get_contents('php://input'), true);
      $user=$data["user"];
      $product=$data["product"];
        $data["message"] = $this->product_model->addtowishlist($user, $product);
        $this->load->view("json", $data);
    } 
    function removefromwishlist() {
         $data = json_decode(file_get_contents('php://input'), true);
      $user=$data["user"];
      $product=$data["product"];
        $data["message"] = $this->restapi_model->removefromwishlist($user, $product);
        $this->load->view("json", $data);
    }
    function loginuser() {
      $data = json_decode(file_get_contents('php://input'), true);
      $email=$data["email"];
      $password=$data["password"];
        // $email = $this->input->get_post('email');
        // $password = $this->input->get_post('password');
        $data["message"] = $this->user_model->loginuser($email, $password);
        $this->load->view("json", $data);
    }
    public function authenticate() {
        $data['message'] = $this->user_model->authenticate();
        $this->load->view('json', $data);
    }
    public function logout() {
        $this->session->sess_destroy();
        $data['message'] = true;
        $this->load->view('json', $data);
    }
    function deletecart() {
        $id = intval($this->input->get_post("id"));
        $this->user_model->deletecartfromdb($id);
        $cart = $this->cart->contents();
        $newcart = array();
        foreach ($cart as $item) {
            if ($item['id'] != $id) array_push($newcart, $item);
        }
        $this->cart->destroy();
        $this->cart->insert($newcart);
        $data["message"] = $newcart;
        $this->load->view("json", $data);
    }
    function savequantity() {
        $product = $this->input->get_post('product');
        $quantity = $this->input->get_post('quantity');
        $data["message"] = $this->product_model->savequantity($product, $quantity);
        $this->load->view("json", $data);
    }
    function getnavigation() {
        $data["message"] = $this->navigation_model->getnavigation();
        $this->load->view("json", $data);
    }
    function getproductbycategoryold() {
        $color = $this->input->get_post("color");
        $price1 = $this->input->get_post("price1");
        $price2 = $this->input->get_post("price2");
        $category = $this->input->get_post("category");
        $data["message"] = $this->product_model->getproductbycategory($category, $color, $price1, $price2);
        $this->load->view("json", $data);
    }
    function getproductdetails() {
         $id = $this->input->get_post("id");
         $user = $this->input->get_post("user");
//        $user=$this->session->userdata('id');
        $data["message"] = $this->product_model->getproductdetails($id,$user);
        $this->load->view("json", $data);
    }
    function getallslider() {
        $data["message"] = $this->db->query("SELECT `slider`.`id` as `id`,`productimage`.`image` as `image`,`product`.`id` as `link`,`product`.`price` as `price`,`slider`.`order` as `order`  FROM `slider` LEFT OUTER JOIN `product` on `product`.`id`=`slider`.`product` LEFT OUTER JOIN `productimage` ON `productimage`.`product`=`product`.`id` GROUP BY `slider`.`id`  ORDER BY `slider`.`order`,`productimage`.`order`  LIMIT 0,10")->result();
        $this->load->view("json", $data);
    }
    function getdiscountcoupon() {
        $couponcode = $this->input->get_post("couponcode");
        $query = $this->db->query("SELECT * from `discountcoupon` WHERE `couponcode` LIKE '$couponcode' ");
        if ($query->num_rows() > 0) {
            $data['message'] = $query->row();
        } else {
            $data['message'] = false;
        }
        $this->load->view("json", $data);
    }
    public function chargestripe() {
        $token = $this->input->get("token");
        $email = $this->input->get("email");
        $amount = $this->input->get("amount");
        $name = $this->input->get("name");
        $this->load->library('stripe');
        // Configuration options
        $config['stripe_key_test_public'] = 'pk_test_4etgLi16WbODEDr4YBFdcbP0';
        $config['stripe_key_test_secret'] = 'sk_test_h3I0MijdGsdeA4FnOT9CCkcJ';
        $config['stripe_key_live_public'] = 'pk_live_I1udSOaNJK4si3FCMwvHsY4g';
        $config['stripe_key_live_secret'] = 'sk_live_eqZA0JiLo45803pp3nvOmmNC';
        $config['stripe_test_mode'] = FALSE;
        $config['stripe_verify_ssl'] = FALSE;
        // Create the library object
        $stripe = new Stripe($config);
        // Run the required operations
        $customer = json_decode($stripe->customer_create($token, $email));
        $data['message'] = json_decode($stripe->charge_customer($amount, $customer->id, $name));
        $this->load->view("json", $data);
    }
    public function addimagetoproduct() {
        $product = $this->input->get_post("product");
        $image = $this->input->get_post("image");
        $order = $this->input->get_post("order");
        $order=intval($order);
        $order--;
        $image=substr($image,32);
        if ($order == "0") {
            $default = 1;
        } else {
            $default = 0;
        }
        $message=new stdClass();
        $querycheck="INSERT INTO `productimage` (`product`, `image`, `is_default`, `order`, `status`) VALUES ('$product', '$image','$default', '$order', '0')";
        $this->db->query("INSERT INTO `productimage` (`product`, `image`, `is_default`, `order`, `status`) VALUES ('$product', '$image','$default', '$order', '0')");
        $message->product=$product;
        $message->querycheck=$querycheck;
        $message->id=$this->db->insert_id();
        $message->image=$image;
        $message->image=$image;
        $message->order=$order;
//        $data["message"]=$message;
//        $this->load->view("json", $data);
        echo "Done";
    }
    public function addproductcsv() {
        $filepath = $this->input->get_post("filepath");
//        echo $filepath;
        $file = $this->csvreader->parse_file($filepath);
//        print_r($file);
        $id1=$this->product_model->createbycsv($file);
//        echo "<br>".$id1;
        if($id1==0)
        $data['alerterror']="New products could not be Uploaded.";
		else
		$data['alertsuccess']="products Uploaded Successfully.";
//        print_r($data);
        $data['redirect']="site/viewproduct";
        $this->load->view("redirect",$data);
        
//        $image = $this->input->get_post("image");
//        $order = $this->input->get_post("order");
//        if ($order == "1") {
//            $default = 1;
//        } else {
//            $default = 0;
//        }
//        $filepath="http://magicmirror.in/servepublicother?name=$filename"; 
//echo $filepath;
//        $file = $this->csvreader->parse_file($filepath);
//        print_r($file);
//        $id1=$this->product_model->createbycsv($file);
//        echo "<br>".$id1."<br>";
//        if($id1==0)
//        $data['alerterror']="New Products could not be Uploaded.";
//		else
//		$data['alertsuccess']="Products Uploaded Successfully.";
//        print_r($data);
//        $data['redirect']="site/uploadproductcsv";
//        $this->load->view("redirect",$data);
    }
    public function getfile()
    {
    $filepath="http://magicmirror.in/servepublicother?name=product (11).csv"; 
echo $filepath;
        $file = $this->csvreader->parse_file($filepath);
        print_r($file);
    }
    public function nextproduct() {
        $id = $this->input->get_post("id");
        $next = $this->input->get_post("next");
        $sign = ">";
        $orderby = "ASC";
        if ($next == "0") {
            $sign = "<";
            $orderby = "DESC";
        }
        $query = $this->db->query("SELECT `id` FROM `product` WHERE `id`$sign'$id' ORDER BY `id` $orderby  LIMIT 0,1");
        if ($query->num_rows() > 0) {
            $data['message'] = $query->row();
            //return $query;

        } else {
            $searchstring = substr($category, 1);
            $query2 = $this->db->query("SELECT `id` FROM `product` ORDER BY `id` $orderby  LIMIT 0,1");
            if ($query) {
                $data['message'] = $query2->id;
            } else {
                $data['message'] = false;
            }
        }
        $this->load->view('json', $data);
    }
    function getconversionrates() {
        //$continent->name=geoip_continent_code_by_name($ip);
        $data["message"] = $this->currency_model->viewcurrency();
        $this->load->view("json", $data);
    }
    function addproductwaitinglist() {
        $email = $this->input->get_post("email");
        $product = $this->input->get_post("product");
        $data["message"] = $this->product_model->addproductwaitinglist($email, $product);
        $this->load->view('json', $data);
    }
    public function emailcustomerdiscount() {
        $this->order_model->emailcustomerdiscount();
    }
    function getproductbycategory1() {
        $color = $this->input->get_post("color");
        $price1 = $this->input->get_post("price1");
        $price2 = $this->input->get_post("price2");
        $category = $this->input->get_post("category");
        $category=str_replace("-"," ",$category);
		$getcategoryidbyname=$this->db->query("SELECT * FROM `category` WHERE `name`LIKE '$category'")->row();
        $category=$getcategoryidbyname->id;
        $iscategory = " 1 ";
        if ($category != "") {
            $iscategory = " `productcategory`.`category`=$category ";
        }
        $where = "";
        if ($price1 != "") {
            $pricefilter = "AND (`product`.`price` BETWEEN $price1 AND $price2 OR `product`.`price`=$price1 OR `product`.`price`=$price2)";
        } else {
            $pricefilter = "";
        }
        //		$q3 = $this->db->query("SELECT COUNT(*) as `cnt` FROM `category` WHERE `category`.`parent`= '$category'")->row();
        //		if($q3->cnt > 0)
        //			$where .= " OR `category`.`parent`='$category' ";
        //		$query['category']=$this->db->query("SELECT `category`.`name` ,`category`.`image1` FROM `category`
        //		WHERE `category`.`id`='$category'")->row();
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = "`product`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        $elements[1] = new stdClass();
        $elements[1]->field = "`product`.`name`";
        $elements[1]->sort = "1";
        $elements[1]->header = "Name";
        $elements[1]->alias = "name";
        $elements[2] = new stdClass();
        $elements[2]->field = "`product`.`sku`";
        $elements[2]->sort = "1";
        $elements[2]->header = "sku";
        $elements[2]->alias = "sku";
        $elements[3] = new stdClass();
        $elements[3]->field = "`product`.`url`";
        $elements[3]->sort = "1";
        $elements[3]->header = "url";
        $elements[3]->alias = "url";
        $elements[4] = new stdClass();
        $elements[4]->field = "`product`.`price`";
        $elements[4]->sort = "1";
        $elements[4]->header = "price";
        $elements[4]->alias = "price";
        $elements[5] = new stdClass();
        $elements[5]->field = "`product`.`wholesaleprice`";
        $elements[5]->sort = "1";
        $elements[5]->header = "wholesaleprice";
        $elements[5]->alias = "wholesaleprice";
        $elements[6] = new stdClass();
        $elements[6]->field = "`product`.`firstsaleprice`";
        $elements[6]->sort = "1";
        $elements[6]->header = "firstsaleprice";
        $elements[6]->alias = "firstsaleprice";
        $elements[7] = new stdClass();
        $elements[7]->field = "`product`.`secondsaleprice`";
        $elements[7]->sort = "1";
        $elements[7]->header = "secondsaleprice";
        $elements[7]->alias = "secondsaleprice";
        $elements[8] = new stdClass();
        $elements[8]->field = "`product`.`specialpriceto`";
        $elements[8]->sort = "1";
        $elements[8]->header = "specialpriceto";
        $elements[8]->alias = "specialpriceto";
        $elements[9] = new stdClass();
        $elements[9]->field = "`product`.`specialpricefrom`";
        $elements[9]->sort = "1";
        $elements[9]->header = "specialpricefrom";
        $elements[9]->alias = "specialpricefrom";
        $elements[10] = new stdClass();
        $elements[10]->field = "`image1`.`image`";
        $elements[10]->sort = "1";
        $elements[10]->header = "image1";
        $elements[10]->alias = "image1";
        $elements[11] = new stdClass();
        $elements[11]->field = "`image2`.`image`";
        $elements[11]->sort = "1";
        $elements[11]->header = "image2";
        $elements[11]->alias = "image2";
        $elements[12] = new stdClass();
        $elements[12]->field = "`product`.`quantity`";
        $elements[12]->sort = "1";
        $elements[12]->header = "quantity";
        $elements[12]->alias = "quantity";
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 20;
        }
        switch($orderby)
        {
            case "new":
            {
                $orderby = "`product`.`id`";
                $orderorder = "DESC";
            }
            break;
            case "old":
            {
                $orderby = "`product`.`id`";
                $orderorder = "ASC";
            }
            break;
            case "high":
            {
                $orderby = "`product`.`price`";
                $orderorder = "DESC";
            }
            break;
            case "low":
            {
                $orderby = "`product`.`price`";
                $orderorder = "ASC";
            }
            break;
            default: 
            {
                $orderby = "`product`.`id`";
                $orderorder = "DESC";
            }
            break;
        }
        $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `product` INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` INNER JOIN `category` ON `category`.`id`=`productcategory`.`category` LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1", "WHERE `product`.`visibility`=1 AND `product`.`status`=1  AND `product`.`name` LIKE '%$color%' $pricefilter AND (   $iscategory )", ' GROUP BY `product`.`id` ');
        $this->load->view("json", $data);
    }
    function login() {
        $id = $this->input->get_post('id');
        $data["message"] = $this->user_model->loginuser($id);
        $this->load->view("json", $data);
    }
    function createsessionbyid() {
        $id = $this->input->get_post('id');
        $endurl = $this->input->get_post('endurl');
        $data["message"] = $this->user_model->createsessionbyid($id);
        redirect($endurl);
//        		$this->load->view("json",$data);

    }
    function updateorderstatusafterpayment() {
        $orderid = $_POST["orderid"];
        $email=$this->db->query("SELECT `email` FROM `order` WHERE `id`='$orderid'")->row();
        $email=$email->email;
        
        
//        $email = $this->input->get('email');
        $orderid = $this->input->get('orderid');
        
		$table =$this->order_model->getorderitem($this->input->get('orderid'));
		$before=$this->order_model->beforeedit($this->input->get('orderid'));
        
        $todaydata=date("Y-m-d");
        $this->load->library('email');
        $this->email->from('info@magicmirror.in', 'Magicmirror');
        $this->email->to($email);
        $this->email->subject('Magicmirror Order');
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
    <div text-align: center; width: 60%; margin: 0 auto; padding-left: 65px;'>
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
                  Invoice No.:<span>$orderid</span>
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
         
                 <table align='center' border='1' cellpadding='0' cellspacing='0' width='100%' style='border: 0px solid black;padding-bottom: 30px;'>
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
            Thank You Again
        </p>
        <img src='http://magicmirror.in/emaildata/magicfooter.png' style='height: 225px;'>
    </div>
</body>

</html>";
        $this->email->message($message);
        // $this->email->html('<b>hello</b>');
        $this->email->send();
//        $data['message'] = $this->email->print_debugger();
//        $this->load->view('json', $data);
        
        $returnvalue = $this->order_model->updateorderstatusafterpayment($orderid);
        return $returnvalue;
    }
    function socialcheck() {
        //print_r($_POST);
        $displayName = $_POST["displayName"];
        $email = $_POST["email"];
        $photoURL = $_POST["photoURL"];
        $identifier = $_POST["identifier"];
        $birthYear = $_POST["birthYear"];
        $birthMonth = $_POST["birthMonth"];
        $birthDay = $_POST["birthDay"];
        $address = $_POST["address"];
        $region = $_POST["region"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        $provider = $_POST["provider"];
        $query = $this->db->query("SELECT * FROM `user` WHERE `user`.`socialid`='$identifier'");
        if ($query->num_rows == 0) {
            $googleid = "";
            $facebookid = "";
            $twitterid = "";
            switch ($provider) {
                case "Google":
                    $googleid = $user_profile->identifier;
                break;
                case "Facebook":
                    $facebookid = $user_profile->identifier;
                break;
                case "Twitter":
                    $twitterid = $user_profile->identifier;
                break;
            }
            $query2 = $this->db->query("INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `country`, `pincode`, `facebook`, `google`, `twitter`) VALUES (NULL, '$displayName', '', '$email', '3', CURRENT_TIMESTAMP, '1', '$photoURL', '', '$identifier', '$provider', '', '$birthYear-$birthMonth-$birthDay', '', '$address,$region', '$city', '', '$country', '', '$facebookid', '$googleid', '$twitterid')");
            $id = $this->db->insert_id();
            echo $id;
        } else {
            $query = $query->row();
            $id = $query->id;
            echo $id;
        }
    }
    public function reminderemail() {
        $query = $this->db->query("SELECT `usercart`.`user` AS `userid`,`user`.`email` AS `email` FROM `usercart` INNER JOIN `user` ON `user`.`id`=`usercart`.`user`")->result();
        foreach ($query as $row) {
            $email = $row->email;
            $this->load->library('email');
            $this->email->from('info@magicmirror.in', 'Magic Mirror');
            $this->email->to($email);
            $this->email->subject('Welcome to Magic Mirror');
            $message = "<html>

<body style=\"background:url('http://magicmirror.in/emaildata/emailer.jpg')no-repeat center; background-size:cover;\">
    <div style='text-align:center; padding-top: 40px;'>
        <img src='http://magicmirror.in/emaildata/email.png'>
    </div>
    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
        <h4 style='font-size:1.5em;padding-bottom: 5px;color: #e82a96;'>Sparkling Greetings!</h4>
        <p style='font-size: 1em;padding-bottom: 10px;'>We noticed you put together beautiful jewellery in shopping cart on our site but didn't submit your order, wondering if you need any help or if you have any questions about the order before you submit it?</p>



        <p style='font-size: 1em;padding-bottom: 10px;'>If there's anything we can do, drop us a line & email us at <a>support@magicmirror</a>.in with any product or order queries.</p>
        <p style='font-size: 1em;text-align:left;'>
            Your shopping cart
        </p>
        <p style='font-size: 1em;text-align:left;'>
            List of your shopping cart contents below.
        </p>
        <p style='font-size: 1em;padding-bottom: 10px;text-align:left;'>

            <br> Keep Sparkling,
            <br>Team Magic Mirror
        </p>
    </div>
    <div style='text-align:center;position: relative;'>
        <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
            Thank You Again
        </p>
        <img src='http://magicmirror.in/emaildata/magicfooter.png '>
    </div>
</body>

</html>";
//            echo $message;
            $this->email->message($message);
            $this->email->send();
            $data["message"] = $this->email->print_debugger();
            $this->load->view("json", $data);
        }
    }
    
    public function forgotpassword()
    {
         $data = json_decode(file_get_contents('php://input'), true);
        $email=$data['email'];
        $userid=$this->user_model->getidbyemail($email);
//        echo "userid=".$userid."end";
        if($userid=="")
        {
            $data['message']="Not A Valid Email.";
            $this->load->view("json",$data);
        }
        else
        {
        $hashvalue=base64_encode ($userid."&access");
        $link="<a href='http://localhost/pav-bhaji/#/resetpassword/$hashvalue'>Click here </a> To Reset Your Password.";
            
        $this->load->library('email');
        $this->email->from('pooja.wohlig@gmail.com', 'Access');
        $this->email->to($email);
        $this->email->subject('Forgot Password');   
            
        $message = "<html>

<body style=\"background:url('http://magicmirror.in/emaildata/emailer.jpg')no-repeat center; background-size:cover;\">
    <div style='text-align:center; padding-top: 40px;'>
        <img src='http://magicmirror.in/emaildata/email.png'>
    </div>
    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
        <h4 style='font-size:1.5em;padding-bottom: 5px;color: #e82a96;'>Forgot Password!</h4>
        <p style='font-size: 1em;padding-bottom: 10px;'>$link </p>

    </div>
    <div style='text-align:center;position: relative;'>
        <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
            Thank You
        </p>
        <img src='http://magicmirror.in/emaildata/magicfooter.png '>
    </div>
</body>

</html>";
        $this->email->message($message);
        $this->email->send();
        echo $this->email->print_debugger();
//        $data["message"] = $this->email->print_debugger();
//        $data["message"] = 'true';
//        $this->load->view("json", $data);
        
    }
    }
    
    public function forgotpasswordsubmit()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $password=$data['password'];
        $hashcode=$data['hashcode'];
        $data['message']=$this->user_model->forgotpasswordsubmit($hashcode,$password);
        $this->load->view('json',$data);
    }
    
    function getuserorders() 
    {
        $userid = $this->input->get_post('user');
        
        $elements = array();
        
        $elements[0] = new stdClass();
        $elements[0]->field = "`order`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        
        $elements[1] = new stdClass();
        $elements[1]->field = "`product`.`name`";
        $elements[1]->sort = "1";
        $elements[1]->header = "Product Name";
        $elements[1]->alias = "productname";
        
        $elements[2] = new stdClass();
        $elements[2]->field = "DATE(`order`.`timestamp`)";
        $elements[2]->sort = "1";
        $elements[2]->header = "Date";
        $elements[2]->alias = "date";
        
        $elements[3] = new stdClass();
        $elements[3]->field = "`product`.`sku`";
        $elements[3]->sort = "1";
        $elements[3]->header = "sku";
        $elements[3]->alias = "sku";
        
        $elements[4] = new stdClass();
        $elements[4]->field = "`orderitems`.`quantity`";
        $elements[4]->sort = "1";
        $elements[4]->header = "quantity";
        $elements[4]->alias = "quantity";
        
        $elements[5] = new stdClass();
        $elements[5]->field = "`orderitems`.`price`";
        $elements[5]->sort = "1";
        $elements[5]->header = "price";
        $elements[5]->alias = "price";
        
        $elements[6] = new stdClass();
        $elements[6]->field = "`order`.`orderstatus`";
        $elements[6]->sort = "1";
        $elements[6]->header = "status";
        $elements[6]->alias = "status";
        
        $elements[7] = new stdClass();
        $elements[7]->field = "`orderstatus`.`name`";
        $elements[7]->sort = "1";
        $elements[7]->header = "orderstatusname";
        $elements[7]->alias = "orderstatusname";
        
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 5;
        }
        if ($orderby == "") {
            $orderby = "id";
            $orderorder = "ASC";
        }
        $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `orderitems` INNER JOIN `order` ON `order`.`id`=`orderitems`.`order` LEFT OUTER JOIN `product` ON `product`.`id`=`orderitems`.`product` LEFT OUTER JOIN `orderstatus` ON `orderstatus`.`id`=`order`.`orderstatus`","WHERE `order`.`user`='$userid'");
        $this->load->view("json", $data);
    }
    
    
    function getordertrace() {
        $data = json_decode(file_get_contents('php://input'), true);
        $orderid=$data['order'];
        $data["message"] = $this->order_model->getstatusbyorderid($orderid);
        $this->load->view("json", $data);
    }
    function changepassword() {
//        $order = json_decode(file_get_contents('php://input'), true);
//        //print_r($order);
//        $email = $order['form']['email'];
//        $oldpassword = $order['form']['oldpassword'];
//        $newpassword = $order['form']['newpassword'];
//        $confirmpassword = $order['form']['confirmpassword'];
        $data = json_decode(file_get_contents('php://input'), true);
        $email=$data['email'];
        $oldpassword=$data['oldpassword'];
        $newpassword=$data['newpassword'];
        $confirmpassword=$data['confirmpassword'];
        $data["message"] = $this->user_model->changepasswordfront($email, $oldpassword, $newpassword, $confirmpassword);
        $this->load->view("json", $data);
    }
    function getuserdetails(){
        $id=$this->session->userdata('id');
        $data["message"] = $this->user_model->getuserdetails($id);
        $this->load->view("json", $data);
    }
    function updateuser() {
        $data = json_decode(file_get_contents('php://input'), true);
        $id=$data['id'];
        $firstname=$data['firstname'];
        $lastname=$data['lastname'];
        $billingaddress=$data['billingaddress'];
        $email=$data['email'];
        $phone=$data['phone'];
        $billingcity=$data['billingcity'];
        $billingpincode=$data['billingpincode'];
        $billingcountry=$data['billingcountry'];
        $billingstate=$data['billingstate'];
        $data["message"] = $this->user_model->updateuserfront($id,$firstname, $lastname, $billingaddress, $email, $phone, $billingcity,$billingpincode,$billingcountry,$billingstate);
        $this->load->view("json", $data);
    }
    function getuserbyid()
    {
        $id=$this->session->userdata('id');
        $data['message']=$this->user_model->beforeedit($id);
        $this->load->view("json", $data);
    }
    
     public function checkorderstatus()
     {
         $orderid=$this->input->get('orderid');
         $data['message']=$this->order_model->checkorderstatus($orderid);
         $this->load->view('json',$data);
     }
    
     public function getorderforpayment()
     {
         $data['data']=$_GET;
         $this->load->view('paymentpage',$data);
     }
    
    public function productimagereorderbyid()
    {
        $id=$this->input->get_post("id");
        $data['message']=$this->product_model->productimagereorderbyid($id);
        $this->load->view('json',$data);
    }
    public function getbrand()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $elements = array();      
        $elements[0] = new stdClass();
        $elements[0]->field = "`brand`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        
        $elements[1] = new stdClass();
        $elements[1]->field = "`brand`.`name`";
        $elements[1]->sort = "1";
        $elements[1]->header = "Name";
        $elements[1]->alias = "name";
        
        $elements[2] = new stdClass();
        $elements[2]->field = "`brand`.`order`";
        $elements[2]->sort = "1";
        $elements[2]->header = "order";
        $elements[2]->alias = "order";
        
        $elements[3] = new stdClass();
        $elements[3]->field = "`brand`.`logo`";
        $elements[3]->sort = "1";
        $elements[3]->header = "logo";
        $elements[3]->alias = "logo"; 
        
        $elements[4] = new stdClass();
        $elements[4]->field = "`brand`.`isdistributer`";
        $elements[4]->sort = "1";
        $elements[4]->header = "isdistributer";
        $elements[4]->alias = "isdistributer";
        
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 20;
        }
        if ($orderby == "") {
            $orderby = "id";
            $orderorder = "ASC";
        }
        $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `brand`");
        $this->load->view("json", $data);
    }
    
    
       public function getproduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
           
        $brand = $data['brand'];
        $price1 = $data['price1'];
        $price2 = $data['price2'];
        $category = $data['category'];
//        $category=str_replace("-"," ",$category);
		$getcategoryidbyname=$this->db->query("SELECT * FROM `category` WHERE `name`LIKE '$category'")->row();
        $category=$getcategoryidbyname->id;
        $iscategory = " 1 ";
        if ($category != "") {
            $iscategory = " `productcategory`.`category`=$category ";
        }
        $where = "";
        if ($price1 != "") {
            $pricefilter = "AND (`product`.`price` BETWEEN $price1 AND $price2 OR `product`.`price`=$price1 OR `product`.`price`=$price2)";
        } else {
            $pricefilter = "";
        }
        //		$q3 = $this->db->query("SELECT COUNT(*) as `cnt` FROM `category` WHERE `category`.`parent`= '$category'")->row();
        //		if($q3->cnt > 0)
        //			$where .= " OR `category`.`parent`='$category' ";
        //		$query['category']=$this->db->query("SELECT `category`.`name` ,`category`.`image1` FROM `category`
        //		WHERE `category`.`id`='$category'")->row();
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = "`product`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        $elements[1] = new stdClass();
        $elements[1]->field = "`product`.`name`";
        $elements[1]->sort = "1";
        $elements[1]->header = "Name";
        $elements[1]->alias = "name";
        $elements[2] = new stdClass();
        $elements[2]->field = "`product`.`sku`";
        $elements[2]->sort = "1";
        $elements[2]->header = "sku";
        $elements[2]->alias = "sku";
        $elements[3] = new stdClass();
        $elements[3]->field = "`product`.`url`";
        $elements[3]->sort = "1";
        $elements[3]->header = "url";
        $elements[3]->alias = "url";
        $elements[4] = new stdClass();
        $elements[4]->field = "`product`.`price`";
        $elements[4]->sort = "1";
        $elements[4]->header = "price";
        $elements[4]->alias = "price";
        $elements[5] = new stdClass();
        $elements[5]->field = "`product`.`wholesaleprice`";
        $elements[5]->sort = "1";
        $elements[5]->header = "wholesaleprice";
        $elements[5]->alias = "wholesaleprice";
        $elements[6] = new stdClass();
        $elements[6]->field = "`product`.`firstsaleprice`";
        $elements[6]->sort = "1";
        $elements[6]->header = "firstsaleprice";
        $elements[6]->alias = "firstsaleprice";
        $elements[7] = new stdClass();
        $elements[7]->field = "`product`.`secondsaleprice`";
        $elements[7]->sort = "1";
        $elements[7]->header = "secondsaleprice";
        $elements[7]->alias = "secondsaleprice";
        $elements[8] = new stdClass();
        $elements[8]->field = "`product`.`specialpriceto`";
        $elements[8]->sort = "1";
        $elements[8]->header = "specialpriceto";
        $elements[8]->alias = "specialpriceto";
        $elements[9] = new stdClass();
        $elements[9]->field = "`product`.`specialpricefrom`";
        $elements[9]->sort = "1";
        $elements[9]->header = "specialpricefrom";
        $elements[9]->alias = "specialpricefrom";
        $elements[10] = new stdClass();
        $elements[10]->field = "`image1`.`image`";
        $elements[10]->sort = "1";
        $elements[10]->header = "image1";
        $elements[10]->alias = "image1";
        $elements[11] = new stdClass();
        $elements[11]->field = "`image2`.`image`";
        $elements[11]->sort = "1";
        $elements[11]->header = "image2";
        $elements[11]->alias = "image2";
        $elements[12] = new stdClass();
        $elements[12]->field = "`product`.`quantity`";
        $elements[12]->sort = "1";
        $elements[12]->header = "quantity";
        $elements[12]->alias = "quantity";
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 20;
        }
        $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `product` INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` INNER JOIN `category` ON `category`.`id`=`productcategory`.`category` LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1", "WHERE `product`.`visibility`=1 AND `product`.`status`=1  AND `product`.`name` LIKE '%$color%' $pricefilter AND (   $iscategory )", ' GROUP BY `product`.`id` ');
        $this->load->view("json", $data);
    } 
    
    public function getproductbycategory()
    {
        $userid=$this->session->userdata("id");
        $parent = $this->input->get_post("parent");
        $category = $this->input->get_post("category");
        if($parent==0)
        {
        $parent="";
        }
        if($category==0)
        {
        $category="";
        }
        $getproductids=array();
        if ($parent==""){
        $getproductids=$this->db->query("SELECT `product` FROM `productcategory` WHERE `category`= '$category'")->result();
        }
        else{
        $getcategoryids=$this->db->query("SELECT `id` FROM `category` WHERE `parent`= '$parent'")->result();
            $ids="(";
            foreach($getcategoryids as $key=>$value){
//            $catid=$row->id;
                if($key==0)
                {
                    $ids.=$value->id;
                }
                else
                {
                    $ids.=",".$value->id;
                }
            }
            $ids.=")";
             $getproductids=$this->db->query("SELECT `product` FROM `productcategory` WHERE `category` IN $ids")->result(); 
            
        }
         $productids="(";
            foreach($getproductids as $key=>$value){
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
        if($productids=="()")
        {
           $productids="(0)";
        }
//        else
//        {
                $elements = array();
                $elements[0] = new stdClass();
                $elements[0]->field = "`product`.`id`";
                $elements[0]->sort = "1";
                $elements[0]->header = "ID";
                $elements[0]->alias = "id";
                $elements[1] = new stdClass();
                $elements[1]->field = "`product`.`name`";
                $elements[1]->sort = "1";
                $elements[1]->header = "Name";
                $elements[1]->alias = "name";
                $elements[2] = new stdClass();
                $elements[2]->field = "`product`.`sku`";
                $elements[2]->sort = "1";
                $elements[2]->header = "sku";
                $elements[2]->alias = "sku";
                $elements[3] = new stdClass();
                $elements[3]->field = "`product`.`url`";
                $elements[3]->sort = "1";
                $elements[3]->header = "url";
                $elements[3]->alias = "url";
                $elements[4] = new stdClass();
                $elements[4]->field = "`product`.`price`";
                $elements[4]->sort = "1";
                $elements[4]->header = "price";
                $elements[4]->alias = "price";
                $elements[5] = new stdClass();
                $elements[5]->field = "`product`.`wholesaleprice`";
                $elements[5]->sort = "1";
                $elements[5]->header = "wholesaleprice";
                $elements[5]->alias = "wholesaleprice";
                $elements[6] = new stdClass();
                $elements[6]->field = "`product`.`firstsaleprice`";
                $elements[6]->sort = "1";
                $elements[6]->header = "firstsaleprice";
                $elements[6]->alias = "firstsaleprice";
                $elements[7] = new stdClass();
                $elements[7]->field = "`product`.`secondsaleprice`";
                $elements[7]->sort = "1";
                $elements[7]->header = "secondsaleprice";
                $elements[7]->alias = "secondsaleprice";
                $elements[8] = new stdClass();
                $elements[8]->field = "`product`.`specialpriceto`";
                $elements[8]->sort = "1";
                $elements[8]->header = "specialpriceto";
                $elements[8]->alias = "specialpriceto";
                $elements[9] = new stdClass();
                $elements[9]->field = "`product`.`specialpricefrom`";
                $elements[9]->sort = "1";
                $elements[9]->header = "specialpricefrom";
                $elements[9]->alias = "specialpricefrom";
                $elements[10] = new stdClass();
                $elements[10]->field = "`image1`.`image`";
                $elements[10]->sort = "1";
                $elements[10]->header = "image1";
                $elements[10]->alias = "image1";
                $elements[11] = new stdClass();
                $elements[11]->field = "`image2`.`image`";
                $elements[11]->sort = "1";
                $elements[11]->header = "image2";
                $elements[11]->alias = "image2";
                $elements[12] = new stdClass();
                $elements[12]->field = "`product`.`quantity`";
                $elements[12]->sort = "1";
                $elements[12]->header = "quantity";
                $elements[12]->alias = "quantity";
                $elements[13] = new stdClass();
                $elements[13]->field = "`userwishlist`.`user`";
                $elements[13]->sort = "1";
                $elements[13]->header = "isfavid";
                $elements[13]->alias = "isfavid";
                $search = $this->input->get_post("search");
                $pageno = $this->input->get_post("pageno");
                $orderby = $this->input->get_post("orderby");
                $orderorder = $this->input->get_post("orderorder");
                $maxrow = $this->input->get_post("maxrow");
                if ($maxrow == "") {
                    $maxrow = 20;
                }
                $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `product` LEFT OUTER JOIN `userwishlist` ON `userwishlist`.`product`=`product`.`id` AND `userwishlist`.`user`='$userid' LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1", "WHERE `product`.`visibility`=1 AND `product`.`status`=1 AND  `product`.`id` IN $productids", ' GROUP BY `product`.`id` ');
        
        $this->load->view("json", $data);
//        }
    }
    
    // EXCLUSIVE AND NEW ARRIVALS
    
     public function getexclusiveandnewarrival()
    {
        $id = $this->input->get_post("id");
                  
          $userid=$this->session->userdata("id");
        $getproductids=$this->db->query("SELECT * FROM `newarrival` WHERE `type` IN ($id,3)")->result();
          $productids="(";
            foreach($getproductids as $key=>$value)
            {
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
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = "`product`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        $elements[1] = new stdClass();
        $elements[1]->field = "`product`.`name`";
        $elements[1]->sort = "1";
        $elements[1]->header = "Name";
        $elements[1]->alias = "name";
        $elements[2] = new stdClass();
        $elements[2]->field = "`product`.`sku`";
        $elements[2]->sort = "1";
        $elements[2]->header = "sku";
        $elements[2]->alias = "sku";
        $elements[3] = new stdClass();
        $elements[3]->field = "`product`.`url`";
        $elements[3]->sort = "1";
        $elements[3]->header = "url";
        $elements[3]->alias = "url";
        $elements[4] = new stdClass();
        $elements[4]->field = "`product`.`price`";
        $elements[4]->sort = "1";
        $elements[4]->header = "price";
        $elements[4]->alias = "price";
        $elements[5] = new stdClass();
        $elements[5]->field = "`product`.`wholesaleprice`";
        $elements[5]->sort = "1";
        $elements[5]->header = "wholesaleprice";
        $elements[5]->alias = "wholesaleprice";
        $elements[6] = new stdClass();
        $elements[6]->field = "`product`.`firstsaleprice`";
        $elements[6]->sort = "1";
        $elements[6]->header = "firstsaleprice";
        $elements[6]->alias = "firstsaleprice";
        $elements[7] = new stdClass();
        $elements[7]->field = "`product`.`secondsaleprice`";
        $elements[7]->sort = "1";
        $elements[7]->header = "secondsaleprice";
        $elements[7]->alias = "secondsaleprice";
        $elements[8] = new stdClass();
        $elements[8]->field = "`product`.`specialpriceto`";
        $elements[8]->sort = "1";
        $elements[8]->header = "specialpriceto";
        $elements[8]->alias = "specialpriceto";
        $elements[9] = new stdClass();
        $elements[9]->field = "`product`.`specialpricefrom`";
        $elements[9]->sort = "1";
        $elements[9]->header = "specialpricefrom";
        $elements[9]->alias = "specialpricefrom";
        $elements[10] = new stdClass();
        $elements[10]->field = "`image1`.`image`";
        $elements[10]->sort = "1";
        $elements[10]->header = "image1";
        $elements[10]->alias = "image1";
        $elements[11] = new stdClass();
        $elements[11]->field = "`image2`.`image`";
        $elements[11]->sort = "1";
        $elements[11]->header = "image2";
        $elements[11]->alias = "image2";
         
        $elements[12] = new stdClass();
        $elements[12]->field = "`product`.`quantity`";
        $elements[12]->sort = "1";
        $elements[12]->header = "quantity";
        $elements[12]->alias = "quantity";
         
        $elements[13] = new stdClass();
        $elements[13]->field = "`newarrival`.`type`";
        $elements[13]->sort = "1";
        $elements[13]->header = "typeid";
        $elements[13]->alias = "typeid";
         
        $elements[14] = new stdClass();
        $elements[14]->field = "`userwishlist`.`user`";
        $elements[14]->sort = "1";
        $elements[14]->header = "isfavid";
        $elements[14]->alias = "isfavid";
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 20;
        }
        $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `product` LEFT OUTER JOIN `newarrival` ON `newarrival`.`product`=`product`.`id` LEFT OUTER JOIN `userwishlist` ON `userwishlist`.`product`=`product`.`id` AND `userwishlist`.`user`='$userid' LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1", "WHERE `product`.`visibility`=1 AND `product`.`status`=1 AND  `product`.`id` IN $productids", ' GROUP BY `product`.`id` ');
        $this->load->view("json", $data);
    }

    
    // CLIENTS
    
     public function getaboutus()
    {
        
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = "`about`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        $elements[1] = new stdClass();
        $elements[1]->field = "`about`.`image`";
        $elements[1]->sort = "1";
        $elements[1]->header = "image";
        $elements[1]->alias = "image";
        $elements[2] = new stdClass();
        $elements[2]->field = "`about`.`title`";
        $elements[2]->sort = "1";
        $elements[2]->header = "title";
        $elements[2]->alias = "title";
        $elements[3] = new stdClass();
        $elements[3]->field = "`about`.`order`";
        $elements[3]->sort = "1";
        $elements[3]->header = "order";
        $elements[3]->alias = "order";
        $elements[4] = new stdClass();
        $elements[4]->field = "`about`.`status`";
        $elements[4]->sort = "1";
        $elements[4]->header = "status";
        $elements[4]->alias = "status";
       
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 20;
        }
        $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `about`");
        $this->load->view("json", $data);
    }
    
    // BRANDED PRODUCTS
    
    
    public function getproductbybrand()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $userid=$this->session->userdata("id");
        if(empty($data)){
         $data["message"] = 0;
        }
        else
        {
        $brandid=$data['brandid'];
         $getproductids=$this->db->query("SELECT `product` FROM `productbrand` WHERE `brand`='$brandid'")->result();
          $productids="(";
            foreach($getproductids as $key=>$value){
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
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = "`product`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        $elements[1] = new stdClass();
        $elements[1]->field = "`product`.`name`";
        $elements[1]->sort = "1";
        $elements[1]->header = "Name";
        $elements[1]->alias = "name";
        $elements[2] = new stdClass();
        $elements[2]->field = "`product`.`sku`";
        $elements[2]->sort = "1";
        $elements[2]->header = "sku";
        $elements[2]->alias = "sku";
        $elements[3] = new stdClass();
        $elements[3]->field = "`product`.`url`";
        $elements[3]->sort = "1";
        $elements[3]->header = "url";
        $elements[3]->alias = "url";
        $elements[4] = new stdClass();
        $elements[4]->field = "`product`.`price`";
        $elements[4]->sort = "1";
        $elements[4]->header = "price";
        $elements[4]->alias = "price";
        $elements[5] = new stdClass();
        $elements[5]->field = "`product`.`wholesaleprice`";
        $elements[5]->sort = "1";
        $elements[5]->header = "wholesaleprice";
        $elements[5]->alias = "wholesaleprice";
        $elements[6] = new stdClass();
        $elements[6]->field = "`product`.`firstsaleprice`";
        $elements[6]->sort = "1";
        $elements[6]->header = "firstsaleprice";
        $elements[6]->alias = "firstsaleprice";
        $elements[7] = new stdClass();
        $elements[7]->field = "`product`.`secondsaleprice`";
        $elements[7]->sort = "1";
        $elements[7]->header = "secondsaleprice";
        $elements[7]->alias = "secondsaleprice";
        $elements[8] = new stdClass();
        $elements[8]->field = "`product`.`specialpriceto`";
        $elements[8]->sort = "1";
        $elements[8]->header = "specialpriceto";
        $elements[8]->alias = "specialpriceto";
        $elements[9] = new stdClass();
        $elements[9]->field = "`product`.`specialpricefrom`";
        $elements[9]->sort = "1";
        $elements[9]->header = "specialpricefrom";
        $elements[9]->alias = "specialpricefrom";
        $elements[10] = new stdClass();
        $elements[10]->field = "`image1`.`image`";
        $elements[10]->sort = "1";
        $elements[10]->header = "image1";
        $elements[10]->alias = "image1";
        $elements[11] = new stdClass();
        $elements[11]->field = "`image2`.`image`";
        $elements[11]->sort = "1";
        $elements[11]->header = "image2";
        $elements[11]->alias = "image2";
        $elements[12] = new stdClass();
        $elements[12]->field = "`product`.`quantity`";
        $elements[12]->sort = "1";
        $elements[12]->header = "quantity";
        $elements[12]->alias = "quantity";
        $elements[13] = new stdClass();
        $elements[13]->field = "`userwishlist`.`user`";
        $elements[13]->sort = "1";
        $elements[13]->header = "isfavid";
        $elements[13]->alias = "isfavid";
       
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 20;
        }
              $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `product` LEFT OUTER JOIN `productbrand` ON `productbrand`.`product`=`product`.`id`LEFT OUTER JOIN `userwishlist` ON `userwishlist`.`product`=`product`.`id` AND `userwishlist`.`user`='$userid'   LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1", "WHERE `product`.`visibility`=1 AND `product`.`status`=1 AND `product`.`id` IN $productids ", ' GROUP BY `product`.`id` ');
        }
        $this->load->view("json", $data);
    }
    
    public function getofferdetails(){
         $userid=$this->session->userdata("id");
          $data["message"] = $this->restapi_model->getmultipleoffer($userid);
        $this->load->view("json", $data);
    }
   
    public function getwishlistproduct(){
      $data = json_decode(file_get_contents('php://input'), true);
         $user=$data['user'];
         $getproductids=$this->db->query("SELECT `product` FROM `userwishlist` WHERE `user`='$user'")->result();
          $productids="(";
            foreach($getproductids as $key=>$value){
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
        
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = "`product`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        $elements[1] = new stdClass();
        $elements[1]->field = "`product`.`name`";
        $elements[1]->sort = "1";
        $elements[1]->header = "Name";
        $elements[1]->alias = "name";
        $elements[2] = new stdClass();
        $elements[2]->field = "`product`.`sku`";
        $elements[2]->sort = "1";
        $elements[2]->header = "sku";
        $elements[2]->alias = "sku";
        $elements[3] = new stdClass();
        $elements[3]->field = "`product`.`url`";
        $elements[3]->sort = "1";
        $elements[3]->header = "url";
        $elements[3]->alias = "url";
        $elements[4] = new stdClass();
        $elements[4]->field = "`product`.`price`";
        $elements[4]->sort = "1";
        $elements[4]->header = "price";
        $elements[4]->alias = "price";
        $elements[5] = new stdClass();
        $elements[5]->field = "`product`.`wholesaleprice`";
        $elements[5]->sort = "1";
        $elements[5]->header = "wholesaleprice";
        $elements[5]->alias = "wholesaleprice";
        $elements[6] = new stdClass();
        $elements[6]->field = "`product`.`firstsaleprice`";
        $elements[6]->sort = "1";
        $elements[6]->header = "firstsaleprice";
        $elements[6]->alias = "firstsaleprice";
        $elements[7] = new stdClass();
        $elements[7]->field = "`product`.`secondsaleprice`";
        $elements[7]->sort = "1";
        $elements[7]->header = "secondsaleprice";
        $elements[7]->alias = "secondsaleprice";
        $elements[8] = new stdClass();
        $elements[8]->field = "`product`.`specialpriceto`";
        $elements[8]->sort = "1";
        $elements[8]->header = "specialpriceto";
        $elements[8]->alias = "specialpriceto";
        $elements[9] = new stdClass();
        $elements[9]->field = "`product`.`specialpricefrom`";
        $elements[9]->sort = "1";
        $elements[9]->header = "specialpricefrom";
        $elements[9]->alias = "specialpricefrom";
        $elements[10] = new stdClass();
        $elements[10]->field = "`image1`.`image`";
        $elements[10]->sort = "1";
        $elements[10]->header = "image1";
        $elements[10]->alias = "image1";
        $elements[11] = new stdClass();
        $elements[11]->field = "`image2`.`image`";
        $elements[11]->sort = "1";
        $elements[11]->header = "image2";
        $elements[11]->alias = "image2";
        $elements[12] = new stdClass();
        $elements[12]->field = "`product`.`quantity`";
        $elements[12]->sort = "1";
        $elements[12]->header = "quantity";
        $elements[12]->alias = "quantity";
       
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 20;
        }
              $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `product` LEFT OUTER JOIN `productbrand` ON `productbrand`.`product`=`product`.`id` LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1", "WHERE `product`.`visibility`=1 AND `product`.`status`=1 AND `product`.`id` IN $productids ", ' GROUP BY `product`.`id` ');
        

        $this->load->view("json", $data);
    }
    
    
      public function getallproducts()
    {
        $userid=$this->session->userdata("id");
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = "`product`.`id`";
        $elements[0]->sort = "1";
        $elements[0]->header = "ID";
        $elements[0]->alias = "id";
        $elements[1] = new stdClass();
        $elements[1]->field = "`product`.`name`";
        $elements[1]->sort = "1";
        $elements[1]->header = "Name";
        $elements[1]->alias = "name";
        $elements[2] = new stdClass();
        $elements[2]->field = "`product`.`sku`";
        $elements[2]->sort = "1";
        $elements[2]->header = "sku";
        $elements[2]->alias = "sku";
        $elements[3] = new stdClass();
        $elements[3]->field = "`product`.`url`";
        $elements[3]->sort = "1";
        $elements[3]->header = "url";
        $elements[3]->alias = "url";
        $elements[4] = new stdClass();
        $elements[4]->field = "`product`.`price`";
        $elements[4]->sort = "1";
        $elements[4]->header = "price";
        $elements[4]->alias = "price";
        $elements[5] = new stdClass();
        $elements[5]->field = "`product`.`wholesaleprice`";
        $elements[5]->sort = "1";
        $elements[5]->header = "wholesaleprice";
        $elements[5]->alias = "wholesaleprice";
        $elements[6] = new stdClass();
        $elements[6]->field = "`product`.`firstsaleprice`";
        $elements[6]->sort = "1";
        $elements[6]->header = "firstsaleprice";
        $elements[6]->alias = "firstsaleprice";
        $elements[7] = new stdClass();
        $elements[7]->field = "`product`.`secondsaleprice`";
        $elements[7]->sort = "1";
        $elements[7]->header = "secondsaleprice";
        $elements[7]->alias = "secondsaleprice";
        $elements[8] = new stdClass();
        $elements[8]->field = "`product`.`specialpriceto`";
        $elements[8]->sort = "1";
        $elements[8]->header = "specialpriceto";
        $elements[8]->alias = "specialpriceto";
        $elements[9] = new stdClass();
        $elements[9]->field = "`product`.`specialpricefrom`";
        $elements[9]->sort = "1";
        $elements[9]->header = "specialpricefrom";
        $elements[9]->alias = "specialpricefrom";
        $elements[10] = new stdClass();
        $elements[10]->field = "`image1`.`image`";
        $elements[10]->sort = "1";
        $elements[10]->header = "image1";
        $elements[10]->alias = "image1";
        $elements[11] = new stdClass();
        $elements[11]->field = "`image2`.`image`";
        $elements[11]->sort = "1";
        $elements[11]->header = "image2";
        $elements[11]->alias = "image2";
        $elements[12] = new stdClass();
        $elements[12]->field = "`product`.`quantity`";
        $elements[12]->sort = "1";
        $elements[12]->header = "quantity";
        $elements[12]->alias = "quantity";
        $elements[13] = new stdClass();
        $elements[13]->field = "`userwishlist`.`user`";
        $elements[13]->sort = "1";
        $elements[13]->header = "isfavid";
        $elements[13]->alias = "isfavid";
       
        $search = $this->input->get_post("search");
        $pageno = $this->input->get_post("pageno");
        $orderby = $this->input->get_post("orderby");
        $orderorder = $this->input->get_post("orderorder");
        $maxrow = $this->input->get_post("maxrow");
        if ($maxrow == "") {
            $maxrow = 20;
        }
              $data["message"] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, "FROM `product` LEFT OUTER JOIN `productbrand` ON `productbrand`.`product`=`product`.`id` LEFT OUTER JOIN `userwishlist` ON `userwishlist`.`product`=`product`.`id` AND `userwishlist`.`user`='$userid'  LEFT OUTER JOIN `productimage` as `image2` ON `image2`.`product`=`product`.`id` AND `image2`.`order`=0 LEFT OUTER JOIN `productimage` as `image1` ON `image1`.`product`=`product`.`id` AND `image1`.`order`=1", "WHERE `product`.`visibility`=1 AND `product`.`status`=1", ' GROUP BY `product`.`id` ');
        $this->load->view("json", $data);
    }
    
    public function getsubscribe(){
        $email=$this->input->get('email');
        $data['message']=$this->restapi_model->getsubscribe($email);
        $this->load->view("json", $data);
    }
    
    public function getofferproducts(){
      $offerid=$this->input->get('offerid');
        $data['message']=$this->restapi_model->getofferproducts($offerid);
        $this->load->view("json", $data);
    }
    public function getallcategory(){
     $data['message']=$this->restapi_model->getallcategory();
        $this->load->view("json", $data);
    }
    
}
?>
