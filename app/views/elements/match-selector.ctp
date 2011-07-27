<div id="match-selector" class="container-dialog">
	
	<div class="search-container">
	<?php echo $form->create("Match", array("id"=>"match-search"))?>
		Search
		<?php 
			echo $form->input("Match.search", array("class"=>"email", "div"=>false, "label"=>false, "id"=>"search-matches"));
			echo $form->end();
		?>
	</div>
	<div class="box-content left">
		<div id="match-list-inbox" class="about-me left">
			
		</div>
	</div>
</div>