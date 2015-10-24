<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class User_model extends CI_Model
{
	protected $id,$username ,$password;
	public function validate($username,$password )
	{

		$password=md5($password);
		$query ="SELECT `id`,`firstname`,`lastname`,`name`,`email`,`accesslevel` FROM `user` WHERE `email` LIKE '$username' AND `password` LIKE '$password' ";
		$row =$this->db->query( $query );
		if ( $row->num_rows() > 0 ) {
			$row=$row->row();
			$this->id       = $row->id;
			$this->name = $row->name;
			$this->email = $row->email;
			$this->firstname = $row->firstname;
			$this->lastname = $row->lastname;
			$newdata        = array(
				'id' => $this->id,
				'email' => $this->email,
				'name' => $this->name ,
				'firstname' => $this->firstname ,
				'lastname' => $this->lastname ,
				'accesslevel' => $row->accesslevel ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
			return true;
		} //count( $row_array ) == 1
		else
			return false;
	}

	public function create($name,$firstname,$lastname,$password,$accesslevel,$email,$phone,$status,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$currency,$companyname,$companyregistrationno,$vatnumber,$country)
	{
		$data  = array(
            'companyname'=>$companyname,
            'companyregistrationno'=>$companyregistrationno,
            'vatnumber'=>$vatnumber,
            'country'=>$country,
			'password' =>md5($password),
			'name' => $name,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'accesslevel' => $accesslevel,
			'email' => $email,
			'phone' => $phone,
			'status' =>$status,
			'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingstate' => $shippingstate,
			'shippingcountry' => $shippingcountry,
			'currency' => $currency,
		);

		$query=$this->db->insert( 'user', $data );
		$id=$this->db->insert_id();
		if($query)
		{
			$user = $this->session->userdata('id');
			$this->saveuserlog($id,'User Created',$user);

		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewusers()
	{
		$query="SELECT `user`.`id` as `id`,`user`.`name` as `name`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`user`.`status` as `status`,`accesslevel`.`name` as `accesslevel`,`user`.`companyname`,`user`.`country`,`country`.`name` as `countryname` FROM `user`
		LEFT JOIN `accesslevel` ON `user`.`accesslevel` = `accesslevel`.`id`
		LEFT JOIN `country` ON `user`.`country` = `country`.`id`
		ORDER BY `user`.`id` ASC";

		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'user' )->row();
		return $query;
	}

	public function edit($id,$name,$firstname,$lastname,$password,$accesslevel,$email,$phone,$status,$billingaddress,$billingcity,$billingstate,$billingcountry,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$currency,$companyname,$companyregistrationno,$vatnumber,$country)
	{
		$data  = array(
            'companyname'=>$companyname,
            'companyregistrationno'=>$companyregistrationno,
            'vatnumber'=>$vatnumber,
            'country'=>$country,
			'name' => $name,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'accesslevel' => $accesslevel,
			'email' => $email,
			'phone' => $phone,
			'status' =>$status,
			/*'billingaddress' => $billingaddress,
			'billingcity' => $billingcity,
			'billingstate' => $billingstate,
			'billingcountry' => $billingcountry,
			'shippingaddress' => $shippingaddress,
			'shippingcity' => $shippingcity,
			'shippingstate' => $shippingstate,
			'shippingcountry' => $shippingcountry,*/
			'currency' => $currency,
		);
		if($password != "")
			$data['password']=md5($password);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$user = $this->session->userdata('id');
			$this->saveuserlog($id,'User Details Edited',$user);

		}
		return 1;
	}
      function sociallogin($user_profile,$provider)
    {
        $query=$this->db->query("SELECT * FROM `user` WHERE `user`.`socialid`='$user_profile->identifier'");
        if($query->num_rows == 0)
        {

					$googleid="";
					$facebookid="";
					$twitterid="";
					switch($provider)
					{
						case "Google":
						$googleid=$user_profile->identifier;
						break;
						case "Facebook":
						$facebookid=$user_profile->identifier;
						break;
						case "Twitter":
						$twitterid=$user_profile->identifier;
						break;
					}

            $query2=$this->db->query("INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `country`, `pincode`, `facebook`, `google`, `twitter`) VALUES (NULL, '$user_profile->displayName', '', '$user_profile->email', '3', CURRENT_TIMESTAMP, '1', '$user_profile->photoURL', '', '$user_profile->identifier', '$provider', '', '$user_profile->birthYear-$user_profile->birthMonth-$user_profile->birthDay', '', '$user_profile->address,$user_profile->region', '$user_profile->city', '', '$user_profile->country', '', '$facebookid', '$googleid', '$twitterid')");
            $id=$this->db->insert_id();
            $newdata = array(
                'email'     => $user_profile->email,
                'password' => "",
                'logged_in' => true,
                'id'=> $id,
                'name'=> $user_profile->displayName,
                'image'=> $user_profile->photoURL,
                'logintype'=>$provider
            );

            $this->session->set_userdata($newdata);

            return $newdata;

        }
        else
        {
            $query=$query->row();
            $newdata = array(
                'email'     => $user_profile->email,
                'password' => "",
                'logged_in' => true,
                'id'=> $query->id,
                'name'=> $user_profile->displayName,
                'image'=> $user_profile->photoURL,
                'logintype'=>$provider
            );

            $this->session->set_userdata($newdata);

            return $newdata;
        }
    }
	function deleteuser($id)
	{
		$query=$this->db->query("DELETE FROM `user` WHERE `id`='$id'");
	}
	function changepassword($id,$password)
	{
		$data  = array(
			'password' =>md5($password),
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	public function getaccesslevels()
	{
		$return=array();
		$query=$this->db->query("SELECT * FROM `accesslevel` ORDER BY `id` ASC")->result();
		$accesslevel=$this->session->userdata('accesslevel');
			foreach($query as $row)
			{
				if($accesslevel==1)
				{
					$return[$row->id]=$row->name;
				}
				else if($accesslevel==2)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==3)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==4)
				{
					if($row->id == $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
			}

		return $return;
	}
	function changestatus($id)
	{
		$query=$this->db->query("SELECT `status` FROM `user` WHERE `id`='$id'")->row();
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
		$query=$this->db->update( 'user', $data );
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
	public function getcountry()
	{
		$query=$this->db->query("SELECT * FROM `country`  ORDER BY `name` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
            $return[$row->nicename]=$row->name;
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
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$user = $this->session->userdata('id');
			$this->saveuserlog($id,'User Address Edited',$user);

		}
		return 1;
	}
	function addcredits($id,$credits)
	{
		$query=$this->db->query("UPDATE `user` SET `credits`=`credits`+$credits WHERE `id`='$id'");
		if($query)
		{
			$user = $this->session->userdata('id');
			$this->saveuserlog($id,"User Credits Edited, Credits: $credits",$user);

		}
		return 1;
	}
	function saveuserlog($id,$action,$fromuser)
	{
		$data2  = array(
			'user' => $id,
			'fromuser' => $fromuser,
			'action' => $action,
		);
		$query2=$this->db->insert( 'userlog', $data2 );
	}














    function registeruser($firstname,$lastname,$email,$password)
    {
    	$newdata=0;
        $password=md5($password);
        //echo $email;
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email'");
				$num=$query->num_rows();

        if($num == 0)
        {
             $this->db->query("INSERT INTO `user`(`firstname`, `lastname`, `email`, `password`) VALUE('$firstname','$lastname','$email','$password')");
            $user=$this->db->insert_id();
            $this->db->query("INSERT INTO `newsletterusers`(`user`, `email`, `status`) VALUES ('$user','$email','0')");
            $newdata = array(
                    'id' => $user,
                    'email' => $email,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'logged_in' => 'true'
            );

            $this->session->set_userdata($newdata);


        }
        else
        {
						$newdata=false;

				}
        return $newdata;

    }
    function registewholesaler($firstname,$lastname,$phone,$email,$password)
    {
        $password=md5($password);

        $query=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email'");
        if($query->num_rows == 0)
        {
             $this->db->query("INSERT INTO `user`(`firstname`, `lastname`, `email`,`phone`, `password`,`accesslevel`) VALUE('$firstname','$lastname','$email','$phone','$password','3')");
            $user=$this->db->insert_id();
            $newdata = array(
                    'id' => $user,
                    'email' => $email,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'logged_in' => 'true'
            );

            $this->session->set_userdata($newdata);

               return $newdata;
        }
        else
         return false;
    }
    function loginuser($email,$password)
    {
        $password=md5($password);
        $query=$this->db->query("SELECT `id`,`firstname`,`lastname`,`username`,`name` FROM `user` WHERE `email`='$email' AND `password`= '$password'");
        if($query->num_rows > 0)
        {
            $user=$query->row();
            $userid=$user->id;
            $firstname=$user->firstname;
            $lastname=$user->lastname;
            $username=$user->username;
            $name=$user->name;


            $newdata = array(
                'email'     => $email,
                'firstname'     => $firstname,
                'lastname'     => $lastname,
                'username'     => $username,
                'name'     => $name,
                'logged_in' => 'true',
                'id'=> $userid
            );

            $this->session->set_userdata($newdata);

            return $newdata;
        }
        else
        return false;
    }

    function createsessionbyid($id)
    {
        $query=$this->db->query("SELECT * FROM `user` WHERE `user`.`id`='$id'");
            $query=$query->row();
            $newdata = array(
                'email'     => $query->email,
                'password' => "",
                'logged_in' => 'true',
                'id'=> $query->id,
                'name'=> $query->name,
                'image'=> $query->image
            );

            $this->session->set_userdata($newdata);

            return $newdata;

    }

    function newsletter($id,$email,$status)
    {
        $query=$this->db->query("SELECT `email` FROM `newsletterusers` WHERE `email`='$email'");
        if($query->num_rows > 0)
        {
            return true;
        }
        else
        {
            $this->db->query("INSERT INTO `newsletterusers`(`user`, `email`, `status`) VALUES ('$id','$email','$status')");
            $newsletter=$this->db->insert_id();

//            $email=$row->email;
            $this->load->library('email');
            $this->email->from('info@magicmirror.in', 'Magic Mirror');
            $this->email->to($email);

            $this->email->subject('Magic Mirror');
            $message="<html>

<body style=\"background:url('http://magicmirror.in/emaildata/emailer.jpg')no-repeat center; background-size:cover;\">
    <div style='text-align:center; padding-top: 40px;'>
        <img src='http://magicmirror.in/emaildata/email.png'>
    </div>
    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
        <h4 style='font-size: 3vw;padding-bottom: 5px;color: #e82a96;'>Sparkling Greetings!</h4>
        <p style='font-size: 2vw;padding-bottom: 10px;'>You are subscribed to the world of elegant & exquisite jewellery.</p>
        <p style='font-size: 2vw;padding-bottom: 10px;'> We will be updating you all the latest & masterpiece design of Magic Mirror, of course with gorgeous & exclusive collection for every occasion.</p>
        <p style='font-size: 2vw;padding-bottom: 10px;'>It was our pleasure to share some masterpiece design with you!
        </p>
        <p style='font-size: 2vw;padding-bottom: 10px;'>See you again!
        </p>
        <p style='font-size: 2vw;padding-bottom: 10px;text-align:left;'>
            <br> Keep Sparkling,
            <br>Team Magic Mirror
        </p>
    </div>
    <div style='text-align:center;position: relative;'>
        <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 2vw;margin: 0; letter-spacing:2px; font-weight: bold;'>
            Thank You Again
        </p>
        <img src='http://magicmirror.in/emaildata/magicfooter.png'>
    </div>
</body>

</html>";
            echo $message;
            $this->email->message($message);

            $this->email->send();

             $data["message"]=$this->email->print_debugger();
            $this->load->view("json",$data);

            return $newsletter;
        }
    }
    function usercontact($id,$name,$email,$phone,$comment)
    {
        $this->db->query("INSERT INTO `contact` (`id`, `name`, `email`, `telephone`, `comment`) VALUES ('', '$name', '$email', '$phone', '$comment');");
            $contact=$this->db->insert_id();
            return $contact;
    }
    function authenticate() {
         $is_logged_in = $this->session->userdata( 'logged_in' );
//        return $is_logged_in;
        //print_r($this->session->userdata( 'logged_in' ));
        if ( $is_logged_in != true) {
            return false;
        } //$is_logged_in !== 'true' || !isset( $is_logged_in )
        else {
		$userid=$this->session->userdata('id');
		$query=$this->db->query("SELECT * FROM `user` WHERE `id`='$userid'")->row();
           // $userid = $this->session->userdata( );
         return $query;
        }
    }
    function searchbyname($search)
    {
           // $query=$this->db->query("SELECT `product`.`id`,`product`.`name`,`product`.`sku`,`product`.`description`,`product`.`url`,`product`.`price`,`product`.`wholesaleprice`, `product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`, `productimage`.`image`,`category`.`name` FROM `product` INNER JOIN `productcategory` ON `product`.`id`=`productcategory`.`product` LEFT OUTER JOIN `productimage` ON `productimage`.`product`=`product`.`id` LEFT OUTER JOIN `category` ON `category`.`id`=`productcategory`.`category` WHERE `product`.`name` LIKE '%$search%' OR `product`.`description` LIKE '%$search%' OR `category`.`name` LIKE '%$search%'");

        $whattosearch=array("`product`.`name`","`product`.`description`","`product`.`sku`");
        $search=explode(" ",$search);

        $where=" WHERE ";
        foreach($whattosearch as $key=>$what) {
            if($key!=0)
            {
                $where.=" OR ( ";
            }
            else
            {
                $where.=" ( ";
            }


            foreach($search as $key2=>$sea)
            {
                if($key2!=0)
                {
                    $where.=" AND $what LIKE '%$sea%' ";
                }
                else
                {
                    $where.=" $what LIKE '%$sea%' ";
                }
            }
            $where.=" ) ";
        }
        //echo $where;

            $query=$this->db->query("SELECT `product`.`id`,`product`.`name`,`product`.`sku`,`product`.`description`,`product`.`url`,`product`.`price`,`product`.`wholesaleprice`, `product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`productimage`.`image` FROM `product` INNER JOIN `productimage` ON `productimage`.`product`=`product`.`id` $where  GROUP BY `product`.`id`");
        //echo "SELECT `product`.`id`,`product`.`name`,`product`.`sku`,`product`.`description`,`product`.`url`,`product`.`price`,`product`.`wholesaleprice`, `product`.`firstsaleprice`,`product`.`secondsaleprice`,`product`.`specialpriceto`,`product`.`specialpricefrom`,`productimage`.`image` FROM `product` INNER JOIN `productimage` ON `productimage`.`product`=`product`.`id` $where  GROUP BY `product`.`id`";

//            foreach($query as $p_row)
//		{
//			$productid = $p_row->id;
//			$query5=$this->db->query("SELECT count(`category`) as `isnew`  FROM `productcategory`
//			WHERE  `productcategory`.`category`='31' AND `product`='$productid'
//			LIMIT 0,1")->row();
//			$p_row->isnew=$query5->isnew;
//
//		}
        return $query->result();
    }



    function addtocart($product,$productname,$quantity,$price) {
        //$data=$this->cart->contents();

        $image=$this->db->query("SELECT `image` FROM `productimage` WHERE `product` = '$product' LIMIT 0,1")->row();
        $image=$image->image;
        
        $data = array(
               'id'      => $product,
               'name'      => '1',
               'qty'     => $quantity,
               'price'   => $price,
               'image'   => $image,
                'options' =>array(
                    'realname' => $productname
                )
        );
        //array_push($data,$data2);
        $userid=$this->session->userdata('id');
        if($userid=="")
        {
            $this->cart->insert($data);
            $returnval=$this->cart->insert($data);
            if(!empty($returnval)){
            return true;
            }
            else{
            return false;
            }
        }
        else
        {
            $query=$this->db->query("INSERT INTO `usercart`(`user`, `product`, `quantity`, `status`, `timestamp`) VALUES ('$userid','$product','$quantity',1,NULL)");
            $this->cart->insert($data);
            if($query)
            return true;
            else
            return false;
        }
         
    }
    function updatecart($rowid,$qty,$id){
    $data = array(
               'rowid' => $rowid,
               'qty'   => $qty
            );

        $this->cart->update($data); 
        return $this->cart->contents();
    }

    function destroycart() {
        $this->cart->destroy();
        $orderid=$this->session->userdata("orderid");
        $this->db->query("UPDATE `order` SET `orderstatus`='2' WHERE `id`='$orderid'");
        return 0;
    }

    function exportusercsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `user`.`id` as `id`,`user`.`name` as `name`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`user`.`email` as `Email`,`user`.`status` as `status`,`accesslevel`.`name` as `accesslevel`,`user`.`companyname`,`user`.`country`,`country`.`name` as `countryname` FROM `user`
		LEFT JOIN `accesslevel` ON `user`.`accesslevel` = `accesslevel`.`id`
		LEFT JOIN `country` ON `user`.`country` = `country`.`id`
		ORDER BY `user`.`id` ASC");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
//        file_put_contents("gs://magicmirroruploads/users_$timestamp.csv", $content);
//		redirect("http://magicmirror.in/servepublic?name=users_$timestamp.csv", 'refresh');
        if ( ! write_file('./csvgenerated/userfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url('csvgenerated/userfile.csv'), 'refresh');
             echo 'File written!';
        }
	}
    
	function getidbyemail($useremail)
	{
		$query = $this->db->query("SELECT `id` FROM `user`
		WHERE `email`='$useremail'")->row();
        $userid=$query->id;
		return $userid;
	}
    
    
    function forgotpasswordsubmit($hashcode,$password)
    {
        $normalfromhash=base64_decode ($hashcode);
        $returnvalue=explode("&",$normalfromhash);
//        print_r($returnvalue);
//        echo $returnvalue[0]."<br>";
        $userid=$returnvalue[0];
        $password=md5($password);
        $query=$this->db->query("UPDATE `user` SET `password`='$password' WHERE `id`='$userid'");
//        
//        $getemailbyid=$this->db->query("SELECT `email` FROM `user` WHERE `id`='$userid'")->row();
//        $email=$getemailbyid->email;
//           
//        $this->load->library('email');
//        $this->email->from('amitwohlig@gmail.com', 'Access');
//        $this->email->to($email);
//        $this->email->subject('Access Password Changed');   
//            
//        $message = "<html>
//
//<body style=\"background:url('http://magicmirror.in/emaildata/emailer.jpg')no-repeat center; background-size:cover;\">
//    <div style='text-align:center; padding-top: 40px;'>
//        <img src='http://magicmirror.in/emaildata/email.png'>
//    </div>
//    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
//        <h4 style='font-size:1.5em;padding-bottom: 5px;color: #e82a96;'>Forgot Password!</h4>
//        <p style='font-size: 1em;padding-bottom: 10px;'>Your Password Has Been Changed Successfully!!! </p>
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
		if(!$query)
			return  0;
		else
			return  1;
    }

    
    function changepasswordfront($email, $oldpassword, $newpassword, $confirmpassword) 
    {
        $oldpassword=md5($oldpassword);
        $newpassword=md5($newpassword);
        $useridquery=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email' AND `password`='$oldpassword'");
        if($useridquery->num_rows()==0)
        {
            return 0;
        }
        else
        {
            $query=$useridquery->row();
            $userid=$query->id;
            $updatequery=$this->db->query("UPDATE `user` SET `password`='$newpassword' WHERE `id`='$userid'");
            return 1;
        }
    }
    
    function updateuserfront($id,$firstname, $lastname, $billingaddress, $email, $phone, $billingcity,$billingpincode,$billingcountry,$billingstate) 
    {
        $data = array(
               'firstname'=> $firstname,
               'lastname'=> $lastname,
               'email'=> $email,
               'phone'=> $phone,
               'billingaddress'=> $billingaddress,
               'billingcity'=> $billingcity,
               'billingpincode'=> $billingpincode,
               'billingcountry'=> $billingcountry,
               'billingstate'=> $billingstate,
            );

$this->db->where('id', $id);
$val=$this->db->update('user', $data); 
        return $val;
    }
      function getuserdetails($id){
    $query=$this->db->query("SELECT `id`, `firstname`, `lastname`, `email`, `phone`,`billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingpincode` FROM `user` WHERE `id`='$id'")->row();
    return $query;
    }
    function getusercartdetails($userid)
    {
        $query=$this->db->query("SELECT `usercart`.`user`,`usercart`. `product`,`usercart`. `quantity` as `qty`,`usercart`. `status`,`usercart`. `timestamp`,`productimage`.`image` as `image` ,`product`.`name` AS `name`,`product`.`price` as `price`,`product`.`price` * `usercart`. `quantity` AS `subtotal`
FROM `usercart`
LEFT OUTER JOIN `product` ON `product`.`id`=`usercart`.`product`
LEFT OUTER JOIN `productimage` ON `productimage`.`product`=`product`.`id`
WHERE `usercart`.`user`='$userid'
GROUP BY `product`.`id`")->result();
        return $query;
    }
    function deletecartfromdb($id){
    $query=$this->db->query("DELETE FROM `usercart` WHERE `product`='$id'");
    }
  
}
?>
