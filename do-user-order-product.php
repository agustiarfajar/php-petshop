<?php 
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: login.php?error=access");
}
include_once("config/functions.php");

$db = dbConnect();
if(isset($_POST["btnPesan"]))
{
    $id_product = $db->escape_string($_POST["id_product"]);
    $id_user = $_SESSION["id"];
    $nama_lengkap = $db->escape_string($_POST["nama_lengkap"]);
    $alamat = $db->escape_string($_POST["alamat"]);
    $total = $db->escape_string($_POST["total"]);
    $status = "Ordered";
    $tgl_order = date('Y-m-d H:i:s');

    $sql = "INSERT INTO product_order(id_product, nama_lengkap, alamat, total, status, tgl_order, id_user) 
    VALUES('$id_product', '$nama_lengkap', '$alamat', '$total', '$status', '$tgl_order', '$id_user')";
    $res = mysqli_query($db, $sql);
    if($res)
    {
        header("Location: pages/product-checkout-success.php");
    }
} else {
    echo "error";
}
?>