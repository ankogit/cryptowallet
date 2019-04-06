<?php
namespace application\lib;
use PDO;
class Db {
	protected $db;
	
	public function __construct() {
		$config = require 'application/config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
	}
	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				if (is_int($val)) {
					$type = PDO::PARAM_INT;
				} else {
					$type = PDO::PARAM_STR;
				}
				$stmt->bindValue(':'.$key, $val, $type);
			}
		}
		$stmt->execute();
		return $stmt;
	}
	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}
	public function lastInsertId() {
		return $this->db->lastInsertId();
	}


    /**
     * Make params for sql query
     * @param $post
     * @param $fields
     * @return array
     * field=:field
     */
    public function makeParams($post, $fields) {
        $params = [];
        $sql = 'UPDATE catalog SET ';
        $sqlParams = [];
        foreach ($fields as $field) {
            if (array_key_exists($field, $post)) {
                $params[$field] = $post[$field];
                $sqlParams[] = $field .' = :'.$field;
            }
        }
        $sql .= join($sqlParams, ',');
        return [$params, $sqlParams];
    }



}
