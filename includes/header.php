<?php
    ini_set("display_errors",0);
	error_reporting(E_ERROR);
	session_start();
	include_once("db_connect.php");
	include_once("functions.php");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Art Gallery</title>
<!-- // Stylesheets // -->
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<link rel="stylesheet" type="text/css" href="./css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="./css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="./css/slider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css">

<!-- // Javascripts // -->
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="./js/validation.js"></script>
<script type="text/javascript" src="./js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="./js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="./js/anythingslider.js"></script>
<script type="text/javascript" src="./js/animatedcollapse.js"></script>
<script type="text/javascript" src="./js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="./js/menu.js"></script>
<script type="text/javascript" src="./js/contentslider.js"></script>
<script type="text/javascript" src="./js/ddaccordion.js"></script>
<script type="text/javascript" src="./js/acrodin.js"></script>
<script type="text/javascript" src="./js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="./js/lightbox.js"></script>
<script type="text/javascript" src="./js/menu-collapsed.js"></script>
<script type="text/javascript" src="./js/cufon-yui.js"></script>
<script type="text/javascript" src="./js/trebuchet_ms_400-trebuchet_ms_700-trebuchet_ms_italic_700-trebuchet_ms_italic_400.font.js"></script>
<script type="text/javascript" src="./js/cufon.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<link href='css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script src="js/jquery.dataTables.min.js"></script>
<meta charset='utf-8' />
</head>

<body>
<div id="wrapper_sec">
	<div id="masthead">
    	<div class="logo">
        	<a href="./index.php" class="logo-custom">Online Art Gallery</a>
        </div>
        <div class="slogan"></div>
        <div class="clear"></div>
            <div class="navigation">
            	<div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                    <li><a href="./index.php">Home</a>
					<li><a href="./about.php">About Project</a></li>
						<!-- session check for signin. -->
						<!--  if($_SESSION['login'] != 1) -->
					<?php if($_SESSION['login'] != 1) {?>
						<li><a href="./product-listing.php">All Arts</a></li>
						<li><a href="./company-listing.php">All Categories</a></li>
						<li><a href="./type-listing.php">All Types</a></li>
						<li><a href="./login.php">Login</a></li>
						<li><a href="./user.php">Register</a></li>
						<li><a href="./contact.php">Contact Us</a></li>
						<li><a href="/online_art_gallery/auth/dashboard/index.php" style="float: left;">Admin</a></li>
						<li>
						<form action="search.php" method="post">
    <input style="hight:30px" type="text" name="search" required>
    <input type="submit" name="submit" value="Search">
    </form>
</li>
					<?php } ?>		

					<!-- session show if user is signed (in database customer role is 2). -->
					<!-- $_SESSION['user_details']['user_level_id'] == 2 -->
					<?php if($_SESSION['user_details']['user_level_id'] == 2) {?>
						<li><a href="./login-home.php">Dashboard</a></li>
						<li><a href="#">Arts Shoping</a>
							<ul>
								<li><a href="./product-listing.php">All Arts</a></li>
								<li><a href="./company-listing.php">All Categories</a></li>
								<li><a href="./type-listing.php">All Types</a></li>
							</ul>
						</li>
						<li><a href="./report-order.php">My Orders</a></li>
						
						<!-- user_details contains the user info. and url is generated with user_id -->
						<!-- example: online_art_gallery/user.php?user_id=2-->
						<li><a href="./user_update.php?user_id=<?=$_SESSION['user_details']['user_id']?>">My Account</a></li>

						<li><a href="./change-password.php">Change Password</a></li>
						<!-- login=0 -->
						<li><a href="./lib/login.php?act=logout">Logout</a></li>
						
						<!-- <li>
							<form action="search.php" method="post">
    							<input style="hight:30px" type="text" name="search" required>
    							<input type="submit" name="submit" value="Search">
    						</form>
						</li> -->
						
					<?php } ?>
                    </ul>
                    <br style="clear: left" />
                    </div>
            </div>
    </div>