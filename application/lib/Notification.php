<?php
namespace application\lib;

class Notification {

	public function add($msg, $status = "Notification" )
	{
		$_SESSION["notify"] = [
		    'status' => $status,
            'msg'    => $msg
        ];
	}

	public function getNotify(){
		if (@!empty($notify = $_SESSION["notify"])) {
			unset($_SESSION["notify"]);
			return $notify;
		}
	}

}