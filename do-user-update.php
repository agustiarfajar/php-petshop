<?php
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: login.php?error=access");
}
include_once("config/functions.php");

$db = dbConnect();

if(isset($_POST["btnUpdate"])){
  $id = $_SESSION["id"];
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $konfirmasi = $_POST["konfirmasi"];
  $nohp = $_POST["no_hp"];
  $sql2 = "UPDATE users SET nama='$nama', email='$email', password=PASSWORD('$password'), no_hp='$nohp' WHERE id='$id'";
  if (mysqli_query($db, $sql2)) {
      $_SESSION["nama"] = $nama;
      header("Location: pages/profile.php?success=ubah");
  } else {
      echo $db->error;
  }
}
?>