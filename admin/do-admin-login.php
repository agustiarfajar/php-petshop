<?php 
include_once("config/functions.php");

$db = dbConnect();
if(isset($_POST["btnLogin"]))
{
    // print_r($_POST);
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password=PASSWORD('$pass') AND role='admin'";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) === 1)
    { 
        session_id("adminpetshop");
        session_start();
        
        $row = mysqli_fetch_assoc($result);

        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        $_SESSION["nama"] = $row["nama"];
        $_SESSION["email"] = $row["email"];
        if(isset($_POST["remember"]))
        {
            // Buat cookie
            setcookie('id', $row['id'], time()+3600);
            setcookie('nama', $row["nama"], time()+3600);
            setcookie('email', $row["email"], time()+3600);
            setcookie('password', $pass, time()+3600);
            setcookie('role', 'admin', time() + 3600);
        }   
        header('Location: pages/admin-dashboard.php');    
    } else {
        header('Location: index.php?error=auth');
    }
}
?>