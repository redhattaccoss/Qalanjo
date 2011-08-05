<?php
if (($this->action=="index")&&($this->name=="Members")){
	echo $html->css("blue/member-homepage-style", "stylesheet", array("inline"=>false));
	echo $html->css("blue/ui-dialog", "stylesheet", array("inline"=>false));
	echo $html->css("blue/icebreaker", "stylesheet", array("inline"=>false));
	echo $html->css("blue/wink", "stylesheet", array("inline"=>false));
	echo $html->css("blue/gift-box", "stylesheet", array("inline"=>false));
	echo $html->css("blue/subscribe-message", "stylesheet", array("inline"=>false));
	echo $html->css("fixed/viewprofile");
}