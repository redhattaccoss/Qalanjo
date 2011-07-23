<div class='control_top'>
	<ul>
		<li><?php echo $html->link("Help", "/help")?></li>
		<li><?php echo $html->link("My Account", array("controller"=>"members", "action"=>"setup"))?></li>
		<li><?php echo $html->link("Log Out", array("controller"=>"members", "action"=>"logout"))?></li>
	</ul>
</div>