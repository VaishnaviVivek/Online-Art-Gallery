<?php
global $con;
include ("/var/www/html/online_art_gallery/auth/access/access_art.php");
// $con = mysqli_connect("", "root", "", "online_art_gallery");
$con = mysqli_connect($server, $user, $pass, $db);
        // unset($server, $user, $pass, $db);

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else {
    echo "Connected to ".$server;
}
?>
