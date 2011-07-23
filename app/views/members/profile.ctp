<?php 
	if ($view_member["Gender"]["value"]=="Woman"){
		$pronoun = "her";
		$pronoun_ref = "She";
		$pronoun_self = "her";
		$pronoun_self_prop = "Her";
	}else{
		$pronoun = "him";
		$pronoun_self = "his";
		$pronoun_ref = "He";
		$pronoun_self_prop = "His";
	}
	echo $html->scriptBlock("
		var member_id = {$member["Member"]["id"]};
		var to_id = {$view_member["Member"]["id"]};
		
	", array("inline"=>false));
	
?>
<?php 
	$path = "/css/img/blue/viewprofile/";
?>
<div class="banner-container left">
	<?php echo $html->image($path."bannergift.jpg")?>
</div>
<div class="container-left-side left">
	<div class="main-container-profile-pic">
		<div class="profile-pic-frame">
			<?php 
				if (isset($view_member["MemberProfile"]["picture_path"])||($view_member["MemberProfile"]["picture_path"]!="")){
					echo $html->image("uploads/".$view_member["Member"]["id"]."/default/profile_thumb_".$view_member["MemberProfile"]["picture_path"]);
				}else{
					if ($view_member["Gender"]["value"]=="Man"){
						echo $html->image($path."default.jpg");
					}else{
						echo $html->image($path."woman-default-picture.jpg");
					}
				}
			
			?>
			<div>
				<ul class="profile-pic-frame">
				
					<?php 
						if ($view_member["Member"]["online"]==1){
							?>
							<li class="online-ofline"></li>
							<?php 	
						}else{
							?>
							<li class="offline"></li>
							<?php 
						}
					?>
					<li>
						<?php 
							echo $html->link("Photos", "/photos/view/".$view_member["Member"]["id"]);
						?>
					</li>
					
					<?php if ($view_member["Member"]["id"]!=$member["Member"]["id"]){?>
						<li class="messageicon">
							<a class="next-step-button message_link" href="#">Send a message</a>
						</li>
						<li class="winkicon">
							<a href="#" class="winker">Wink</a>	
						</li>
						<li class="gifticon">
							<?php 
								echo $html->link('Send a Gift', array('controller'=>'gifts')); 
							?>
						</li>
					<?php }?>

				</ul>
			</div>
		</div>
		<div class="complete-name right">
			<h2> 
			<?php 
				echo $view_member["Member"]["firstname"].", ".$view_member["Member"]["lastname"];		
			?></h2>
			<ul class="address">
				<li>
					<?php 
						if ($view_member["Member"]["address1"]!=""){
							echo $view_member["Member"]["address1"].", ";
						}
						if ($view_member["Member"]["city"]!=""){
							echo $view_member["Member"]["city"].", ";
						}
						if ($view_member["Member"]["state"]!=""){
							echo $view_member["Member"]["state"];
						}
					
					?>
				</li>
				<li>
					<?php 
						echo $view_member["Country"]["name"];
					?>
				</li>
			</ul>
			<div class="mypassion-tab">
				<div>
					<ul>
						<li class="active">
							<a href="#passion">MY PASSION</a>
						</li>
						<li>
							<a href="#looking-for">I AM LOOKING FOR IN A PERSON</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="passion" class="mypassion-container">
				<p>
					<?php 
						if ($profile["MemberProfile"]["passionate_about"]!=""){ 
							echo $profile["MemberProfile"]["passionate_about"];
						}else{
							echo "&lt;not answered&gt;";	
						}
					?>
				</p>
			</div>
			<div id="looking-for" class="mypassion-container">
				<p>
					<?php 
						if ($profile["MemberProfile"]["looking_for_details"]!=""){ 
							echo $profile["MemberProfile"]["looking_for_details"];
						}else{
							echo "&lt;not answered&gt;";	
						}
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="about-me left">
		<h4> Basic Information</h4>
		<div class="info-container">
			<dl class="basic-information-dl">
				<dt>
					Occupation:
				</dt>
				<dd>
					<?php
						if ($profile["MemberProfile"]["occupation"]!=""){ 
							echo $profile["MemberProfile"]["occupation"];
						}else{
							echo "&lt;not answered&gt;";
						}
					?>
				</dd>
				<dt>
					Age:
				</dt>
				<dd>
					<?php
						if ($view_member["Member"]["age"]!=""){ 
							echo $view_member["Member"]["age"];
						}else{
							echo "&lt;not answered&gt;";
						}
					?>
				</dd>
				<dt>
					Height:
				</dt>
				<dd>
					<?php 
						if ($profile["MemberProfile"]["height_ft"]!=""){ 
							?>
								<?php echo $profile["MemberProfile"]["height_ft"]?>'<?php echo $profile["MemberProfile"]["height_inch"]?>"
							<?php 
						}else{
							echo "&lt;not answered&gt;";
						}
					?>
				</dd>
				<dt>
					Want Kids
				</dt>
				<dd>
					No
				</dd>
				<dt>
					Kids at Home
				</dt>
				<dd>
					<?php 
						if ($haveKids["ProfileAnswer"]["answer"]==""){
							echo "&lt;not answered&gt;";
						}
					?>
					<?php echo $haveKids["ProfileAnswer"]["answer"]?>
				</dd>
			</dl>
			<dl class="basic-information-dl">
				
				<dt>
					Drinks:
				</dt>
				<dd>
					<?php 
						if ($drink["ProfileAnswer"]["answer"]!=""){
							echo $drink["ProfileAnswer"]["answer"];
						}else{
							echo "&lt;not answered&gt;";
						}
					?>
				</dd>
				<dt>
					Smokes:
				</dt>
				<dd>
					<?php 
						if ($smoke["ProfileAnswer"]["answer"]!=""){
							echo $smoke["ProfileAnswer"]["answer"];
						}else{
							echo "&lt;not answered&gt;";
						}
					?>
				</dd>
				<dt>
					Goes to the gym:
				</dt>
				<dd>
					<?php 
						if ($drink["ProfileAnswer"]["answer"]!=""){
							echo $gym["ProfileAnswer"]["answer"];
						}else{
							echo "&lt;not answered&gt;";
						}
					?>
				</dd>
				<dt>
					Controls diet:
				</dt>
				<dd>
					<?php 
						if ($diet["ProfileAnswer"]["answer"]!=""){
							echo $diet["ProfileAnswer"]["answer"];
						}else{
							echo "&lt;not answered&gt;";
						}
					
					?>
				</dd>
				<dt>
					Match Delivered:
				</dt>
				<dd>
					<?php 
						if (!$match){
							echo "Not a match";
						}else{
							echo date("m/d/Y", strtotime($match["Match"]["created"]));
						}
					?>
				</dd>
			</dl>
			
			
		</div>
		<h4 class="clear">Physical Appearance</h4>
		<div class="info-container">
			<dl class="basic-information-dl">
				<dt>
					Eye Color:
				</dt>
				<dd>
					<?php 
						if ($eyes["ProfileAnswer"]["answer"]==""){
							echo "&lt;not answered&gt;";
						}
					?>
					<?php echo $eyes["ProfileAnswer"]["answer"]?>
				</dd>
				<dt>
					Hair Color:
				</dt>
				<dd>
					<?php 
						if ($hairColor["ProfileAnswer"]["answer"]==""){
							echo "&lt;not answered&gt;";
						}
					?>
					<?php echo $hairColor["ProfileAnswer"]["answer"]?>
				</dd>
				<dt>
					Hair Length:
				</dt>
				<dd>
					<?php 
						if ($hairLength["ProfileAnswer"]["answer"]==""){
							echo "&lt;not answered&gt;";
						}
					?>
					<?php echo $hairLength["ProfileAnswer"]["answer"]?>
				</dd>
				
				<dt>
					Describe <?php echo $pronoun_self?> build as:
				</dt>
				<dd>
					<?php 
						if ($diet["ProfileAnswer"]["answer"]==""){
							echo "&lt;not answered&gt;";
						}
					?>
					<?php echo $diet["ProfileAnswer"]["answer"]?>
				</dd>
				
				<dt>
					Describe <?php echo $pronoun_self?> appearance as:
				</dt>
				<dd>
					<?php 
						if ($appearance["ProfileAnswer"]["answer"]==""){
							echo "&lt;not answered&gt;";
						}
					?>
					<?php echo $appearance["ProfileAnswer"]["answer"]?>
				</dd>
				
				
			</dl>
		
		</div>
		
		<h4 class="clear"> In my Own Words</h4>
		<div class="info-container">
			<dl class="in-my-own-words-dl">
				<?php 
					$i=0;
					foreach($own_words as $word){
						if (($word["InMyOwnWordsAnswer"]["answer"]!="")&&($i<=2)){
					?>
						<dt>
							<?php 
								echo $word["InMyOwnWordQuestion"]["question"];
							?>		
						</dt>
						<dd>
							<?php 
								echo $word["InMyOwnWordsAnswer"]["answer"];
							?>
						</dd>
					<?php 							
							$i++;
						}
					}
				?>
				
				<div class="column">
					<dt>
						<span class="orangecolor">3</span> things which I am most thankful for:
					</dt>
					<dd>
						<ul>
							<?php
								$count = 0;
								for($i=1;$i<=3;$i++){
									if ($profile["MemberProfile"]["thankful_".$i]!=""){
									
									?>
										<li>
											<?php 
											echo $profile["MemberProfile"]["life_skill_".$i]
											?>
										</li>
									<?php
									}else{
										$count++;
									}
								}
								if ($count==3){
									echo "&lt;not answered&gt;";
								}
							
							?>
						</ul>
					</dd>
				</div>
				<div class="column last">
					<dt>
						<span class="orangecolor">3</span> of my best life-skills
					</dt>
					<dd>
						<ul>
							<?php
								$count = 0;
								for($i=1;$i<=3;$i++){
									if ($profile["MemberProfile"]["life_skill_".$i]!=""){
									
									?>
										<li>
											<?php 
											echo $profile["MemberProfile"]["life_skill_".$i]
											?>
										</li>
									<?php
									}else{
										$count++;
									}
								}
								if ($count==3){
									echo "&lt;not answered&gt;";
								}
							
							?>
						</ul>
					</dd>
				</div>
				<dt>
					<span class="greencolor">1</span> thing I wish MORE people would notice about me
				</dt>
				<dd>
					<?php
						if ($profile["MemberProfile"]["first_people_notice"]!=""){ 
							echo $profile["MemberProfile"]["first_people_notice"];
						}else{
							echo "&lt;not answered&gt;";
						}
					?>
				</dd>
				<div class="column">
					<dt>
						Things I can't live without
					</dt>
					<dd>
						<ul>
							<li>
								Love
							</li>
							<li>
								Communication
							</li>
							<li>
								Transportation
							</li>
							<li>
								Tools of my Trades
							</li>
							<li>
								Kiddos
							</li>
						</ul>
					</dd>
				</div>
				<div class="column last">
					<dt>
						The first thing people notice about me:
					</dt>
					<dd>
						<?php
							if ($profile["MemberProfile"]["first_people_notice"]!=""){ 
								echo $profile["MemberProfile"]["first_people_notice"];
							}else{
								echo "&lt;not answered&gt;";
							}
						?>
					</dd>
				</div>
				<dt>
					Some additional information I want you to know:
				</dt>
				<dd>
					
					<?php
						if ($profile["MemberProfile"]["match_want"]!=""){ 
							echo $profile["MemberProfile"]["match_want"];
						}else{
							echo "&lt;not answered&gt;";
						}
					?>
				</dd>
			</dl>
		</div>
		<h4 class="clear"> My Interests</h4>
		<div class="info-container">
			<dl class="in-my-own-words-dl">
				<div class="column">
					<dt>
						Thing I do in leisure time
					</dt>
					<dd>
						<?php 
							if ($profile["MemberProfile"]["leisure_activity"]==""){
								echo "&lt;not answered&gt;";
							}
							echo $profile["MemberProfile"]["leisure_activity"];
						?>
					</dd>
				</div>
				<div class="column last">
					<dt>
						The last book I read
					</dt>
					<dd>
						<?php 
							if ($profile["MemberProfile"]["last_book"]==""){
								echo "&lt;not answered&gt;";
							}
							echo $profile["MemberProfile"]["last_book"];
						?>
					</dd>
				</div>
			</dl>
		</div>
		<h4> According to My Friends</h4>
		<div class="info-container">
			<dl class="in-my-own-words-dl">
				<dt>
					My friends describe me as:
				</dt>
				<dd>
					<ul>
						<?php 	
							if (!empty($view_member["FriendSayTrait"])){
								foreach($view_member["FriendSayTrait"] as $trait){
									?>
										<li><?php echo $trait["value"]?></li>
									<?php 
								}
							}else{
								echo "&lt;not answered&gt;";
							}
						?>
					</ul>
				</dd>
			</dl>
		</div>
	</div>
</div>
<div class="container-right-side left">
	<div class="archive-match right">
	
		<?php 
			$image = $html->image($path."archive.png");
			echo $html->link("Archive this Match{$image}","/matches/archive/".$view_member["Member"]["id"], array("escape"=>false));
		?>
		<dl>
		
		
		
				<?php 
					if (!empty($firstViewed)){
						?>
						<dt>
							You first viewed this information on
						</dt>			
						<dd>
							<?php 
								echo $firstViewed["ViewActivity"]["created"];
							?>
						</dd>
						<?php 
					}else{
						?>
						<dt>
							You first viewed this information on
						</dt>
						<dd>
							You never viewed his information
						</dd>
						<?php 
					}
				
				?>
			</dd>
		</dl>
	</div>
	<div class="topic-opener-header left">
		<h3> TOPIC OPENER</h3>
	</div>
	<div class="topic-opener-container left">
		<dl>
			<dt>
				Like me, <?php echo $view_member["Member"]["firstname"]?> also......
			</dt>
			<dd>
				<ul>
					<?php 
						foreach($sameInterests as $interest){
							$count = 0;
							foreach($view_member["Interest"] as $member_interest){
								if ($interest==$member_interest["interest_type_id"]){
									$count++;
								}
							}
							$i=0;
							foreach($view_member["Interest"] as $member_interest){
								if ($interest==$member_interest["interest_type_id"]){
									if ($interest==1){
										$class="music";
										$message = "loves music";
									}else if ($interest==2){
										$class="movies";
										$message = "loves movies";
									}else if ($interest==3){
										$class="pets";
										$message = "loves pets";
									}else if ($interest==4){
										$class="books";
										$message = "loves reading books";
									}
									if ($i==0){
									?>
										<li id="<?php echo $class?>">
											<?php echo $message?>, 
											<?php 
												if ($count==1){
													echo "especially ".$member_interest["description"].".";
												}else{
													?>
													<dl>
														<dt>
															<?php 
																echo $pronoun_self_prop." favorite ".$class." includes:"
															?>
														</dt>
														<dd>
															<ul>
																<li><?php echo $member_interest["description"]?></li>
													<?php 
												}
											
											?>
									
									<?php
									}else{
										if ($count!=0){
											?>
											<li><?php echo $member_interest["description"]?></li>
											<?php 
										}
									?>
									<?php 
									
									}
									$i++;
								}
							}
							if ($count!=0){
								?>
										</ul>
									</dd>
								</dl>
								<?php 						
							}
							?>
							</li>
							<?php 
						}			
					?>
				</ul>
			</dd>
		</dl>
	</div>
	<div class="communication-advice-header left">
		<h3> Communication Advice</h3>
	</div>
	<div class="communication-advice-container left">
		<ul>
			<li>
				<?php 
					echo $html->image($path."writingimage.jpg")
				?>
				<dl>
					<dt>
						Title goes here and more text
					</dt>
					---------------------------------------
					<dd>
						If youre interested in meeting people and going on dates, photos need to be a part
						of online dating experience. Can it be scary? You bet, but its the key to a successful
						experience. We look at the reasons it is so important to put yourself out there
						and the types of photos that are absolutely essential.
					</dd>
				</dl>
			</li>
			<li>
				<?php 
					echo $html->image($path."girlimage.jpg")
				
				?>
				<dl>
					<dt>
						Title goes here and more text
					</dt>
					---------------------------------------
					<dd>
						If youre interested in meeting people and going on dates, photos need to be a part
						of online dating experience. Can it be scary? You bet, but its the key to a successful
						experience. We look at the reasons it is so important to put yourself out there
						and the types of photos that are absolutely essential.
					</dd>
				</dl>
			</li>
		</ul>
	</div>
</div>
<?php echo $this->element("blue/members/general/composer")?>
<?php echo $this->element("blue/members/general/wink", array("member"=>$view_member))?>
<?php echo $this->element("blue/members/general/message_result")?>
<div id="icebreaker"></div>