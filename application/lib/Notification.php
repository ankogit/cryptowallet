<?php
namespace application\lib;

class Notification {
	public function add($msg)
	{
		$_SESSION["notifyMsg"] = "<div style='position:fixed; height:500px; width:500px; bottom:0; right:0; background:pink;'>" . $msg . "</div>";
	}

	public function show(){
		if (!empty($_SESSION["notifyMsg"])) {
			echo $_SESSION["notifyMsg"];
			unset($_SESSION["notifyMsg"]);
		}
	}

}