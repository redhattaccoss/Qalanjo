<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Qalanjo.com</title>
		
		<?php echo $html->css("globals/core")?>
		<?php echo $html->css("blueprint/screen")?>
		<?php echo $html->css(array("blueprint/print"), "stylesheet", array("media"=>"print"))?>
		<!--[if IE]><?php echo $html->css("blueprint/ie")?><![endif]-->
		<?php echo $html->css(array("redmond/jquery.ui.all", "blue/container-no-tab", "toastmessage/css/jquery.toastmessage"))?>
		<?php 
			$path = $html->url("/");
			echo $this->element("scripts/php_javascript", array("url"=>$path));
		?>
		<?php 
			echo $javascript->link(array("jquery", "js/jquery-animate-clip", "js/jquery.easing.1.3", "ui/jquery-ui-1.8.10.custom",'validate/jquery.validate.min', "ui/autocomplete.html", "js/jquery.toastmessage.js", "js/jquery.form"));
		?>
		<?php 
			echo $scripts_for_layout;
			$path_container = "/css/img/blue/container/";
			echo $this->element("blue/script/blue_full_block_no_tab_scripts");
		?>
	</head>
    <body>
    	<div class="header-bg"></div>
		<div class="container">
			<div class="header left">
				<div class="logo left"></div>
				<div class="right-header left">
					<?php if ($this->action!="login"){?>
					<div class="controls-right right">
						<div class="right">
							<?php 
								echo $html->image($path_container."facebook_s1.png", array("class"=>"left", "url"=>"http://www.facebook.com/pages/Qalanjo/183622908342331"));
								echo $html->image($path_container."rss_s1.png", array("class"=>"left"));
								echo $html->image($path_container."twitter_s1.png", array("class"=>"left"));			
							?>
						</div>
						<div class="right right-header-content clear">
							<?php echo $html->link("<strong>Login</strong>", "/members/login", array("escape"=>false))?>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
			<div class="tab-line left"></div>
			<div class="homebox">
				<?php echo $content_for_layout?>
			</div>
			<div class="footer left">
				<div class="left footer-left">
                        <div class="left">
                           <h2 class='qalanjo'>Qalanjo LLC</h2>
                           <div class="name-company">Copyright &copy; Qalanjo LLC. All Rights Reserved 2011</div>
 	  	                   <div class="find-us"><span class="left">Find Us on</span><?php echo $html->link(" ", "http://www.facebook.com/pages/Qalanjo/183622908342331", array("class"=>"fb left clear"))?><?php echo $html->link(" ", "#", array("class"=>"twitter left"))?><?php echo $html->link(" ", "#", array("class"=>"rss left"))?></div>
                        </div>
                    </div>
				 <?php echo $this->element("blue/general/footer_link_set_2")?>
				
			</div>
			<div class="left gradient-bottom"></div>
		</div>
    </body>
</html>
