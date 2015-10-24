<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Menu_model extends CI_Model
{
	public function create($name,$description,$keyword,$url,$linktype,$parentmenu,$menuaccess,$isactive,$order,$icon)
	{ 
		date_default_timezone_set('Asia/Calcutta');
		$data  = array(
			'description' =>$description,
			'name' => $name,
			'keyword' => $keyword,
			'url' => $url,
			'linktype' => $linktype,
			'parent' => $parentmenu,
			'isactive' => $isactive,
			'order' => $order,
			'icon' => $icon,
		);
		//print_r($data);
		
		$query=$this->db->insert( 'menu', $data );
		$menuid=$this->db->insert_id();
		if(! empty($menuaccess)) {
			foreach($menuaccess as $row)
			{
				$data  = array(
					'menu' => $menuid,
					'access' => $row,
				);
				$query=$this->db->insert( 'menuaccess', $data );
			}
		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewmenu()
	{
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu2`.`name` as `parentmenu`,`menu`.`linktype` as `linktype`,`menu`.`icon`,`menu`.`order` FROM `menu`
		LEFT JOIN `menu` as `menu2` ON `menu2`.`id` = `menu`.`parent` 
		ORDER BY `menu`.`order` ASC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query['menu']=$this->db->get( 'menu' )->row();
		$query['menuaccess']=array();
		$menu_arr=$this->db->query("SELECT `access` FROM `menuaccess` WHERE `menu`='$id' ")->result();
		foreach($menu_arr as $row)
		{
			$query['menuaccess'][]=$row->access;
	    }
		
		return $query;
	}
	
	public function edit($id,$name,$description,$keyword,$url,$linktype,$parentmenu,$menuaccess,$isactive,$order,$icon)
	{
		$data  = array(
			'description' =>$description,
			'name' => $name,
			'keyword' => $keyword,
			'url' => $url,
			'linktype' => $linktype,
			'parent' => $parentmenu,
			'isactive' => $isactive,
			'order' => $order,
			'icon' => $icon,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'menu', $data );
		
		$this->db->query("DELETE FROM `menuaccess` WHERE `menu`='$id'");
		if(! empty($menuaccess)) {
		foreach($menuaccess as  $row)
		{
			$data  = array(
				'menu' => $id,
				'access' => $row,
			);
			$query=$this->db->insert( 'menuaccess', $data );
			
		} }
		return 1;
	}
	function deletemenu($id)
	{
		$query=$this->db->query("DELETE FROM `menu` WHERE `id`='$id'");
		$query=$this->db->query("DELETE FROM `menuaccess` WHERE `menu`='$id'");
	}
	public function getmenu()
	{
		$query=$this->db->query("SELECT * FROM `menu`  ORDER BY `id` ASC" )->result();
		$return=array(
		"" => ""
		);
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		return $return;
	}
	function viewmenus()
	{
        $accesslevel=$this->session->userdata( 'accesslevel' );
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu2`.`name` as `parentmenu`,`menu`.`linktype` as `linktype`,`menu`.`icon` FROM `menu`
		LEFT JOIN `menu` as `menu2` ON `menu2`.`id` = `menu`.`parent`  
        INNER  JOIN `menuaccess` ON  `menuaccess`.`menu`=`menu`.`id`
		WHERE `menu`.`parent`=0 AND `menuaccess`.`access`='$accesslevel'
		ORDER BY `menu`.`order` ASC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	function getsubmenus($parent)
	{
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu`.`linktype` as `linktype`,`menu`.`icon` FROM `menu`
		WHERE `menu`.`parent` = '$parent'
		ORDER BY `menu`.`order` ASC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	function getpages($parent)
	{ 
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`url` as `url` FROM `menu`
		WHERE `menu`.`parent` = '$parent'
		ORDER BY `menu`.`order` ASC";
	   
		$query2=$this->db->query($query)->result();
		$url = array();
		foreach($query2 as $row)
		{
			$pieces = explode("/", $row->url);
					
			if(empty($pieces) || !isset($pieces[1]))
			{
				$page2="";
			}
			else
				$page2=$pieces[1];
				
			$url[]=$page2;
		}
		//print_r($url);
		return $url;
	}
    
    public function viewmergeimage() {
        
        $jagzimagesize=240;
        
        $mainimage = imagecreatetruecolor(1200, 1200);
        
        $multiplefactor=1200/240;
        
        $gotimages=array();
        array_push($gotimages,"1.jpg");
        array_push($gotimages,"2.jpg");
        array_push($gotimages,"3.jpg");
//        array_push($gotimages,"1.jpg");
        
//        return $gotimages;
        
        $images=array();
        
        for($i=0;$i<count($gotimages);$i++)
        {
            $obj=array();
            $obj["image"]=imagecreatefromjpeg(base_url('img/'.$gotimages[$i]));
            $obj["width"]=imagesx($obj["image"]);
            $obj["height"]=imagesy($obj["image"]);
            $obj["top"]=0;
            $obj["left"]=0;
            $obj["newtop"]=$obj["top"]*$multiplefactor;
            $obj["newleft"]=$obj["left"]*$multiplefactor;
            array_push($images,$obj);
        }
        
        
        
        
        {
        //for box 1
        $boxes=array();
        $box1=array();
        $box2=array();
        $box2["width"]=1200;
        $box2["heigth"]=1200;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        array_push($boxes,$box1);
        
        //for box 2
        $box1=array();
        $box2=array();
        
        $box2["width"]=1200;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=1200;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        
        array_push($boxes,$box1);
        
        
        //for box 3
        $box1=array();
        $box2=array();
        
        $box2["width"]=600;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=600;
        $box2["heigth"]=600;
        $box2["xaxis"]=600;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=1200;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        
        array_push($boxes,$box1);
        
        
        //for box 4
        $box1=array();
        $box2=array();
        
        $box2["width"]=600;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=600;
        $box2["heigth"]=600;
        $box2["xaxis"]=600;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=600;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        $box2["width"]=600;
        $box2["heigth"]=600;
        $box2["xaxis"]=600;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        array_push($boxes,$box1);
        
        
        //for box 5
        $box1=array();
        $box2=array();
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=400;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=800;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=600;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        $box2["width"]=600;
        $box2["heigth"]=600;
        $box2["xaxis"]=600;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        array_push($boxes,$box1);
        
        
        //for box 6
        $box1=array();
        $box2=array();
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=400;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=800;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=0;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=400;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=600;
        $box2["xaxis"]=800;
        $box2["yaxis"]=600;
        array_push($box1,$box2);
        
        array_push($boxes,$box1);
        
        
        //for box 7
        $box1=array();
        $box2=array();
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=400;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=800;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=400;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=800;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=1200;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=800;
        array_push($box1,$box2);
        
        array_push($boxes,$box1);
        
        
        //for box 8
        $box1=array();
        $box2=array();
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=400;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=800;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=400;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=800;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=600;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=800;
        array_push($box1,$box2);
        
        $box2["width"]=600;
        $box2["heigth"]=400;
        $box2["xaxis"]=600;
        $box2["yaxis"]=800;
        array_push($box1,$box2);
        
        array_push($boxes,$box1);
        
        //for box 9
        $box1=array();
        $box2=array();
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=400;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=800;
        $box2["yaxis"]=0;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=400;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=800;
        $box2["yaxis"]=400;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=0;
        $box2["yaxis"]=800;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=400;
        $box2["yaxis"]=800;
        array_push($box1,$box2);
        
        $box2["width"]=400;
        $box2["heigth"]=400;
        $box2["xaxis"]=800;
        $box2["yaxis"]=800;
        array_push($box1,$box2);
        
        array_push($boxes,$box1);
        }
        
        
//        $box2["width"]=400;
//        $box2["heigth"]=400;
//        $box2["xaxis"]=800;
//        $box2["yaxis"]=800;
//        array_push($box1,$box2);
        
        $imagescount=count($images);
        
        
//        return $boxes[1][0]["width"];
        
        for($i=0;$i<$imagescount;$i++)
        {
            $image=$images[$i];
            $image["boxwidth"]=$boxes[$imagescount-1][$i]["width"];
            $image["boxheight"]=$boxes[$imagescount-1][$i]["heigth"];
            $image["xaxis"]=$boxes[$imagescount-1][$i]["xaxis"];
            $image["yaxis"]=$boxes[$imagescount-1][$i]["yaxis"];
            
            $image["ratio"]=$image["width"]/$image["height"];
            $image["ratiobox"]=$image["boxwidth"]/$image["boxheight"];
            
            if($image["ratio"]>=$image["ratiobox"])
            {
                $image["newheight"]=$image["boxheight"];
                $image["newwidth"]=$image["ratio"]*$image["newheight"];
            }
            else
            {
                $image["newwidth"]=$image["boxwidth"];
                $image["newheight"]=$image["newwidth"]/$image["ratio"];
            }
            $thumb = imagecreatetruecolor($image["newwidth"],$image["newheight"]);
            imagecopyresized($thumb, $image["image"], 0, 0, 0, 0, $image["newwidth"], $image["newheight"], $image["width"], $image["height"]);
            
            
            $image["thumbwidth"]=imagesx($thumb);
            $image["thumbheight"]=imagesy($thumb);
            
            
            
            
            imagecopymerge($mainimage, $thumb, $image["xaxis"], $image["yaxis"], $image["newleft"], $image["newtop"], $image["boxwidth"], $image["boxheight"], 100); 
        }
        
        return imagejpeg($mainimage, NULL, 85);
    }
}
?>