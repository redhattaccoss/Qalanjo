<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Page not found - Qalanjo.com</title>
    <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="css/print.css" type="text/css" media="print" />
    <!--[if IE]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
    <?php echo $html->css("globals/core")?>
	<?php echo $html->css("blueprint/screen")?>
	<?php echo $html->css(array("blueprint/print"), "stylesheet", array("media"=>"print"))?>
	<!--[if IE]><?php echo $html->css("blueprint/ie")?><![endif]-->
	<?php echo $html->css(array("redmond/jquery.ui.all", "error/container","error/footer", "error/pagenotfound"))?>
	
</head>
<body>
    <div class="container">
        <div class="shadow left">
        </div>
        <div class="container-main left">
            <div class="header left">
                <?php 
                	echo $html->link(" ", "/", array("class"=>"logo left"));
                ?>
                <div class="couple-top left">
                </div>
                <div class="communicate left">
                </div>
            </div>
            <div class="header-divider left">
            </div>
            <div class="questionnaire-container left">
               <?php echo $content_for_layout?>
            </div>
            <div class="footer left">
                <div class="left footer-left">
                    <div class="left">
                        <h2 class='qalanjo'>
                            Qalanjo LLC</h2>
                        <div class="name-company">
                            Copyright &copy; Qalanjo LLC. All Rights Reserved 2011
                        </div>
                        <div class="find-us">
                            <span class="left">Find Us on</span> <a href="http://www.facebook.com/pages/Qalanjo/183622908342331"
                                class="fb left clear"></a><a href="#" class="twitter left"></a><a href="#" class="rss left">
                                </a>
                        </div>
                    </div>
                </div>
                <div class="left footer-link-set">
                    <ul class="left footer-links top-links">
                        <li><a href="/qalanjo/sitemap">Site Map</a> </li>
                        <li><a href="/qalanjo/how">How it Works</a> </li>
                        <li><a href="/qalanjo/affiliates">Affiliates</a> </li>
                        <li><a href="/qalanjo/onlinedating">Online Dating</a> </li>
                        <li><a href="/qalanjo/safety">Safety Tips</a> </li>
                        <li><a href="/qalanjo/help">Local Help</a> </li>
                    </ul>
                    <ul class="left footer-links clear center-links">
                        <li><a href="/qalanjo/aboutus">About Us</a> </li>
                        <li><a href="/qalanjo/privacy">Privacy</a> </li>
                        <li><a href="/qalanjo/terms">Terms and Services</a> </li>
                        <li><a href="/qalanjo/feedback">Feedback</a> </li>
                    </ul>
                </div>
            </div>
            <div class="gradient-bottom left">
            </div>
        </div>
    </div>
</body>
</html>
