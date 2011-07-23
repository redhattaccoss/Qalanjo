<ul class="match-list left">
	<?php 
	foreach($matches as $match){
		echo $this->element("blue/members/index/match-list-item", array("member"=>$match));
	}
	?>
</ul>
