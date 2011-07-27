<div class="left clear about-us-menu">
	<ul class="left">
		<?php 
			if ($page=="aboutus"){
		?>
			<li class="active">
				<?php echo $html->link("About Us", "/aboutus")?>
			</li>
			<li>
				<?php echo $html->link("Why Qalanjo", "/why")?>
			</li>
			<li>
				<?php echo $html->link("Services", "/services")?>
			</li>
			<li>
				<?php echo $html->link("Management Team", "/team")?>
			</li>
			<li>
				<?php echo $html->link("Affiliates", "/affiliates")?>
			
			</li>
			
			<li>
				<?php echo $html->link("Contact Us", "/contactus")?>
			</li>
		<?php }else if ($page=="why"){?>
			<li>
				<?php echo $html->link("About Us", "/aboutus")?>
			</li>
			<li class="active">
				<?php echo $html->link("Why Qalanjo", "/why")?>
			</li>
			<li>
				<?php echo $html->link("Services", "/services")?>
			</li>
			<li>
				<?php echo $html->link("Management Team", "/team")?>
			</li>
			<li>
				<?php echo $html->link("Affiliates", "/affiliates")?>
			
			</li>
			
			<li>
				<?php echo $html->link("Contact Us", "/contactus")?>
			</li>
		<?php }else if ($page=="services"){?>
			<li>
				<?php echo $html->link("About Us", "/aboutus")?>
			</li>
			<li>
				<?php echo $html->link("Why Qalanjo", "/why")?>
			</li>
			<li class="active">
				<?php echo $html->link("Services", "/services")?>
			</li>
			<li>
				<?php echo $html->link("Management Team", "/team")?>
			</li>
			<li>
				<?php echo $html->link("Affiliates", "/affiliates")?>
			
			</li>
			
			<li>
				<?php echo $html->link("Contact Us", "/contactus")?>
			</li>
		<?php }else if ($page=="team"){?>
			<li>
				<?php echo $html->link("About Us", "/aboutus")?>
			</li>
			<li>
				<?php echo $html->link("Why Qalanjo", "/why")?>
			</li>
			<li>
				<?php echo $html->link("Services", "/services")?>
			</li>
			<li class="active">
				<?php echo $html->link("Management Team", "/team")?>
			</li>
			<li>
				<?php echo $html->link("Affiliates", "/affiliates")?>
			
			</li>
			
			<li>
				<?php echo $html->link("Contact Us", "/contactus")?>
			</li>
		<?php }else if ($page=="affiliates"){?>
			<li>
				<?php echo $html->link("About Us", "/aboutus")?>
			</li>
			<li>
				<?php echo $html->link("Why Qalanjo", "/why")?>
			</li>
			<li>
				<?php echo $html->link("Services", "/services")?>
			</li>
			<li>
				<?php echo $html->link("Management Team", "/team")?>
			</li>
			<li class="active">
				<?php echo $html->link("Affiliates", "/affiliates")?>
			
			</li>
			
			<li>
				<?php echo $html->link("Contact Us", "/contactus")?>
			</li>
		<?php } else if ($page=="contactus"){?>
			<li>
				<?php echo $html->link("About Us", "/aboutus")?>
			</li>
			<li>
				<?php echo $html->link("Why Qalanjo", "/why")?>
			</li>
			<li>
				<?php echo $html->link("Services", "/services")?>
			</li>
			<li>
				<?php echo $html->link("Management Team", "/team")?>
			</li>
			<li>
				<?php echo $html->link("Affiliates", "/affiliates")?>
			
			</li>
			
			<li class="active">
				<?php echo $html->link("Contact Us", "/contactus")?>
			</li>
		<?php }else{?>
			<li>
				<?php echo $html->link("About Us", "/aboutus")?>
			</li>
			<li>
				<?php echo $html->link("Why Qalanjo", "/why")?>
			</li>
			<li>
				<?php echo $html->link("Services", "/services")?>
			</li>
			<li>
				<?php echo $html->link("Management Team", "/team")?>
			</li>
			<li>
				<?php echo $html->link("Affiliates", "/affiliates")?>
			
			</li>
			
			<li>
				<?php echo $html->link("Contact Us", "/contactus")?>
			</li>
		<?php }?>
	</ul>
</div>