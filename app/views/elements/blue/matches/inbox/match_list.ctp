<ul>
	<?php 
	$path = "/css/img/blue/index/";
	foreach($matches as $match){
	?>
	<li class="user-info">
		<?php 
						
		if (isset($match["MemberProfile"]["picture_path"])||($match["MemberProfile"]["picture_path"]!="")){
			echo $html->image("uploads/".$match["Matched"]["id"]."/default/profile_thumb_".$match["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$match["Matched"]["id"]));
		}else if ($match["Matched"]["gender_id"]==1){
			echo $html->image($path."s-men.png", array("url"=>"/members/profile/".$match["Matched"]["id"]));
		}else{
			echo $html->image($path."s-women.png", array("url"=>"/members/profile/".$match["Matched"]["id"]));	
		}
		?>
		<div class="user-info-details ">
			<h4 id="match_selected_<?php echo $match["Matched"]["id"]?>"><?php echo $match["Matched"]["firstname"]." ".$match["Matched"]["lastname"]?></h4>
			<button id="select_<?php echo $match["Matched"]["id"]?>" class="buttonselect right" type="submit">
			</button>
			<span><?php echo $match["Matched"]["age"]?> years old</span>
			<span><?php echo $match["Country"]["name"]?></span>
		</div>
		<hr />
	</li>
	<?php 
	}
	?>
	
</ul>