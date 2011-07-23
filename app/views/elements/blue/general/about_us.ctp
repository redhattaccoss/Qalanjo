<h3>ABOUT US</h3>
<ul>
	<?php 
		if ($page=="aboutus"){
		?>
			<li class="active" >
				<?php 
					echo $html->link("About Qalanjo.com", "/aboutus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Why Qalanjo", "/why");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Services", "/services");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Mngt. Team", "/team");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Affiliates", "/affiliates");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Contact Us", "/contactus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Back To Home", "/");
				?>
			</li>		
		
		<?php 	
		}else if ($page=="why"){
			?>
			<li>
				<?php 
					echo $html->link("About Qalanjo.com", "/aboutus");
				?>
			</li>
			<li class="active">
				<?php 
					echo $html->link("Why Qalanjo", "/why");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Services", "/services");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Mngt. Team", "/team");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Affiliates", "/affiliates");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Contact Us", "/contactus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Back To Home", "/");
				?>
			</li>
			<?php 
		}else if ($page=="services"){
			?>
			<li>
				<?php 
					echo $html->link("About Qalanjo.com", "/aboutus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Why Qalanjo", "/why");
				?>
			</li>
			<li class="active">
				<?php 
					echo $html->link("Services", "/services");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Mngt. Team", "/team");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Affiliates", "/affiliates");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Contact Us", "/contactus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Back To Home", "/");
				?>
			</li>
			<?php 
		}else if ($page=="team"){
			?>
			<li>
				<?php 
					echo $html->link("About Qalanjo.com", "/aboutus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Why Qalanjo", "/why");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Services", "/services");
				?>
			</li>
			<li class="active">
				<?php 
					echo $html->link("Mngt. Team", "/team");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Affiliates", "/affiliates");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Contact Us", "/contactus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Back To Home", "/");
				?>
			</li>
			
			<?php 
		}else if ($page=="affiliates"){
			?>
			<li>
				<?php 
					echo $html->link("About Qalanjo.com", "/aboutus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Why Qalanjo", "/why");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Services", "/services");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Mngt. Team", "/team");
				?>
			</li>
			<li class="active">
				<?php 
					echo $html->link("Affiliates", "/affiliates");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Contact Us", "/contactus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Back To Home", "/");
				?>
			</li>
			
			<?php 
		}else if ($page=="contactus"){
			?>
			<li>
				<?php 
					echo $html->link("About Qalanjo.com", "/aboutus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Why Qalanjo", "/why");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Services", "/services");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Mngt. Team", "/team");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Affiliates", "/affiliates");
				?>
			</li>
			<li class="active">
				<?php 
					echo $html->link("Contact Us", "/contactus");
				?>
			</li>
			<li>
				<?php 
					echo $html->link("Back To Home", "/");
				?>
			</li>
			<?php 
		}
	?>
</ul>