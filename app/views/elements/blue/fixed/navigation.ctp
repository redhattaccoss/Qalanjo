<ul class="main-menu left">
	<li class='active'>
		<span>
			<?php 
				echo $html->link("Home", "/welcome");
			?>
		</span>
	</li>
	<li>
		<span>
			<?php 
				echo $html->link("My Photos", "/photos");
			?>
		</span>
	</li>
	<li>
		<span>
			<?php 
				echo $html->link("My Matches", "/matches");
			?>
		</span>
	</li>
	<li>
		<span>
			<?php 
				echo $html->link("My Profile", "/members/edit");
			?>
		</span>
	</li>

	<li>
		<span>
			<?php 
				echo $html->link("My Settings", "/members/account");
			?>
		</span>
	</li>
</ul>