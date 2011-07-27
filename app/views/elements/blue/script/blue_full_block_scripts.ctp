<?php
if ($this->action=="step"){
	echo $html->css(array("blue/steps-initial",  "blue/questionairedialog"), "stylesheet", array("inline"=>false));
}else if (($this->action=="index")&&($this->name=="Members")){
	echo $html->css("blue/member-homepage-style", "stylesheet", array("inline"=>false));
	echo $html->css("blue/ui-dialog", "stylesheet", array("inline"=>false));
	echo $html->css("blue/icebreaker", "stylesheet", array("inline"=>false));
	echo $html->css("blue/wink", "stylesheet", array("inline"=>false));
	echo $html->css("blue/gift-box", "stylesheet", array("inline"=>false));
	echo $html->css("blue/subscribe-message", "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/members/index");
	echo $javascript->link("blue/members/profile_functions");	
	echo $html->css("blue/message-writer", "stylesheet");
}else if (($this->action=="profile")&&($this->name=="Members")){
	echo $html->css("blue/ui-dialog", "stylesheet", array("inline"=>false));
	echo $html->css("blue/message-writer", "stylesheet", array("inline"=>false));
	echo $html->css("blue/view-profile-style", "stylesheet", array("inline"=>false));
	echo $html->css("blue/ui-dialog", "stylesheet", array("inline"=>false));
	echo $html->css("blue/icebreaker", "stylesheet", array("inline"=>false));
	echo $html->css("blue/subscribe-message", "stylesheet", array("inline"=>false));
	echo $html->css("blue/wink", "stylesheet", array("inline"=>false));
	echo $html->script("blue/members/profile_functions");
	echo $html->script("blue/members/profile");
	echo $html->scriptBlock("
		var role = {$role};
	");
}else if (($this->action=="index")&&($this->name=="Gifts")){
	echo $html->css('gifts/styles', 'stylesheet');
	echo $javascript->link(array('gifts/script'));
}else if ($this->action=="checkout"){
	echo $html->css("blue/checkout", "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/subscription_transactions/checkout");
}else if ($this->action=="account"){
	echo $html->css("blue/settings", "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/members/account");
}else if (($this->action=="edit")&&($this->name=="Members")){
	echo $html->css("blue/edit-profile-style", "stylesheet", array('inline'=>false));
	echo $javascript->link("blue/members/edit-profile-script");
}else if ($this->action=="search_result"){
	echo $html->css("blue/searchresult", "stylesheet", array("inline"=>false));
}else if ($this->action=="search"){
	echo $html->css("blue/search", "stylesheet", array("inline"=>false));
}else if ((($this->action=="read")&&($this->name=="PrivateMessages"))||($this->action=="inbox")){
	if ($action=="render"){
		echo $html->css(array("blue/inbox", "blue/reply", "blue/match-selector", "blue/message-writer"), "stylesheet", array("inline"=>false));
		echo $html->css("blue/ui-dialog", "stylesheet", array("inline"=>false));
		echo $html->css("blue/match-selector", "stylesheet", array("inline"=>false));
		echo $javascript->link("blue/inbox/inbox");		
		echo $javascript->link("js/jquery.textarea-expander");
		echo $html->scriptBlock("
			var member_id = {$member_id};
			var state = '{$this->action}';
			");
		echo $html->css("blue/ui-dialog-messaging");
	}
}else if (($this->action=="details")&&($this->name=="SubscriptionTransactions")){
	echo $html->css("blue/subscription", "stylesheet", array("inline"=>false));
	echo $javascript->link(array("blue/subscription_transactions/details"));
}else if (($this->action=="success")&&($this->name=="SubscriptionTransactions")){
	echo $html->css('blue/subscriptionsuccess', 'stylesheet', array('inline'=>false));
	echo $html->scriptBlock("
		$(document).ready(function(){
			$('#button').click(function(){
				window.location.href='{$html->url("/")}';
			});
		});
	
	");
}else if (($this->action=="error")&&($this->name=="SubscriptionTransactions")){
	echo $html->css('blue/subscriptionfailed', 'stylesheet', array('inline'=>false));
	echo $html->scriptBlock("
		$(document).ready(function(){
			$('#button').click(function(){
				window.location.href='{$html->url("/")}';
			});
		});
	
	");
}else if ($this->action=="buy"){
	echo $html->css("blue/qpoints_buy", "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/qpoints/details");
}else if (($this->name=="Matches")&&($this->action=="index")){
	echo $html->css("blue/matches-page-style", "stylesheet", array("inline"=>false));
	echo $javascript->link("blue/matches/index");
}else if (($this->action=="success")&&($this->name=="CoinAvailTransactions")){
	echo $html->css("blue/qpointssuccess", "stylesheet", array("inline"=>false));
}else if (($this->action=="error")&&($this->name=="CoinAvailTransactions")){
	echo $html->css("blue/qpointsfailed", "stylesheet", array("inline"=>false));
}