<div id="wink" class="wink-result">
	<div class="wink-question">
		<div class="right breaker-result">
			<h2>
				Do you want to wink at <br/><strong id="wink_name"><?php 
					echo $member["Member"]["firstname"]
				?></strong> ?
			</h2>
		</div>
	</div>
</div>


<div id="message_result"></div>
<div id="gift-box"></div>
<div id="shoutbox-result"></div>
<?php echo $this->element("blue/members/general/composer_2")?>