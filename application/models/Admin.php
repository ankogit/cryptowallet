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
	
	public function postEdit($post,$id){
		$params = [
            'id' => $id,
            'title' => $post['title'],
            'category' => $post['category'],
            'descr' => $post['descr'],
            'price' => $post['price'],
            'weight' => $post['weight'],
            'filling' => $post['filling'],
        ];
		$this->db->query('UPDATE products SET title = :title, category = :category, descr = :descr, price = :price, weight = :weight, filling = :filling WHERE id = :id', $params);
		 
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
	
    public function postInfo($post) {
        $id = 0;
        $params = [
            'id' => $id,
            'header' => $post['header'],
            'descr' => $post['desc'],
            'phoneText' => $post['phoneText'],
            'sectionsFirst' => $post['sectionsFirst'],
            'sectionsThird' => $post['sectionsThird'],
        ];
        $this->db->query('UPDATE footer SET header = :header, `desc` = :descr, phoneText = :phoneText, sectionsFirst = :sectionsFirst, sectionsThird = :sectionsThird WHERE id = :id', $params);
    }
    public function postEI($post) {
        $id = 0;
        $params = [
            'id' => $id,
            'fitst_block_1_title' => $post['fitst_block_1_title'],
            'fitst_block_1_text' => $post['fitst_block_1_text'],
            'fitst_block_2_title' => $post['fitst_block_2_title'],
            'fitst_block_2_text' => $post['fitst_block_2_text'],
            'fitst_block_3_title' => $post['fitst_block_3_title'],
            'fitst_block_3_text' => $post['fitst_block_3_text'],
            'second_block__title' => $post['second_block__title'],
            'second_block__text' => $post['second_block__text'],
            'pay_block__title' => $post['pay_block__title'],
            'pay_block__text' => $post['pay_block__text'],
            'design_block__text' => $post['design_block__text'],
            'video_block' => $post['video_block'],
            'contact_block__adress' => $post['contact_block__adress'],
            'contact_block__tel' => $post['contact_block__tel'],
            'contact_block__email' => $post['contact_block__email'],
        ];
        $this->db->query('UPDATE front SET fitst_block_1_title = :fitst_block_1_title, fitst_block_1_text = :fitst_block_1_text, fitst_block_2_title = :fitst_block_2_title, fitst_block_2_text = :fitst_block_2_text, fitst_block_3_title = :fitst_block_3_title, fitst_block_3_text = :fitst_block_3_text, second_block__title = :second_block__title, second_block__text = :second_block__text, pay_block__title = :pay_block__title, pay_block__text = :pay_block__text, design_block__text = :design_block__text, video_block = :video_block, contact_block__adress = :contact_block__adress, contact_block__tel = :contact_block__tel, contact_block__email = :contact_block__email WHERE id = :id', $params);
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