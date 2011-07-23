<?php
if (($this->action=="profile_completion")&&($this->name=="Members")){
	echo $html->css(array("blue/profile_building/profile-building"), "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/members/profile_completion");
}else if (($this->action=="questionnaire")){
	echo $html->css("blue/profile_building/personality-assessment", "stylesheet", array("inline"=>false));
	echo $html->css("blue/questionnaire/questionset-".($page+4), "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/attributes/questionnaire");
}else{
	echo $html->css("blue/profile_building/reciprocal", "stylesheet", array("inline"=>false));
}