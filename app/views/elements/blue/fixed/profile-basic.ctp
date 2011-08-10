<?php 
	$path_container = "/css/img/blue/container/";
	$path_index = "/css/img/blue/index/";
	
	debug($member);
?>
<?php 
	$path = "/css/img/blue/index/";

?>
<div class="profile-info-container left">
	<div class="profile-info-profile-pic left">
		<div class="profile-info-profile-pic-container">
			<?php 
				if (isset($member["MemberProfile"]["picture_path"])&&($member["MemberProfile"]["picture_path"]!="")){
					echo $html->image("uploads/".$member["Member"]["id"]."/default/profile_thumb_".$member["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$member["Member"]["id"]));
				}else{
					if ($member["Gender"]["value"]=="Man"){
						echo $html->image($path."s-men.png", array("url"=>"/members/profile/".$member["Member"]["id"]));
					}else{
						echo $html->image($path."s-women.png", array("url"=>"/members/profile/".$member["Member"]["id"]));
					}
				}
			?>
		</div>
		<div class="profile-info-profile-pic-shadow">
		</div>
		<div class="profile-info-profile-pic-status">
			<?php 
				echo $html->image("/css/img/fixed/profile/im-online.png")
			?>
		</div>
		<div>
		</div>
	</div>
	<div class="profile-info-profile-details left">
		<h1> <?php 
			if (isset($user)){
				echo $user["Member"]["firstname"]." ".$user["Member"]["lastname"];
			}else{
				echo $member["Member"]["firstname"]." ".$member["Member"]["lastname"];	
			}	
			?></h1>
		<h5><?php 
			if ($view_member["Member"]["address1"]!=""){
				echo $view_member["Member"]["address1"].", ";
			}
			if ($view_member["Member"]["city"]!=""){
				echo $view_member["Member"]["city"].", ";
			}
			if ($view_member["Member"]["state"]!=""){
				echo $view_member["Member"]["state"];
			}
		
		?></h5>
		<h5><?php echo $member["Country"]["name"]?></h5>
		<div class="item-links">
			<ul>
				<li class="active">
					<?php echo $html->link("MY PASSION", "/members/details/passionate_about", array("class"=>"toggle-profile-link"))?>
				</li>
				<li>
					<?php echo $html->link("I AM LOOKING FOR IN A PERSON", "/members/details/looking_for_details", array("class"=>"toggle-profile-link"))?>
				</li>
			</ul>

		</div>
		<div id="item-links-content" class="item-links-content">
			<p>
				<?php 
					echo $member["MemberProfile"]["passionate_about"]
				
				?>
			</p>
		</div>
		<div class="item-links-shadow">
		</div>

	</div>

	<div class="profile-info-profile-progress">
		<div class="profile-progress right">
			<?php 
				$image = $html->image("/css/img/fixed/profile/edit-profile.png");
				echo $html->link("{$image}Edit My Profile", "/members/edit", array("escape"=>false));
			?>
			<dl>
				<dt>
				<?php
					 $image = $html->image("/css/img/fixed/profile/edit-profile-progress-bar.jpg");
					 echo $image;
				?>				
				</dt>
				<dd>
					<span>Profile Completeness (100%)</span>
				</dd>
			</dl>

		</div>
		<div class="profile-progress-notify">

			<h3> Hi, <?php echo $member["Member"]["firstname"]?></h3>
			<h3>
			You have
			<span id="match-count"></span> new matches
			</h3>
			<div class="button-view right">
				<button id="button-view" class="buttonselect right" type="submit">
				</button>
			</div>
		</div>

	</div>

</div>