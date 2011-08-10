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
?>
<h4 class="clear"> Basic Information</h4>
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
<div class="info-container clear">
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
<div class="clear">
</div>
<h4 class="clear">In my Own Words</h4>
<div class="info-container clear">
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
									echo $profile["MemberProfile"]["thankful_".$i]
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
					<?php
						$count = 0;
						for($i=1;$i<=5;$i++){
							if ($profile["MemberProfile"]["live_without_".$i]!=""){
							
							?>
								<li>
									<?php 
									echo $profile["MemberProfile"]["live_without_".$i]
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
				The first thing people notice about me:
			</dt>
			<dd>
				<?php
					if ($profile["MemberProfile"]["people_notice"]!=""){ 
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
<div class="info-container clear">
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
<h4 class="clear"> According to My Friends</h4>
<div class="info-container clear">
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