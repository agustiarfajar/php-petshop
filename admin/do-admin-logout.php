<?php 
session_id("adminpetshop");
session_start();
$_SESSION=[];
session_unset();
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('nama', '', time() - 3600);
setcookie('email', '', time() - 3600);
setcookie('password', '', time() - 3600);
setcookie('role', '', time() - 3600);

header('location: index.php');
?>