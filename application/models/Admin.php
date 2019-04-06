<?php
namespace application\models;
use application\core\Model;
use Imagick;
class Admin extends Model {
    public $error;
    public function loginValidate($post) {
        $config = require 'application/config/admin.php';
        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }

	
	public function newsValidate($post){
		if(!empty($post['title']) && !empty($post['description'])){
			return true;
		}
		else return false;
	}
	
	public function getPost($id) {
		  $result = $this->db->row("SELECT * FROM products WHERE id = '$id' ");
		  return $result;
	}	
	public function getAllPosts() {
		  $result = $this->db->row("SELECT * FROM products");
		  return $result;
	}

    public function postEdit($post, $id){

        $fields = ['title', 'category', 'desc', 'price'];
        list($params, $sqlParams) = $this->db->makeParams($post, $fields);
        $this->db->query('UPDATE catalog SET '.join($sqlParams, ',').' WHERE id = '.$id, $params);

        //if files exists
        if (!empty($_FILES['newsImg']['name'])){
            $imgName = "images/products/product_".$id.".png";
            if(file_exists("public/".$imgName)){
                unlink("public/".$imgName);
            }
            move_uploaded_file($_FILES['newsImg']['tmp_name'],"public/".$imgName);
            //$this->db->query('UPDATE products SET img = "'.$imgName.'"  WHERE id = '.$id);
        }
    }
	
	public function postAdd($post) {
		$params = [
            'title' => $post['title'],
            'category' => $post['category'],
            'descr' => $post['descr'],
            'price' => $post['price'],
            'weight' => $post['weight'],
            'filling' => $post['filling'],
        ];
        $this->db->query('INSERT INTO products (title, category, descr, price, weight, filling) VALUES (:title, :category, :descr, :price, :weight, :filling)', $params);
		
		$id = $this->db->lastInsertId();
        if (!empty($_FILES['postImg']['name'])){
            $imgName = "images/products/product_".$id.".png";
            move_uploaded_file($_FILES['postImg']['tmp_name'],"public/".$imgName);
            //$this->db->query('UPDATE posts SET img = "'.$imgName.'"  WHERE id = '.$id);
        }
		return $id;
	}

    public function postUploadImage($path, $id, $category='post') {
        $img = new Imagick($path);
        $img->cropThumbnailImage(1080, 600);
        $img->setImageCompressionQuality(80);
        $img->writeImage('public/images/'.$category.$id.'.jpg');
    }
	

    public function isPostExists($table, $id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT * FROM '.$table.' WHERE id = :id', $params);
    }
    public function postDelete($id) {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM products WHERE id = :id', $params);
        /*if($table != 'news') unlink('public/images/'.$table.$id.'.jpg');
        else  unlink('public/images/news/new_'.$id.'.png');*/
    }
    public function postData($table, $id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM '.$table.' WHERE id = :id', $params);
    }
}