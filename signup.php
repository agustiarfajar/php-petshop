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
    <div class="w-50 m-auto">
      <?php 
          // NOTIF SUKSES
          if(isset($_GET["success"]))
          {
              $success = $_GET["success"];
              if($success == "daftar")
              {
                showSuccess("Akun berhasil ditambahkan!");
              }
          }

          // NOTIF ERROR
          if(isset($_GET["error"]))
          {
              $error = $_GET["error"];
              if($error == "email")
              {
                showError("Email telah digunakan! Gunakan email lain.");
              }

              if($error == "password")
              {
                showError("Password tidak sama!");
              }
          }
        ?>
    </div>
    <div class="text-center">
        <div class="banner">
            <img src="assets/images/logo.png" alt="">
        </div>
        <div>
            <form action="do-user-register.php" method="post">             
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <div class="form-floating w-50 m-auto">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                  <label for="nama">Nama</label>
                </div>
                <div class="form-floating w-50 m-auto">
                  <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                  <label for="email">Email address</label>
                </div>
                <div class="form-floating w-50 m-auto">
                  <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating w-50 m-auto">
                  <input type="password" class="form-control" id="floatingPasswordConfirm" name="confirm_password" placeholder="Password" required>
                  <label for="floatingPasswordConfirm">Confirm Password</label>
                </div>
                <button type="submit" name="btnRegister" class="w-50 mt-4 btn btn-lg btn-primary">Register</button>
              </form>
              <p>
                Sudah memiliki akun? Silahkan <a href="login.php">Login</a>
              </p>
              <p class="mt-5 mb-3 text-muted">©2022 - Petshop</p>
        </div>
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