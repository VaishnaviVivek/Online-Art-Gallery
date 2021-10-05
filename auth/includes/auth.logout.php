<?php

session_start();
session_unset();
session_destroy();

$_SESSION[login]=0;
$_SESSION['user_details'] = 0;

header("Location: /online_art_gallery/index.php?logout=success");
