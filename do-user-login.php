<?php 
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: login.php?error=access");
}
include_once("config/functions.php");

$db = dbConnect();
if(isset($_POST["btnLogin"]))
{
    // print_r($_POST);
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password=PASSWORD('$pass') AND role='user'";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) === 1)
    {
        session_id("petshop");
        session_start();
        $row = mysqli_fetch_assoc($result);

        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        $_SESSION["nama"] = $row["nama"];
        if(isset($_POST["remember"]))
        {
            // Buat cookie
            setcookie('id', $row['id'], time()+3600);
            setcookie('nama', $row["nama"], time()+3600);
            setcookie('email', $row["email"], time()+3600);
            setcookie('password', $pass, time()+3600);
            setcookie('role', 'user', time() + 3600);
        }   
        header('Location: index.php');    
    } else {
        header('Location: login.php?error=auth');
    }
}
?>