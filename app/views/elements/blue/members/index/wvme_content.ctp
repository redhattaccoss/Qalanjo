<ul class="left">
	<?php 
		$path = "/css/img/blue/index/";
		foreach($viewers as $viewer){
			?>	
			<li>
				<div class="activity-picture left">
					<?php 
						if (isset($viewer["MemberProfile"]["picture_path"])||($viewer["MemberProfile"]["picture_path"]!="")){
							echo $html->image("uploads/".$viewer["Viewer"]["id"]."/default/profile_thumb_".$viewer["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$viewer["Viewer"]["id"]));
						}else if ($viewer["Viewer"]["gender_id"]==1){
							echo $html->image($path."s-men.png", array("url"=>"/members/profile/".$viewer["Viewer"]["id"]));
						}else{
							echo $html->image($path."s-women.png", array("url"=>"/members/profile/".$viewer["Viewer"]["id"]));	
						}
					?>
				</div>
				<div class="activity-content left">
					<div class="name-location no-bg left">														
						<h4 class="left"><?php 
								echo $html->link($viewer["Viewer"]["firstname"]." ".$viewer["Viewer"]["lastname"], "/members/profile/".$viewer["Viewer"]["id"]);	
							
							?>
							 <span class="small">viewed your profile.</span></h4>
						<span class="location left clear"><?php echo $viewer["Viewer"]["state"].", ".$viewer["Country"]["name"]?></span>		
					</div>
					<div class="activity-content-button-date left">
						<?php echo $html->link("<span class='left'>View Profile</span>", "/profile/".$viewer["Viewer"]["id"], array("class"=>"activity-content-button right", "escape"=>false))?>
					</div>
					
				</div>
				<div class="shadow left clear"></div>
			</li>
			<?php 
			
		}
	?>
	<li class="last">
		<div class="view-all">
			<a href="#view_me_link" id="view_me_link">View All Viewed My Profile (<?php echo count($viewers)?>)</a>
		</div>
	</li>
</ul>