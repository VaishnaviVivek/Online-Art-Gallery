<?php
    // Restrict URl ACCESS
    session_start();
    if(!isset($_SESSION['auth_name'])) {
        header("Location: /online_art_gallery/auth/index.php?AcessDenied!");
    }
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/online_art_gallery/auth/dashboard/css/style.css">
<div class="navbar">
	<a class="active" href="/online_art_gallery/auth/dashboard/index.php"><i class="fa fa-fw fa-home"></i> Online Art Gallery</a>
	<a href="/online_art_gallery/auth/includes/auth.logout.php" class="login-name" style="float: right;"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
	<a href="#" style="float: right";><i class="fa fa-fw fa-user"></i> <?php echo strtoupper($_SESSION['auth_name']);?></a>
</div>

<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/style.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/slider.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/jquery-ui.css">

<!-- // Javascripts // -->
<script type="text/javascript" src="/online_art_gallery/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/validation.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/anythingslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/animatedcollapse.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/menu.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/contentslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/ddaccordion.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/acrodin.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/lightbox.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/menu-collapsed.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/cufon-yui.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/trebuchet_ms_400-trebuchet_ms_700-trebuchet_ms_italic_700-trebuchet_ms_italic_400.font.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/cufon.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.validate.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery-ui.js"></script>
<link href='/online_art_gallery/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script src="/online_art_gallery/js/jquery.dataTables.min.js"></script>
<div>
    <br>
</div>

