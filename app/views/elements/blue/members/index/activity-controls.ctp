<div class="right">
	<span class="left filter-by"><strong>Filter by:</strong></span>							
	<div class="left">
		<button id="activity-communication-button" class="header-button">
			<span>
				<?php 
					echo $html->image($path."communication-icon.png", array("class"=>"left", "alt"=>""))									
				?>
				<span id="activity-communication-count" class="left">(0)</span>
			</span>
		</button>
		<button id="activity-gift-button" class="header-button">
			<span class="left">
				<?php 
					echo $html->image($path."gift-icon.png", array("class"=>"left", "alt"=>""))									
				?>
				<span id="activity-gift-count" class="left">(0)</span>
			</span>
		</button>
		<?php /*?>
		<button id="activity-profile-update-button" class="header-button">
			<span class="left">
				<?php 
					echo $html->image($path."profile-icon.png", array("class"=>"left", "alt"=>""))									
				?>
				<span id="activity-profile-update-count" class="left">(0)</span>
			</span>
		</button>
		*/?>
		<button id="activity-photos-update-button" class="header-button">
			<span class="left">
				<?php 
					echo $html->image($path."photo-icon.png", array("class"=>"left", "alt"=>""))									
				?>
				<span id="activity-photo-count" class="left">(0)</span>
			</span>
		</button>
		<button id="activity-who-viewed-me-button" class="header-button">
			<span class="left">
				<?php 
					echo $html->image($path."lens-icon.png", array("class"=>"left", "alt"=>""))									
				?>
					<span id="activity-wvme-count" class="left">(0)</span>
				</span>
		</button>	
	</div>		
</div>