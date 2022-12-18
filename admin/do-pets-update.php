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
$nama = $db->escape_string($_POST['nama']);
$id_kategori = $db->escape_string($_POST['id_kategori']);
$harga = $db->escape_string($_POST['harga']);
$deskripsi = $db->escape_string($_POST['deskripsi']);

// Hapus gambar
$query_gambar = "SELECT * FROM pet WHERE id='$id'";
$res_gambar = mysqli_query($db, $query_gambar);
$data = $res_gambar->fetch_assoc();

$imageUrl = '../assets/images/'.$data['foto'];
// echo $imageUrl;
if(file_exists($imageUrl))
{
    unlink($imageUrl);

    // SETUP STORE IMAGE INTO DATABASE
    $target_dir = "../assets/images/";
    $image_name = basename($_FILES['foto']['name']);
    $image_name = time()."_".$image_name;
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file))
    {
        echo "The file ".basename($_FILES['foto']['name']). " has been upladed.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image = $image_name; // used to store the filename in a variable
    
    // storind the data in your database
    if($_FILES['foto']['name'] != null || $_FILES['foto']['name'] != "")
    {
        $sql= "UPDATE pet SET nama='$nama', id_kategori='$id_kategori', harga='$harga', deskripsi='$deskripsi', foto='$image' WHERE id='$id'";
    } else {
        $sql= "UPDATE pet SET nama='$nama', id_kategori='$id_kategori', harga='$harga', deskripsi='$deskripsi' WHERE id='$id'";
    }

    $res = mysqli_query($db, $sql);
    if($res)
    {
        header("Location: pages/admin-pets.php?success=update");
    } else {
        echo $db->error;
    }
} else {
    // SETUP STORE IMAGE INTO DATABASE
    $target_dir = "../assets/images/";
    $image_name = basename($_FILES['foto']['name']);
    $image_name = time()."_".$image_name;
    $target_file = $target_dir . $image_name;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file))
    {
        echo "The file ".basename($_FILES['foto']['name']). " has been upladed.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=$image_name; // used to store the filename in a variable
    
    // storind the data in your database
    if($_FILES['foto']['name'] != null || $_FILES['foto']['name'] != "")
    {
        $sql= "UPDATE pet SET nama='$nama', id_kategori='$id_kategori', harga='$harga', deskripsi='$deskripsi', foto='$image' WHERE id='$id'";
    } else {
        $sql= "UPDATE pet SET nama='$nama', id_kategori='$id_kategori', harga='$harga', deskripsi='$deskripsi' WHERE id='$id'";
    }

    $res = mysqli_query($db, $sql);
    if($res)
    {
        header("Location: pages/admin-pets.php?success=update");
    } else {
        echo $db->error;
    }
}
?>