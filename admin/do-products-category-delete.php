<?php
session_id("adminpetshop");
session_start();
if($_SESSION["login"] != true) 
{
    header("Location: ../index.php?error=access");
}
include_once('config/functions.php');
$db = dbConnect();
$id = $_GET['id'];

$sql = "DELETE FROM product_category WHERE id = $id";

if (mysqli_query($db, $sql)) {
  header("location: pages/admin-products-category.php?success=hapus");
} else {
  echo $db->error;
}
