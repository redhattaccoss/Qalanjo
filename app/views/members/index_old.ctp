<?php 
	$path = "/css/img/blue/index/";
	echo $html->scriptBlock("
		var role = {$role};
	");
?>
<div class="content-container">
	<div class="settings-container left">
		<div class="subscribe-banner left">
			
			<?php
				if ($role==2){ 
					echo $html->image($path."encourage.png", array("alt"=>"Subscribe", "class"=>"left", "url"=>"/subscribe"));
				}
			?>
		</div>
		<?php echo $this->element("blue/members/index/left-container", array("path"=>$path))?>
		<div class="right-container left">
			<div class="activity">
				<h2 class="left">
					<span class="left">Activity</span>
					<button id="activity-group-button" class="activity-group-button left"></button>
					<button id="activity-list-button" class="activity-list-button left"></button>
				</h2>
				<div class="right date">
					<?php echo date("l, F d, Y h:m A")?>
				</div>
				<div class="left clear activity-controls">
					<?php echo $this->element("blue/members/index/activity-controls", array("path"=>$path))?>
				</div>
				<?php echo $this->element("blue/members/index/matches-block", array("path"=>$path))?>
				<div id="activity-content">
					<?php echo $this->element("blue/members/index/group-view", array("path"=>$path))?>
				</div>
				<div id="match-content">
					<h2 class="match-content-header left">
						Recent
					</h2>
					<div id="match-list" class="match-list left">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->element("blue/members/index/hidden-div")?>
