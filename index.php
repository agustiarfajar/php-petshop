<?php
session_id("petshop");
session_start();
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
<style>
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo.png" alt="Logo" width="100%" class="d-inline-block align-text-top">
            
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/pets.php">Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/contacts.php">Contacts</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php 
                if(!isset($_SESSION["login"]))
                {
                    ?>
                    <li>
                      <a href="login.php" class="btn btn-outline-primary">Log in</a>
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
                        <li><a class="dropdown-item" href="pages/profile.php">Profil</a></li>
                        <li><a class="dropdown-item" href="pages/pembelian.php">Pembelian</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="do-user-logout.php">Logout</a></li>
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
<!-- BANNER SECTION WITH CAROUSEL -->
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="assets/images/slide1.jpg" class="d-block w-100" height="600" alt="slide1.jpg">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="assets/images/slide2.jpg" class="d-block w-100" height="600" alt="slide2.jpg">
    </div>
    <div class="carousel-item">
      <img src="assets/images/slide3.jpg" class="d-block w-100" height="600" alt="slide3.jpg">
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
<div style="padding-top:100px;padding-bottom:100px">
    <div class="container">
        <div class="">
            <center>
                <h2>NEW ARRIVAL</h2>
                <span class="text-muted">New Pets Now Available!</span>
            </center>
        </div>
    </div>
</div>

<!-- CARD GROUP SECTION -->
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col">
            <div class="card-group" style="padding-top:100px;padding-bottom:100px">
                <!-- CARD -->
                <div class="card">
                  <img src="assets/images/cat1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">ORANGE TABBY CAT</h5>
                    <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, quibusdam. Sunt nemo ducimus nulla! Exercitationem dolores praesentium assumenda placeat quasi voluptas perferendis, suscipit id laudantium repellat libero, tempora nihil. Dolores!</p>
                  </div>
                  <div class="card-footer text-center">
                    <small class="text-muted">$299</small>
                  </div>
                </div>
                <!-- CARD -->
                <div class="card">
                  <img src="assets/images/dog1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">BROWN LABRADOR DOG</h5>
                    <p class="card-text text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, consectetur a. Eius blanditiis perferendis nihil quisquam sed sequi dolore debitis, fugit nesciunt libero unde voluptas laborum sapiente, pariatur atque voluptatem?</p>
                  </div>
                  <div class="card-footer text-center">
                    <small class="text-muted">$299</small>
                  </div>
                </div>
                <!-- CARD -->
                <div class="card">
                  <img src="assets/images/rabbit1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">STRIPE RABBIT</h5>
                    <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab hic molestiae nesciunt, maiores praesentium eveniet, ipsum corrupti sed quam laborum debitis cupiditate veniam quis temporibus neque magni consequatur dolores nobis.</p>
                  </div>
                  <div class="card-footer text-center">
                    <small class="text-muted">$299</small>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- PET PRODUCTS SECTION -->
<div style="padding-top:100px;padding-bottom:100px">
    <div class="container">
        <div class="">
            <center>
                <h2>POPULAR PET PRODUCTS</h2>
                <span class="text-muted">Best Seller Products At Our Shop!</span>
            </center>
        </div>
    </div>
</div>
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5">
        <div class="col">
            <!-- CARD SECTION -->
          <div class="card shadow-sm">
            <img src="assets/images/food1.jpg" alt="food1">

            <div class="card-body">
                <h5 class="card-title text-center">DIVINUS</h5>
              <p class="card-text text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                </div>
                <small class="text-muted"><b>$299</b></small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
            <!-- CARD SECTION -->
          <div class="card shadow-sm">
            <img src="assets/images/food2.jpg" alt="food2">

            <div class="card-body">
              <h5 class="card-title text-center">WHISKAS</h5>
              <p class="card-text text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                </div>
                <small class="text-muted"><b>$299</b></small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
            <!-- CARD SECTION -->
          <div class="card shadow-sm">
            <img src="assets/images/product1.jpg" alt="product1">

            <div class="card-body">
                <h5 class="card-title text-center">CAT CAGE</h5>
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                </div>
                <small class="text-muted"><b>$299</b></small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
            <!-- CARD SECTION -->
            <div class="card shadow-sm">
                <img src="assets/images/product2.jpg" alt="product1">
                <div class="card-body">
                <h5 class="card-title text-center">DOG CAGE</h5>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                    <small class="text-muted"><b>$299</b></small>
                </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<!-- SERVICES SECTION -->
<div style="padding-top:100px;padding-bottom:100px">
    <div class="container">
        <div class="">
            <center>
                <h2>SERVICES</h2>
                <span class="text-muted">Best of Our Services!</span>
            </center>
        </div>
    </div>
</div>

<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5">
        <div class="col">

        <!-- CARD SECTION -->
          <div class="card shadow-sm">
            <img src="assets/images/services1.jpg" alt="services1">

            <div class="card-body">
                <h5 class="card-title text-center">BATHING</h5>
              <p class="card-text text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              
            </div>
          </div>
        </div>
        <div class="col">
            <!-- CARD SECTION -->
          <div class="card shadow-sm">
            <img src="assets/images/services2.jpg" alt="services2">

            <div class="card-body">
              <h5 class="card-title text-center">DOG GROOMING</h5>
              <p class="card-text text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              
            </div>
          </div>
        </div>
        <div class="col">
            <!-- CARD SECTION -->
          <div class="card shadow-sm">
            <img src="assets/images/services3.jpg" alt="services3">

            <div class="card-body">
                <h5 class="card-title text-center">ADD-ON</h5>
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              
            </div>
          </div>
        </div>
        <div class="col">
            <!-- CARD SECTION -->
            <div class="card shadow-sm">
                <img src="assets/images/services4.jpg" alt="services4">

                <div class="card-body">
                    <h5 class="card-title text-center">CAT</h5>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="container px-4 py-5">
    <h2 class="pb-2 border-bottom">Love Your Pets</h2>

    <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
      <div class="d-flex flex-column align-items-start gap-2">
        <img src="assets/images/cat1.jpg" alt="">
      </div>
      <div class="row row-cols-1 row-cols-sm-1 g-4">
        <div class="d-flex flex-column gap-2">
          <h4 class="fw-semibold mb-0">CARING PETS GIVES HAPPY & FUN</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos soluta aut delectus fugit illo nulla magni asperiores veritatis vero corrupti ab amet officiis, reprehenderit at nemo, praesentium totam odio aliquam.</p>
        </div>
      </div>
    </div>
</div>

<!-- ABOUT SECTION -->
<div style="padding-top:100px;padding-bottom:100px">
    <div class="container">
        <div class="">
            <center>
                <h2>ABOUT PETSHOP</h2>
                <span class="text-muted">We deserve products for your pets.!</span>
                <!-- YOUTUBE VIDEO SECTIOn -->
                <div class="p-3">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/rl0czzipZhk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <!-- LIST GROUP SECTION -->
                <div class="d-flex" style="padding-top:30">
                    <ul class="list-group list-group-horizontal list-inline mx-auto justify-content-center">
                        <li class="list-group-item"><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-group-item"><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li class="list-group-item"><a href="#"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                  </div>
            </center>
        </div>
    </div>
</div>
<!-- FOOTER SECTION -->
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">© 2022 Petshop, Inc</p>
      <div class="nav justify-content-end">
        <a href="#" class="col-md-12 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="assets/images/logo.png" alt="logo">
          </a>
      </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>