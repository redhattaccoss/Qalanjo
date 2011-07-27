<?php 
	/*
	 * Design for inbox
	 */	
	$path =  "designs/blue/inbox/";

?>

<?php 
if ($action=="render"){

?>

<div class="main-container left">
		<div class="banner left">
		<?php 
			echo $html->image("/css/img/blue/inbox/love-guru.png");
		?>
		</div>
		<div class="left-container left">
			<div class="logo-q left"></div>
			<div class="mail-contacts left">
				<h2 class="left mail-letters">mail</h2>
				<h2 class="left clear contacts-letters">Contacts</h2>
			</div>
			
			<div class="mail-contact-icon left"></div>
			<div class="gradient-message-control left clear">
				<button class="left compose" id="new_message">
					<span class="left">
						Compose Mail
					</span>
				</button>
				<ul class="left clear controls left-bar-controls">
					<li class="left">
						<?php echo $html->image("/css/img/blue/inbox/inbox.png", array("alt"=>"", "class"=>"left inbox"))?>
						<a href="#"><span class="count" id="inbox-items">(0)</span>inbox</a>
					</li>
					<li class="left clear">
						<?php echo $html->image("/css/img/blue/inbox/message-sent.png", array("alt"=>"", "class"=>"left message-sent"))?>
						<a href="#"><span class="count" id="sent-items">(0)</span>sent items</a>
					</li>
					<li class="left clear">
						<?php echo $html->image("/css/img/blue/inbox/trash.png", array("alt"=>"", "class"=>"left inbox"))?>
						<a href="#"><span class="count" id="trash-items">(0)</span>trash</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="message-container left">
			<div id="messages-tab" class="tabs-qalanjo">
				<ul>
					<li>
						<?php echo $html->link("Messages", "/inbox")?>
					</li>
					
				</ul>
			</div>
			
		</div>
	</div>
	<?php 
		echo $this->element("compose_write",array("from_id"=>$member_id));
		echo $this->element("match-selector");
	?>
	<div id="result" class="result left"></div>
	<div id="deletebox">Do you want to delete the selected items?</div>
<?php }else{
	echo $this->element("blue/inbox/reply_content");
}?>