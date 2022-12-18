<?php
session_id("adminpetshop");
session_start();
if($_SESSION["login"] != true) 
{
    header("Location: ../index.php?error=access");
}
include_once('config/functions.php');
$db = dbConnect();

// print_r($_POST);
$id = $db->escape_string($_POST['id']);
$nama = $db->escape_string($_POST["nama"]);
$sql = "UPDATE product_category SET nama='$nama' WHERE id='$id'";
$res = mysqli_query($db, $sql);
if($res)
{
    header("Location: pages/admin-products-category.php?success=update");
} else {
    echo $db->error;
}
?>