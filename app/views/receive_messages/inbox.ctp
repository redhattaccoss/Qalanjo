<?php
if ($action=="render"){ 
?>
	<div class="main-container left">
		<div class="banner left">
			<div class="profile-container left">
				<div class="profile-pic-inbox left">
					<?php 
						if (isset($member["MemberProfile"])&&($member["MemberProfile"]["picture_path"]!="")){
							echo $html->image("uploads/".$member["Member"]["id"]."/default/profile_thumb_".$member["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"left profile-pic"));
						}else{
							if (isset($member["Gender"])){
								if ($member["Member"]["gender_id"]==1){
									echo $html->image($path_index."thumb-s-men.jpg", array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"left profile-pic"));
								}else{
									echo $html->image($path_index."thumb-s-women.jpg", array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"left profile-pic"));
								}
							}
						}
					?>
				</div>
				<div class="profile-set-inbox left">
					<p>Hi,<span class="name">
					<?php 
						$fullname = $member["Member"]["firstname"]." ".$member["Member"]["lastname"];
						echo $html->link($fullname, "/profile/".$member["Member"]["id"], array("class"=>"name"));
					?></span>
					</p>
					<?php echo $html->link("Logout", "/members/logout", array("class"=>"logout"))?>
					<br/><span class="date"><?php echo date("l, F d, Y h:m A")?></span>
					
				</div>
			</div>
			<div class="right container-search">
				<input type="text" name="title-search" id="title" class="left search-text"/>
				<button type="submit" class="search-button left"></button>
			</div>
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
						<?php 
							echo $html->link("<span class=\"count\" id=\"inbox-items\">(0)</span>inbox", "/receive_messages/inbox", array("escape"=>false));				
						?>
					</li>
					<li class="left clear">
						<?php echo $html->image("/css/img/blue/inbox/message-sent.png", array("alt"=>"", "class"=>"left message-sent"))?>
						<?php 
							echo $html->link("<span class=\"count\" id=\"sent-items\">(0)</span>sent items", "/private_messages/sent", array("escape"=>false));				
						?>
					</li>
					<li class="left clear">
						<?php echo $html->image("/css/img/blue/inbox/trash.png", array("alt"=>"", "class"=>"left inbox"))?>
						<?php 
							echo $html->link("<span class=\"count\" id=\"trash-items\">(0)</span>trash", "/receive_messages/inbox/trash", array("escape"=>false));				
						?>
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
	echo $this->element("blue/inbox/inbox");
}?>