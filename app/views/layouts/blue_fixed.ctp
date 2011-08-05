<!DOCTYPE html>
<html>
	<head>
		<title>Qalanjo.com</title>
		<?php echo $html->css("blueprint/screen")?>
		<?php echo $html->css(array("blueprint/print"), "stylesheet", array("media"=>"print"))?>
		<!--[if IE]><?php echo $html->css("blueprint/ie")?><![endif]-->
		<?php echo $html->css(array("redmond/jquery.ui.all", "fixed/container-style","fixed/header", "fixed/footer"))?>
		<?php 
			echo $html->css(array("uploadify.css"), "stylesheet", array("inline"=>false));
		?>
		<?php 
			$path = $html->url("/");
			echo $this->element("scripts/php_javascript", array("url"=>$path));
		?>
		<?php echo $javascript->link(array("jquery", "js/jquery-animate-clip", "js/jquery.easing.1.3", "ui/jquery-ui-1.8.10.custom",'validate/jquery.validate.min', "ui/autocomplete.html", "js/jquery.form", "blue/members/session_checker"))?>
		
		<?php echo $this->element("blue/fixed/scripts")?>
		<?php echo $this->element("js_lib/import_fixed_scripts")?>
		<?php echo $scripts_for_layout?>
	</head>

	<body>
		<?php 
			echo $this->element("blue/fixed/header")
		?>
		<div class="wrapper-container">
			<div class="tab-line"></div>
			<div class="container">
				<div class="shadowingleft right"></div>
				<div class="maincontainer right">
					
					<?php echo $content_for_layout?>
					
					<?php echo $this->element("blue/general/footer-new")?>
					<div class="footershadow left"></div>
				</div>
				<div class="shadowingright right"></div>
			</div>
		</div>
		
		<div id="overlay" class="overlay"></div>
		<?php if ($this->action=="step"){
		 echo $this->element("blue/dialogs/questionnaire");
		}?>
	
	</body>
</html>
