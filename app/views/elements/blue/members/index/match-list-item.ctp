<li class="match-list-item left clear">
	<div class="activity-picture match-picture left">
		<?php 
			$path = "/css/img/blue/index/";
			if (isset($member["MemberProfile"]["picture_path"])||($member["MemberProfile"]["picture_path"]!="")){
				echo $html->image("uploads/".$member["Member"]["id"]."/default/profile_thumb_".$member["MemberProfile"]["picture_path"], array("url"=>"/profile/".$member["Match"]["id"]));
			}else if ($member["Member"]["gender_id"]==1){
				echo $html->image($path."s-men.png", array("url"=>"/profile/".$member["Match"]["id"]));
			}else{
				echo $html->image($path."s-women.png", array("url"=>"/profile/".$member["Match"]["id"]));	
			}
		?>		
	</div>
	<div class="activity-content match-content-right left">
		<div class="name-location no-bg left">														
			<h4 class="left match-name name"><?php echo $html->link($member["Member"]["firstname"]." ".$member["Member"]["lastname"], "/profile/".$member["Match"]["id"])?></h4>
			<span class="age left clear">
			<?php echo $member["Member"]["age"]?> years old.
			</span>
			<span class="location left clear"><?php 
				echo $member["Member"]["city"].", ".$member["Member"]["state"];
			?>
			</span>	
			<span class="location left clear">
				<?php 
					echo $member["Country"]["name"];
			
				?>
			</span>
		</div>
		<div class="activity-content-button-date match-content-control right">
			<?php echo $html->link("Archive", "/matches/archive/".$member["Member"]["id"],array("id"=>"archive-".$member["Match"]["id"], "class"=>"archiver right"))?>
			
			<ul class="controls right clear">
				<li><?php echo $html->link(" ", "#", array("id"=>"wink_".$member["Member"]["id"], "class"=>"winker match-winker"))?></li>
				<li><?php echo $html->link(" ", "#", array("id"=>"message_".$member["Member"]["id"], "class"=>"message match-messager"))?></li>
				<li><?php echo $html->link(" ", array("action"=>"gift_match", "controller"=>"Gifts", $member["Member"]["id"]), array("class"=>"match-gift"))?>	
			</ul>
			<p class="status right clear">
			<?php 
				if ($member["Member"]["online"]==1){
					echo $html->link("{$member["Member"]["firstname"]} is online", "#", array("class"=>"online"));
				}else{
					echo $html->link("{$member["Member"]["firstname"]} is last active last ".$this->Time->$this->Time->timeAgoInWords($member["Member"]["modified"]), "#", array("class"=>"last-active"));
				}
			?>
			</p>
		</div>
	</div>
		
	<div class="shadow left clear"></div>
</li>