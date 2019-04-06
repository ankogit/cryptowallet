<?php

namespace application\core;

use application\lib\Db;
use application\core\App;
abstract class Model extends App{

	public $db;
	
	public function __construct() {
		$this->db = new Db;
	}

}