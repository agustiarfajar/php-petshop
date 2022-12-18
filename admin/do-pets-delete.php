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

// Hapus gambar
$query_gambar = "SELECT * FROM pet WHERE id='$id'";
$res_gambar = mysqli_query($db, $query_gambar);
$data = $res_gambar->fetch_assoc();

$imageUrl = '../assets/images/'.$data['foto'];

if(file_exists($imageUrl))
{
    // delete image
    unlink($imageUrl);

    $sql = "DELETE FROM pet WHERE id = $id";

    if (mysqli_query($db, $sql)) {
      header("location: pages/admin-pets.php?success=hapus");
    } else {
      echo $db->error;
    }
} else {
  $sql = "DELETE FROM pet WHERE id = $id";

    if (mysqli_query($db, $sql)) {
      header("location: pages/admin-pets.php?success=hapus");
    } else {
      echo $db->error;
    }
}

