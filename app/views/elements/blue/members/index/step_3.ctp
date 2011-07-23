<?php 
	echo $html->css(array("blue/steps-initial", "uploadify.css", "blue/questionairedialog"), "stylesheet", array("inline"=>false));
	
	echo $javascript->link(array("uploader/swfobject", "uploader/jquery.uploadify.v2.1.4.min"), false);
	echo $javascript->link(array("blue/members/step-3"), false);
	if (isset($call)){
		$call = 1;
	}else{
		$call = 0;
	}
	
	echo $html->scriptBlock("
		var call = $call;
	", array("inline"=>false));
	echo $this->element("scripts/signup_upload", array("member_id"=>$member["Member"]["id"]));
?>
<div class="arrow-steps left">
	<div class="arrow-step arrow-step-1 left">
		<div class="number-1 left"></div>
		<h2 class="left">Profile Information</h2>
	</div>
	<div class="arrow-step arrow-step-2 left">
		<div class="number-2 left"></div>
		<h2 class="left">About Me</h2>
	</div>
	<div class="arrow-step arrow-step-3 left arrow-step-active">
		<div class="number-3 left"></div>
		<h2 class="left">Profile Picture</h2>
	</div>
</div>
<div class="header-cap left">
	<h1>Set your profile picture</h1>
	<span class="instruction">This information will help you find your matches on Qalanjo</span>
	<div class="shadow"></div>
</div>
<div class="spacer left clear"></div>
<div class="form-content left">
	
		<div class="form-container left">
			<div class="form-upload left">
				<div class="left silo">
					<?php echo $html->image("/css/img/blue/steps/silhouette.jpg")?>
				</div>
				<div class="left upload-content">
					<p>Select an image file on your computer (5MB max):</p>
					<p>
					<input id="file_upload" name="file_upload" type="file" />
					</p>
					<p>By uploading a file you certify that you have the right to distribute this picture and that it does not violate the <?php echo $html->link("Terms and Service", "/terms")?>.</p>
				</div>
			</div>	
		</div>
		<div class="buttonset right">
			<?php echo $html->link("Skip this step", "/welcome")?>
		</div>
		
</div>
<div class="spacer left"></div>