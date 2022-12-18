<?php 
include_once("config/functions.php");

$db = dbConnect();
if(isset($_POST["btnRegister"]))
{
    // print_r($_POST);
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPass = $_POST["confirm_password"];

    // CEK EMAIL YANG SUDAH ADA
    $sql_email = "SELECT * FROM users WHERE email = '$email'";
    $res_email = mysqli_query($db, $sql_email);
    if($res_email->num_rows > 0)
    {
        header("Location: signup.php?error=email");
    } else {
        // KONFIRMASI PASSWORD
        if($confirmPass == $password)
        {
            $sql = "INSERT INTO users(nama, email, password, role) VALUES('$nama', '$email', PASSWORD('$password'), 'user')";
            $res = mysqli_query($db, $sql);
            if($res)
            {
                header("Location: signup.php?success=daftar");
            } else {
                echo $db->error;
            }
        } else {
            header("Location: signup.php?error=password");
        }
    }
}
?>