<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public function getNews() {
		$result = $this->db->row('SELECT title, description FROM news');
		return $result;
	}

	public function getMail() {
		 $result = $this->db->row('SELECT sectionsThird FROM footer WHERE id=0');
		 return $result[0]['sectionsThird'];
	}

    /*
    *Curl queryes to server backend
    */
    public function curlQuery($path)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://176.53.162.231:5000'.$path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }
    /*
    *Curl Check valid token to server backend
    */
    public function checkValidToken()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://176.53.162.231:5000/cvt?utoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3QiLCJleHAiOjE1NTE4MDIyNTd9.1UbDCdmWojwnJkEUGOoXf__33lCIB21UfqwCxZWQFW8&app=gnomes');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result);
        if($result->message=="ok")
            return 1;
        else return 0;
    }
    /*
    *Curl get rates
    */
    public function getCryptoRates()
    {
        $ch = curl_init("http://api.coinlayer.com/api/live?access_key=d31d0c92785885fac03c04db52cd1eee");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data);
    }




    public function sendFeedBack($post){
		$success=false;
		if (!empty($post['text']) && !empty($post['email']) & !empty($post['message'])) {
			$name = $post['text'];
			$email = $post['email'];
			$order = $post['message'];
			$msg='Name: '.$name.'.<br> Contact: '.$email.'.<br> Message: '.$order; 
            if (!empty($_FILES['file']['name'])){
                $imgName = "images/orders/order_".md5($_FILES['file']['name']).".png";
                move_uploaded_file($_FILES['file']['tmp_name'],"public/".$imgName);
                $msg .= '<img src="http://tortterry.ru/public/'.$imgName.'"><br> Photo: <a href="http://tortterry.ru/public/'.$imgName.'">http://tortterry.ru/public/'.$imgName.'</a>';
            }
            if (!empty($post['tort'])){
                $tort = $post['tort'];
                $msg .= '<br> Cake: '.$tort;
            }
			$from_name="olyakaon.beget.tech";
			$from_mail="support@eagle-software.ru";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "From: ".$from_name." <".$from_mail."> \r\n";
			$headers .= "Content-type: text/html; charset=utf-8 \r\n";
            $to_mail = 'tortterry@yahoo.com';

	      if(mail($to_mail,'Обратная свявь',$msg, $headers)) $success=true;
		}

	return $success;
	}
	
	
	public function getAllPosts() {
		  $result = $this->db->row('SELECT * FROM products ORDER BY id ASC');
		  return $result;
	}
	
	public function getPost($id) {
		  $result = $this->db->row("SELECT * FROM posts WHERE id = '$id' ");
		  return $result;
	}
	
	
	public function getSharesProducts($category) {
		  $result = $this->db->row('SELECT * FROM '.$category.' WHERE new_price <> 0');
		  for ($i=0; $i < count($result); $i++) { 
            $result[$i]['category'] = $category;
		  }
          return $result;
	}
	
		
	
	
	public function getAllSharesProducts() {
		   $Categories = require 'application/config/categories.php';
			foreach ($Categories as $category => $value) :
				$CategoriesArray[]=$category;
			endforeach;
			$result=array();
        for ($i=0; $i<count($Categories); $i++) {
			if (!empty($this->getSharesProducts($CategoriesArray[$i]))) {
				$result[$CategoriesArray[$i]]= $this->getSharesProducts($CategoriesArray[$i]);
			}
        }
     return $result;
	}
	
	public function getFront() {
        $result = $this->db->row('SELECT * FROM front');
        return $result;
    }
	
	public function getFooter() {
        $result = $this->db->row('SELECT * FROM footer');
        return $result;
    }

    public function getSingleProduct($category, $id) {
        $result = $this->db->row('SELECT * FROM '.$category.' WHERE id = '.$id.'');
        return $result;
    }

    public function postsCount($table) {
        return $this->db->column('SELECT COUNT(id) FROM '.$table.'');
    }

    public function postsCountAll() {
        $Categories = require 'application/config/categories.php';
        foreach ($Categories as $category => $value) :
            $CategoriesArray[]=$category;
        endforeach;
        $result = 0;
        for ($i=0; $i<count($Categories); $i++) {
            $result += $this->postsCount($CategoriesArray[$i]);
        }
        return $result;
    }




    public function searchProducts($category, $route, $search) {
        $result = $this->db->row("SELECT * FROM ".$category." WHERE title LIKE '%".$search."%'
            OR description LIKE '%".$search."%' 
            OR search LIKE '%".$search."%' 
            OR id LIKE '%".$search."%' 
            ");
        for ($i=0; $i < count($result); $i++) { 
            $result[$i]['category'] = $category;
        }
        return $result;
    }

    public function searchAllProducts($route, $search) {
        $Categories = require 'application/config/categories.php';
        foreach ($Categories as $category => $value) :
            $CategoriesArray[]=$category;
        endforeach;
        $result=array();
        for ($i=0; $i<count($Categories); $i++) {
            $search_query=array();
            $search_query = $this->searchProducts($CategoriesArray[$i], $route, $search);
            if(!empty($search_query)) $result[$CategoriesArray[$i]]= $search_query;
            
        }
/*
        $i = 0;
        $j = 0;
        $countPost = $this->postsCountAll();
        $result2=array();
        do {
            foreach ($result as $category => $val){
                foreach ($val as $data) {
                    if($j > ((($route['page'] ?? 1) - 1) * $max)){
                        //echo $j.'-'.$data['title'].'<br>';
                        ++$i;
                        if(($i > $max)) {
                            break;
                        } else {
                            //echo $i.'-'.$data['title'].'<br>';
                            $category = $category;
                            $data['category'] = $category;
                            array_push($result2, $data);
                        }
                    }
                    $j++;
                }
            }
        } while (0);

*/
        //debug($result2);

        return $result;
    }


    public function getLastSingleProduct($category) {
        $result = $this->db->row('SELECT * FROM '.$category.' WHERE id =(SELECT MAX(id) FROM '.$category.')'); 

        return $result;
    }
}