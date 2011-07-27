<?php
if ($this->action=="login"){
	echo $html->css(array("blue/login"), "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/members/login", false);
	if (isset($error)){
		$error = 1;
	}else{
		$error = 0;
	}
	echo $html->scriptBlock("
		var error = $error;
	", array("inline"=>false));
}else if ($this->action=="forgot_password_success"){
	echo $html->css("blue/forgot-password-1", "stylesheet", array("inline"=>false));
}else if (($this->action=="changepassword")&&($this->name=="Members")){
	echo $html->css("blue/changepassword", "stylesheet", array("inline"=>false));
}else if ($this->action=="forgot_password"){
	echo $html->css("blue/forgot-password-1", "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/members/forgot-password");

}