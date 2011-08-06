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
					echo $html->link("Profile", "/members/profile")
				?>
			</li>

			<li>
				<?php 
					echo $html->link("Photos", "/photos")
				?>
			</li>

		</ul>
	
		<div class=" textarea">
			<input name="message" type="text" class="message" maxlength="200" value="" id="" />
		</div>

		<div class="max-length">
			200 Characters
		</div>

		<div class="button-set">
			<button class="buttonshare" type="submit"></button>
		</div>

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