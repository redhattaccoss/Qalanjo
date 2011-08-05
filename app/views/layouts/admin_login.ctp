<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Admin Control Panel</title>
    
    <?php echo $html->css("globals/core")?>
		<?php echo $html->css("blueprint/screen")?>
		<?php echo $html->css(array("blueprint/print"), "stylesheet", array("media"=>"print"))?>
		<!--[if IE]><?php echo $html->css("blueprint/ie")?><![endif]-->
		<?php echo $html->css(array("redmond/jquery.ui.all", "admin/container-style", "admin/adminlogin"))?>
    <?php echo $javascript->link(array("jquery", "js/jquery-animate-clip", "js/jquery.easing.1.3", "ui/jquery-ui-1.8.10.custom",'validate/jquery.validate.min', "ui/autocomplete.html", "js/jquery.form", "blue/members/session_checker"))?>
</head>
<body>
    <div class="header-bg">
    </div>
    <div class="container">
        <div class="header left">
            <div class="logo left">
            </div>
            <div class="user right">
                <h1>
                    <span class="admin-highlight">Admin</span> Control Panel</h1>
            </div>
        </div>
    </div>
    <div class="homebox">
       <?php echo $content_for_layout;?>
    </div>
</body>
</html>