<?php 
function header_section()
{
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
<style>
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../">
            <img src="../assets/images/logo.png" alt="Logo" width="100%" class="d-inline-block align-text-top">
            
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pets.php">Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts.php">Contacts</a>
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php 
                if(!isset($_SESSION["login"]))
                {
                    ?>
                    <li>
                      <a href="../login.php" class="btn btn-outline-primary">Log in</a>
                    </li>
                    <?php
                } else {
                  ?>
                    <li class="nav-item dropdown">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <?php echo $_SESSION["nama"] ?>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" style="right: 0; left: auto;">
                        <li><a class="dropdown-item" href="../pages/profile.php">Profil</a></li>
                        <li><a class="dropdown-item" href="../pages/pembelian.php">Pembelian</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../do-user-logout.php">Logout</a></li>
                      </ul>
                    </div>

                    </li>
                  <?php
                }
              ?>
            </ul>
        </div>
    </div>
</nav>

<?php
}
function banner_section()
{
  ?>
  <!-- BANNER SECTION WITH CAROUSEL -->
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="../assets/images/slide2.jpg" class="d-block w-100" height="600" alt="slide1.jpg">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="../assets/images/slide1.jpg" class="d-block w-100" height="600" alt="slide2.jpg">
    </div>
    <div class="carousel-item">
      <img src="../assets/images/slide3.jpg" class="d-block w-100" height="600" alt="slide3.jpg">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  <?php 
}

function footer_section()
{
    ?>
    <!-- FOOTER SECTION -->
<div class="container">
    <footer class="d-flex justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">© 2022 Petshop, Inc</p>
      <div class="nav justify-content-end">
        <a href="#" class="col-md-12 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="../assets/images/logo.png" alt="logo">
          </a>
      </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>
