<?php 
	$path = "/css/img/blue/index/";

?>

<div class="left-container left clear">
		<div class="profile-pic left">
			<?php 
				if (isset($member["MemberProfile"]["picture_path"])||($member["MemberProfile"]["picture_path"]!="")){
					echo $html->image("uploads/".$member["Member"]["id"]."/default/profile_thumb_".$member["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$member["Member"]["id"]));
				}else{
					if ($member["Gender"]["value"]=="Man"){
						echo $html->image($path."s-men.png", array("url"=>"/members/profile/".$member["Member"]["id"]));
					}else{
						echo $html->image($path."s-women.png", array("url"=>"/members/profile/".$member["Member"]["id"]));
					}
				}
			?>
			<?php /*?>
			<img src="img/index/silhouette-boy.png" alt="Profile Picure"/>
			*/?>
		</div>
		<div class="profile-info left">
			<h1 class="left"><?php echo $member["Member"]["firstname"]." ".$member["Member"]["lastname"]?></h1>
			<span class="location left clear">
			<?php 
				if ($member["Member"]["city"]==""){
					echo $member["Member"]["state"];
				}else{
					echo $member["Member"]["city"].", ".$member["Member"]["state"];
				}
			
			?></span>
			<div class="left controls-vertical clear">
				<ul class="controls-vertical left">
					<li class="left">
						<?php 
							$img = $html->image($path."edit.gif", array("alt"=>"edit", "class"=>"left"));
							echo $html->link("{$img}<span class=\"left\">Edit Profile</span>", array("controller"=>"Members", "action"=>"edit"), array("escape"=>false));
						?>
					</li>						
				</ul>
			</div>
		</div>
		<div class="profile-controls left clear">
			<ul class="controls left">
				<li class="left">
					<span class="count left">
					<?php 
						echo $html->link("<span id='inbox-count'>(0)</span> Inbox", "/inbox", array("escape"=>false));
					?>
					</span> 
					
				</li>
				<li class="left clear">
					<span class="count left">
					<?php 
						echo $html->link("<span id='photos-count'>(0)</span>Photos", "/photos", array("escape"=>false));
					?>
					</span>  <span class="left upload">
						<?php 
							echo $html->link("+ upload", "/photos/upload");
						?>
					</span>
				</li>
			</ul>
		</div>
		<h2 class="clear match-header">
			<span class="matches-header-content clear left">My matches - <span class="matches-header-content-colored">shout out</span></span>
		</h2>
		<div class="clear left match-content-list">
			<?php echo $form->create("Match", array("url"=>"/member_profiles/shout", "id"=>"shoutbox"))?>
				<ul class="left">
					<?php 
					if (isset($loadMatches)){
					foreach($loadMatches as $match){?>
						<li class="left clear">
							<div class="left">
								<?php 
									if (isset($match["Matched"]["MemberProfile"]["picture_path"])||($match["Matched"]["MemberProfile"]["picture_path"]!="")){
										echo $html->image("uploads/".$match["Matched"]["id"]."/default/profile_thumb_".$match["Matched"]["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$match["Matched"]["id"]));
									}else{
										if ($match["Matched"]["gender_id"]==1){
											echo $html->image($path."s-men.jpg", array("url"=>"/members/profile/".$match["Matched"]["id"]));
										}else{
											echo $html->image($path."s-women.jpg", array("url"=>"/members/profile/".$match["Matched"]["id"]));
										}
									}
								?>
							</div>
							<div class="profile-info left">
								<span class="name">
									<?php echo $match["Matched"]["firstname"]." ".$match["Matched"]["lastname"]?>
								</span>
								<?php if ($match["Matched"]["age"]!=""){?>
									<br/>
									<span class="age">
										<?php 
											echo $match["Matched"]["age"]." years old";
										?>
									</span>
								<?php }?>
								<br/>
								<span class="location">
									<?php 
										if ($match["Matched"]["state"]==""){
											echo $match["Matched"]["Country"]["name"];
										}else{
											echo $match["Matched"]["state"].", ".$match["Matched"]["Country"]["name"];
										}
									?>
								</span>
							</div>
							<div class="left clear">
								<p>
									<?php echo $match["Matched"]["MemberProfile"]["status"]?>
								</p>
							</div>
						</li>
					<?php }
					}?>
					<li class="shout-box">
						<dl class="left">
							<dt class="left">
								What's up?
							</dt>
							<dd class="clear">
								<?php 
									echo $form->input("MemberProfile.status", array("value"=>"", "class"=>"shouter left", "id"=>"shouter","rows"=>10, "cols"=>10, "div"=>false, "label"=>false));
									echo $form->input("MemberProfile.id", array("value"=>$member["MemberProfile"]["id"], "type"=>"hidden"));	
								?>
								
							</dd>
						</dl>
					</li>
					<li class="submit">
						<button type="submit" class="right post-button"></button><label class="shout_required"></label>
					</li>
				</ul>
				<?php echo $form->end();?>
		</div>

		<div class="match-list-shadow left clear">	
		</div>
		
		<h2 class="clear match-header com-advice-header">
			<span class="matches-header-content clear left">Communication Advice</span>
		</h2>
		<?php echo $this->element("blue/members/index/communication_advice")?>
		
	</div>