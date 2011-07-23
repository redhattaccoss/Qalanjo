<div class="left clear match-list">
	<div class="left q">
		<?php 
			echo $html->image($path."q.png", array("class"=>"left", "alt"=>"Qpoints"))									
		?>
	</div>
	<div class="left q-name">
		<?php echo $member["Member"]["firstname"]?>, you have <?php echo $html->link("", "/matches", array("id"=>"match_count"))?>
	</div>
	<div class="left viewer">
		<?php 
			echo $html->link(" ", "/matches", array("class"=>"view"));
		?>
	</div>
</div>