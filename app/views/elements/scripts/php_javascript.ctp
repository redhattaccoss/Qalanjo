<?php 
	if (!isset($params)){
		$params = "null";
	}
	if (!isset($userId)){
		$userId = "null";
	}
	$root = addslashes(WWW_ROOT);
	echo $html->scriptBlock("
		var qalanjo_url = '$url';
		var qalanjo_controller = '{$this->name}';
		var qalanjo_action = '{$this->action}';
		var qalanjo_params = '$params';
		var qalanjo_webroot = \"$root\";
		var qalanjo_userid = '$userId';
	"
	);
?>