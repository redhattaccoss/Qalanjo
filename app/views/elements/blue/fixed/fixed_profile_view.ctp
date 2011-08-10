<?php echo $this->element("blue/fixed/profile-basic")?>
<div class="recent-activity left">

	<div class="profile-feeds">

		<div class="notificatons">
			<?php echo $html->image("/css/img/fixed/profile/blue-notification.png", array("alt"=>""))?>
		</div>

		<ul>
			<li>
				<?php 
					echo $html->link("Recent Activity", "/activities/recent", array("class"=>"active", "id"=>"recent-activity-link"))
				?>
			</li>

			<li>
				<?php 
					echo $html->link("Profile", "/members/profile", array("id"=>"profile-link"));
				?>
			</li>

			<li>
				<?php 
					echo $html->link("Photos", "/photos", array("id"=>"photo-link"))
				?>
			</li>

		</ul>
		<?php echo $form->create("Shout", array("id"=>"shoutbox"))?>
		<div class=" textarea">
			<?php echo $form->input("message", array("id"=>"shoutbox-message", "value"=>"", "class"=>"message", "div"=>false, "label"=>false))?>
		</div>

		<div class="max-length">
			200 Characters
		</div>

		<div class="button-set">
			<button class="buttonshare" type="submit"></button>
		</div>
		<?php echo $form->input("Shout.member_id", array("value"=>$member["Member"]["id"], "type"=>"hidden"))?>
		<?php echo $form->end()?>
	</div>
	<div id="update-box">
		<ul>
		
		</ul>
	</div>
</div>
<div class="container-topic-sponsor left">
	<?php 
	if ($this->action=="profile"){
		echo $this->element("blue/fixed/topic-opener");
	}
	echo $this->element("blue/fixed/ads");
	?>
</div>