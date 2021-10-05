<?php
session_start();

include ("/var/www/html/online_art_gallery/auth/access/access_art.php");
$con = mysqli_connect($server, $user, $pass, $db);

    if($_REQUEST[act]== "update_product") {
        $R=$_REQUEST;
        $SQL="SELECT * FROM `art` WHERE `product_id` = '$R[product_id]'";
        $rs=mysqli_query($con,$SQL);
        // $data=mysqli_fetch_assoc($rs);


        // Update Art table
        if ($_REQUEST['product_id']) {
            $statement = "UPDATE `art` SET";
            $cond = "WHERE `product_id` = '$R[product_id]'";
            $condQuery = "";
        }

        $SQL= $statement."
                `product_name` = '$R[product_name]', 
                `product_price` = '$R[product_price]',
                `product_description` = '$R[product_description]', 
                `product_stock` = '$R[product_stock] '".$cond;

        $rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
        if (true) {
            header("Location: /online_art_gallery/auth/dashboard/product-details.php?product_id=".$R['product_id']."&msg=SUCCESS");
        }
    }
?>