<?php 	
	echo $javascript->link("uploader/swfobject");
	echo $javascript->link("uploader/jquery.uploadify.v2.1.4.min");
	
	echo $this->element("scripts/signup_upload", array("member_id"=>$member["Member"]["id"]));
?>
<div class="profile-picture-container left">
	<?php 
		echo $html->image("/css/img/blue/settings/profile_male_new.jpg");
	?>
</div>
<div class="image-uploader left clear">
	<p class="instruction left">
		Select an image file on your computer (5MB max):
	</p>
	<br/><input id="file_upload" name="file_upload" type="file" />
</div>

<div class="agreement left clear">
	<p class="instruction">
		By uploading a file you certify that you have the right to distribute this picture and that it does not violate the <a href="#">Terms of Service</a>.
	</p>
</div>