<?php 
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: login.php?error=access");
}
include_once("config/functions.php");

$_SESSION=[];
session_unset();
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('nama', '', time() - 3600);
setcookie('email', '', time() - 3600);
setcookie('password', '', time() - 3600);
setcookie('role', '', time() - 3600);

header('location: login.php');
?>