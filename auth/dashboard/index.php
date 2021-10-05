<?php
    // Restrict URl ACCESS
    session_start();
    if(!isset($_SESSION['auth_name'])) {
        header("Location: /online_art_gallery/auth/index.php?AcessDenied!");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="/online_art_gallery/auth/dashboard/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Art Gallery</title>
    <title>Dashboard</title>
  </head>
  <body>
    <div class="navbar">
        <a class="active" href="/online_art_gallery/auth/dashboard/index.php"><i class="fa fa-fw fa-home"></i> Online Art Gallery</a> 
        <a href="/online_art_gallery/auth/includes/auth.logout.php" class="login-name" style="float: right;"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
        <a href="#" style="float: right";><i class="fa fa-fw fa-user"></i> <?php echo strtoupper($_SESSION['auth_name']);?></a>
    </div>


<div>
    <h4 class="heading colr">All Avialbale Arts</h4>

    <div class="static">
    <!-- type_id ?? -->
    <?php

        include ("/var/www/html/online_art_gallery/auth/access/access_art.php");

        $con = mysqli_connect($server, $user, $pass, $db);
        unset($server, $user, $pass, $db);
        $SQL="SELECT * FROM `art`, `Artists`, `type` WHERE product_type_id = type_id AND product_company_id = company_id";
        $rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
    ?>
    <?php 
        // whats sr_no=1?
                    $sr_no=1;
                    while($data = mysqli_fetch_assoc($rs))
                    {
                    ?>

        <!-- Generating Gallery view for art -->
                    <div style="float:left; border:1px solid; margin:8px; padding:8px">
        <!-- a tag creates the url for product after clicking the art from home page  -done-->
        <!-- Check product-details.php -notdone //// -->
                        <a href="/online_art_gallery/auth/dashboard/product-details.php?product_id=<?php echo $data[product_id] ?>">
            <!-- Load image of the icon -->
            <img src="<?=$SERVER_PATH.'/online_art_gallery/uploads/'.$data[product_image]?>" style="height:180px; width:150px"></a><br>
                        
            <!-- Name of the image -->
            <div style="text-align:center; border-top:2px solid; padding: 5px 0px; font-weight:bold; font-size:14px;">
            <?=$data[product_name]?>
            </div></div>
        <?php } ?></div>
        <div class="clear"></div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>