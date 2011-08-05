<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Qalanjo.com is a dating website for Somali couples">
		<meta name="keywords" content="dating, qalanjo, somali, somalia, matchmaking, love, road to love, couple">
		<meta name="author" content="Qalanjo LLC">
		<meta name="rating" content="General">
		<meta name="robots" content="index, follow">
		        
        <title>Qalanjo.com - Your Road to Love</title>
		<?php echo $html->css("blueprint/screen")?>
		<?php echo $html->css(array("blueprint/print"), "stylesheet", array("media"=>"print"))?>
		<!--[if IE]><?php echo $html->css("blueprint/ie")?><![endif]-->
		<?php echo $html->css("articles/footer")?>
		<?php echo $html->css("blue/home")?>
		<?php 
			echo $html->scriptBlock("
				var action='{$this->action}';
			");
			$path = $html->url("/");
			echo $this->element("scripts/php_javascript", array("url"=>$path));
		?>
		<?php echo $javascript->link(array("jquery", "js/jquery-animate-clip", "validate/jquery.validate.min", "js/jquery.form", "js/jquery.easing.1.3", "home_new/script"))?>

    </head>
    <body>
        <div class="container">
            <div class="shadow left">
            </div>
            <div class="container-main left">
               <?php echo $content_for_layout;?>
				<?php echo $this->element("blue/general/footer_link_set_3")?>
            </div>
            <div class="shadow shadow-last left">
            </div>
        </div>
        <div id="result"></div>
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
    </body>
    
</html>
