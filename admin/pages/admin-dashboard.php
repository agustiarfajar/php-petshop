<?php 
session_id("adminpetshop");
session_start();
if($_SESSION["login"] != true) 
{
    header("Location: ../index.php?error=access");
}
include_once("../config/functions.php");
include_once("../config/layout.php");

$db = dbConnect();
?>
<?php header_section() ?>
<div id="app">
        <!-- SIDEBAR EXTENDED -->
        <?php sidebar() ?>
        
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold"><?php echo $_SESSION["nama"] ?></h5>
                                        <h6 class="text-muted mb-0"><?php echo $_SESSION["email"] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldHeart"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Pets</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?php 
                                                        $sql = "SELECT COUNT(*) as pet FROM pet";
                                                        $res = mysqli_query($db, $sql);
                                                        
                                                        if($res)
                                                        {
                                                            $data = $res->fetch_assoc();
                                                            echo $data['pet'];
                                                        }
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldDocument"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Product</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?php 
                                                        $sql = "SELECT COUNT(*) as product FROM product";
                                                        $res = mysqli_query($db, $sql);
                                                        
                                                        if($res)
                                                        {
                                                            $data = $res->fetch_assoc();
                                                            echo $data['product'];
                                                        }
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldCategory"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Service</h6>
                                                <h6 class="font-extrabold mb-0">2</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldBag"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Pets Order</h6>
                                                <h6 class="font-extrabold mb-0">
                                                <?php 
                                                    $sql = "SELECT COUNT(*) as pet_order FROM pet_order";
                                                    $res = mysqli_query($db, $sql);
                                                    
                                                    if($res)
                                                    {
                                                        $data = $res->fetch_assoc();
                                                        echo $data['pet_order'];
                                                    }
                                                ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBag"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Products Order</h6>
                                                <h6 class="font-extrabold mb-0">
                                                <?php 
                                                    $sql = "SELECT COUNT(*) as product_order FROM product_order";
                                                    $res = mysqli_query($db, $sql);
                                                    
                                                    if($res)
                                                    {
                                                        $data = $res->fetch_assoc();
                                                        echo $data['product_order'];
                                                    }
                                                ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; NAMA</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<?php footer_section() ?>