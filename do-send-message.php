<?php 
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: login.php?error=access");
}
include_once("config/functions.php");

$db = dbConnect();
if(isset($_POST["btnSend"]))
{
    $full_name = $db->escape_string($_POST["full_name"]);
    $email = $db->escape_string($_POST["email"]);
    $phone = $db->escape_string($_POST["phone"]);
    $subject = $db->escape_string($_POST["subject"]);
    $message = $db->escape_string($_POST["message"]);
    $tgl = date('Y-m-d H:i:s');

    $sql = "INSERT INTO message 
    VALUES('?', '$full_name', '$email', '$phone', '$subject', '$message', '$tgl')";
    $res = mysqli_query($db, $sql);
    if($res)
    {
        header("Location: pages/contacts.php?success=sent");
    } else {
        echo $db->error;
    }
} 
?>