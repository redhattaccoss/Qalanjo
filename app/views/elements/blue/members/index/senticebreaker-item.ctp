<div class="activity-picture left">
	<?php 
		$path = "/css/img/blue/index/";
		if (isset($breaker["MemberProfile"]["picture_path"])||($breaker["MemberProfile"]["picture_path"]!="")){
			echo $html->image("uploads/".$breaker["Member"]["id"]."/default/profile_thumb_".$breaker["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$breaker["Member"]["id"]));
		}else if ($breaker["Member"]["gender_id"]==1){
			echo $html->image($path."s-men.png", array("url"=>"/members/profile/".$breaker["Member"]["id"]));
		}else{
			echo $html->image($path."s-women.png", array("url"=>"/members/profile/".$breaker["Member"]["id"]));	
		}
	?>		
</div>
<div class="activity-content left">
	<div class="name-location left">														
		<h4 class="left"><?php echo $html->link($breaker["Member"]["firstname"]." ".$breaker["Member"]["lastname"], "/profile/".$breaker["Member"]["id"])?></h4>
		<span class="location left clear"><?php echo $breaker["Member"]["state"].", ".$breaker["Country"]["name"]?></span>		
	</div>
	<div class="activity-content-button-date left">
		<?php echo $html->link("<span class='left'>Show Icebreaker</span>", "#", array("class"=>"activity-content-button right", "escape"=>false))?>
	</div>
	<div class="message-stream clear left">
		<p>
			<?php 
				echo $breaker["IceBreaker"]["value"];
			?>
		</p>
	</div>
		
</div>
	
<div class="shadow left clear"></div>