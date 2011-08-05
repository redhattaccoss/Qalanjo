<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Qalanjo.com</title>
		<?php echo $html->css("globals/core")?>
		<?php echo $html->css("blueprint/screen")?>
		<?php echo $html->css(array("blueprint/print"), "stylesheet", array("media"=>"print"))?>
		<!--[if IE]><?php echo $html->css("blueprint/ie")?><![endif]-->
		<?php echo $html->css(array("redmond/jquery.ui.all", "blue/container-style", "toastmessage/css/jquery.toastmessage", "blue/footer-2"))?>
		<?php 
			echo $html->css(array("uploadify.css"), "stylesheet", array("inline"=>false));
		?>
		
		<?php 
			$path = $html->url("/");
			echo $this->element("scripts/php_javascript", array("url"=>$path));
		?>
		<?php echo $javascript->link(array("jquery", "js/jquery-animate-clip", "js/jquery.easing.1.3", "ui/jquery-ui-1.8.10.custom",'validate/jquery.validate.min', "ui/autocomplete.html", "js/jquery.form", "blue/members/session_checker"))?>
		<?php 
			if ($this->action=="match_settings"){
				echo $html->css("blue/match-setting");
			}else if (($this->name=="Photos")||($this->name=="Album")){
				echo $html->css(array(
			       'blue/matches-page-style',
				   'blue/album'));
			    echo $javascript->link("uploader/swfobject");
			    echo $html->css("uploadify");
			    echo $javascript->link("uploader/jquery.uploadify.v2.1.4.min");
				echo $html->css('photos/upload-style');
			    echo $this->element('photos/upload-script');
			    echo $javascript->link('slimbox/js/slimbox-trunk');
			    echo $javascript->link('popup-box/popup-box');
			    echo $html->css('photos/slimbox2');
			    echo $html->css(array(
			    		'blue/ui-dialog',
			    		'blue/upload-style'));
			}
			echo $html->scriptBlock("
				var userid = {$member["Member"]["id"]}
			");
			echo $scripts_for_layout;
			$path_container = "/css/img/blue/container/";
			$path_index = "/css/img/blue/index/";
			echo $this->element("blue/script/blue_full_block_scripts");
		?>
	</head>
    <body>
    	<div class="header-bg">
    	</div>
		<div class="container">
			<div class="header left">
				<?php echo $html->link(" ", "/welcome", array("class"=>"logo left"))?>
				<div class="right-header left">
					<?php if ($this->action!="inbox"){?>
					<div class="controls-right right">
						<div class="right">
							<?php 
								echo $html->image($path_container."facebook_s1.png", array("class"=>"left", "url"=>"http://www.facebook.com/pages/Qalanjo/183622908342331"));
								echo $html->image($path_container."rss_s1.png", array("class"=>"left"));
								echo $html->image($path_container."twitter_s1.png", array("class"=>"left"));			
							?>
						</div>
						<div class="right right-header-content clear">
							<?php 
								if (isset($member["MemberProfile"])&&($member["MemberProfile"]["picture_path"]!="")){
									echo $html->image("uploads/".$member["Member"]["id"]."/default/profile_thumb_".$member["MemberProfile"]["picture_path"], array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"left profile-pic"));
								}else{
									if (isset($member["Gender"])){
										if ($member["Member"]["gender_id"]==1){
											echo $html->image($path_index."thumb-s-men.jpg", array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"left profile-pic"));
										}else{
											echo $html->image($path_index."thumb-s-women.jpg", array("url"=>"/members/profile/".$member["Member"]["id"], "class"=>"left profile-pic"));
										}
									}
								}
							?>
							<span class="left">Hi, Welcome <strong><?php 
							if (isset($user)){
								echo $user["Member"]["firstname"]." ".$user["Member"]["lastname"];
							}else{
								echo $member["Member"]["firstname"]." ".$member["Member"]["lastname"];	
							}	
							?></strong> |  <?php echo $html->link("Log-out", "/members/logout")?></span>
							<span class="right clear"><?php echo date("l, F d, Y h:m A")?></span>
						</div>
					</div>
					
						<?php }else{
						?>
							<div class="spacer-top"></div>
						<?php 
						}?>
						
					<?php
					if ($this->action!="step"){
					echo $this->element("blue/members/general/header");
					}?>
					
				</div>
			</div>
			<div class="tab-line left">
			</div>
			<div class="homebox">
				<?php 
					echo $content_for_layout;
				?>
			</div>
			<?php echo $this->element("blue/general/footer-new")?>
		</div>
		<div class="footershadow"></div>	
		<div id="overlay" class="overlay"></div>
		<?php if ($this->action=="step"){
		 echo $this->element("blue/dialogs/questionnaire");
		}?>
    </body>
     <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-23493927-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
</html>