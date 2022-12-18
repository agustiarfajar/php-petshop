<?php 
include_once("config/functions.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Petshop</title>
</head>
<body class="bg-light"> 
<div class="container mt-5">
    <div class="w-50 m-auto mb-3">
      <?php 
           // NOTIF ERROR
           if(isset($_GET["error"]))
           {
               $error = $_GET["error"];
               if($error == "auth")
               {
                 showError("Email/Password Salah!");
               }

               if($error == "access")
               {
                 showError("Akses dilarang! Login terlebih dahulu.");
               }
           }
      ?>
    </div>
    <div class="banner text-center">
        <img src="assets/images/logo.png" alt="">
    </div>
    <div>
        <form action="do-user-login.php" method="POST">
            <h1 class="h3 mb-3 fw-normal text-center">Please Log in</h1>
            <?php 
            if(isset($_COOKIE['role']))
            {
              if($_COOKIE['role'] == 'user')
              {
                 ?>
                  <div class="form-floating w-50 m-auto">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php if(isset($_COOKIE["email"])){echo $_COOKIE["email"];} ?>" required>
                    <label for="email">Email</label>
                  </div>
                  <div class="form-floating w-50 m-auto">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["password"])){echo $_COOKIE["password"];} ?>" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                  <div class="w-50 m-auto mt-2" style="margin-left:8px">
                    <input type="checkbox" class="form-check-input" <?php if(isset($_COOKIE["email"])){echo "checked";}?> name="remember">
                    <label for="">Remember Me</label>
                  </div>
                 <?php
              } else {
                ?>
                <div class="form-floating w-50 m-auto">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Email</label>
                  </div>
                  <div class="form-floating w-50 m-auto">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                  <div class="w-50 m-auto mt-2" style="margin-left:8px">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <label for="">Remember Me</label>
                  </div>
                <?php
              }
            } else {
              ?>
                <div class="form-floating w-50 m-auto">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Email</label>
                  </div>
                  <div class="form-floating w-50 m-auto">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                  <div class="w-50 m-auto mt-2" style="margin-left:8px">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <label for="">Remember Me</label>
                  </div>
                <?php
            }
            ?>
            <center>
              <button type="submit" name="btnLogin" class="w-50 mt-4 btn btn-lg btn-primary text-center">Log in</button>
            </center>
            <p class="mt-3 text-center">
              Belum memiliki akun? Silahkan <a href="signup.php">Daftar</a>
            </p>
            <center>
              <a href="admin/index.php" class="w-50 btn btn-lg btn-outline-primary">Log in as administrator</a>
            </center>
            
          </form>
          
          <p class="mt-5 mb-3 text-muted text-center">© 2022</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
        $('.toast').toast('show');
    })
</script>
</body>
</html>