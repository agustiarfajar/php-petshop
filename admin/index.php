<?php 
session_id("adminpetshop");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pages/assets/css/bootstrap.css">
    <link rel="stylesheet" href="pages/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="pages/assets/css/app.css">
    <link rel="stylesheet" href="pages/assets/css/auth.css">
    <link rel="stylesheet" href="pages/assets/vendors/toastify/toastify.css">
</head>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                
                <!-- DIV FORM -->
                <div id="auth-left">
                    <div class="">
                        <a href="#"><img src="pages/assets/images/logo/logo.png" alt="Logo" class="h-100" style="width:250px"></a>
                    </div>
                    <h1 class="auth-title mt-5 text-center" style="font-size:x-large">LOGIN ADMINISTRATOR</h1>
                    
                    <!-- form login -->
                    <form action="do-admin-login.php" method="post">
                        
                            <?php 
                                if(isset($_COOKIE['role']))
                                {
                                    if($_COOKIE['role'] == 'admin') {
                                        ?>
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="email" class="form-control form-control-xl" name="email" value="<?php if(isset($_COOKIE["email"])){echo $_COOKIE["email"];} ?>" placeholder="Email" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-xl" name="password" value="<?php if(isset($_COOKIE["password"])){echo $_COOKIE["password"];} ?>" placeholder="Password" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-lock"></i>
                                            </div>
                                        </div>
                                        <div class="form-check mb-3">
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox1" class="form-check-input" name="remember" <?php if(isset($_COOKIE["email"])){echo "checked";} ?>>
                                                <label for="checkbox1">Remember Me</label>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="email" class="form-control form-control-xl" name="email" placeholder="Email" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-lock"></i>
                                            </div>
                                        </div>
                                        <div class="form-check mb-3">
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox1" class="form-check-input" name="remember">
                                                <label for="checkbox1">Remember Me</label>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                   <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="email" class="form-control form-control-xl" name="email" placeholder="Email" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-lock"></i>
                                            </div>
                                        </div>
                                        <div class="form-check mb-3">
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox1" class="form-check-input" name="remember">
                                                <label for="checkbox1">Remember Me</label>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                            
                        <button type="submit" name="btnLogin" class="btn btn-primary btn-block btn-lg mb-3">Log in</button>
                        <p>
                            Belum memiliki akun? Silahkan <a href="admin-signup.php">daftar</a>
                        </p>
                    </form>

                </div>
            </div>

            <!-- DIV ADDITIONAL LAYOUT -->
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    
                </div>
            </div>

        </div>
    </div>
</body>
<script src="pages/assets/js/bootstrap.bundle.min.js"></script>
<script src="pages/assets/vendors/toastify/toastify.js"></script>
<!-- <script src="pages/assets/js/extensions/toastify.js"></script> -->
<script src="pages/assets/js/main.js"></script>
<?php 

if(isset($_GET["error"]))
{
    $error = $_GET["error"];
    if($error == "auth")
    {
        ?>
        <script>
        Toastify({
                text: "Email/Password Salah!",
                duration: 3000,
                close:true,
                backgroundColor: "#ed2d2d",
            }).showToast();
        </script>
        <?php
    }

    if($error == "access")
    {
        ?>
        <script>
        Toastify({
                text: "Akses dilarang! Silahkan login terlebih dahulu.",
                duration: 3000,
                close:true,
                backgroundColor: "#ed2d2d",
            }).showToast();
        </script>
        <?php
    }
}
?>
</html>