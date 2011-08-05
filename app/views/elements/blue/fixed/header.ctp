<?php 
	$path_container = "/css/img/blue/container/";
	$path_index = "/css/img/blue/index/";
?>
<div class="header-bg">
	<div class="header-container">
		<div class="left">
			<?php echo $html->link(" ", "/welcome", array("class"=>"logo left"))?>
			<div class="right-header right">
				<div class="controls-right right">
					<h5>
					
					<?php 
						if (isset($member["MemberProfile"])&&($member["MemberProfile"]["picture_path"]!="")){
							echo $html->image("uploads/".$member["Member"]["id"]."/default/profile_thumb_".$member["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"profile-pic"));
						}else{
							if (isset($member["Gender"])){
								if ($member["Member"]["gender_id"]==1){
									echo $html->image($path_index."thumb-s-men.jpg", array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"profile-pic"));
								}else{
									echo $html->image($path_index."thumb-s-women.jpg", array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"profile-pic"));
								}
							}
						}
					?>
					Hi, Welcome
					<strong><?php 
							if (isset($user)){
								echo $user["Member"]["firstname"]." ".$user["Member"]["lastname"];
							}else{
								echo $member["Member"]["firstname"]." ".$member["Member"]["lastname"];	
							}	
							?></strong>
					|
					<?php echo $html->link("Log-out", "/members/logout")?>
					</h5>
					<span><?php echo date("l, F d, Y h:m A")?></span>
				</div>
				<?php echo $this->element("blue/fixed/navigation")?>
			</div>
		</div>
	</div>
</div>
