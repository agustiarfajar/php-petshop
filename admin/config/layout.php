<?php 
include_once('functions.php');
?>
<?php 
function header_section()
{
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Petshop</title>
        <!-- JQUERY -->
        <script src="../pages/assets/vendors/jquery/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../pages/assets/css/bootstrap.css">
        <link rel="stylesheet" href="../pages/assets/vendors/sweetalert2/sweetalert2.min.css"> 
        <link rel="stylesheet" href="../pages/assets/vendors/iconly/bold.css">        
        <link rel="stylesheet" href="../pages/assets/vendors/simple-datatables/style.css"> <!-- DATA TABLES --> 
        <link rel="stylesheet" href="../pages/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="../pages/assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="../pages/assets/css/app.css">
        <link rel="stylesheet" href="../pages/assets/vendors/toastify/toastify.css">
    </head>
<body>
    <?php
}

function sidebar()
{
    ?>
    <!-- side bar -->
    <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="../pages/admin-dashboard.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset="" style="width:200px;height:40px"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <!-- Menu Dashboard -->
                        <li class="sidebar-item active ">
                            <a href="../pages/admin-dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- End Menu Dashboard -->

                        <li class="sidebar-item ">Master</li>

                        <!-- Menu Pets -->
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-egg-fried"></i>
                                <span>Pets</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="../pages/admin-pets-category.php">Category</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="../pages/admin-pets.php">Pet</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Menu Pets -->

                        <!-- Menu Products -->
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-archive-fill"></i>
                                <span>Products</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="../pages/admin-products-category.php">Category</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="../pages/admin-products.php">Product</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Menu Products -->

                        <!-- Menu Services -->
                        <!-- <li class="sidebar-item">
                            <a href="../pages/admin-services.php" class='sidebar-link'>
                                <i class="bi bi-card-checklist"></i>
                                <span>Services</span>
                            </a>
                        </li> -->
                        <!-- End Menu Services -->

                        <li class="sidebar-item ">Transaction</li>

                        <!-- Menu Services -->
                        <!-- <li class="sidebar-item">
                            <a href="../pages/admin-trans-services.php" class='sidebar-link'>
                                <i class="bi bi-card-checklist"></i>
                                <span>Services</span>
                            </a>
                        </li> -->
                        <!-- End Menu Services -->

                        <!-- Menu Order -->
                        <li class="sidebar-item">
                            <a href="../pages/admin-trans-order.php" class='sidebar-link'>
                                <i class="bi bi-cart-fill"></i>
                                <span>Order</span>
                            </a>
                        </li>
                        <!-- End Menu Order -->

                        <li class="sidebar-item ">Logout</li>

                        <!-- Menu Logout -->
                        <li class="sidebar-item">
                            <a href="../do-admin-logout.php" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                        <!-- End Menu Logout -->
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
    <?php 
}

function footer_section()
{
    ?>
    <script src="../pages/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="../pages/assets/js/bootstrap.bundle.min.js"></script>
        <script src="../pages/assets/vendors/simple-datatables/simple-datatables.js"></script>
        <!-- <script src="../pages/assets/vendors/apexcharts/apexcharts.js"></script> -->
        <!-- <script src="../pages/assets/js/pages/dashboard.js"></script> -->
        <!-- <script src="../pages/assets/js/extensions/sweetalert2.js"></script> -->
        <script src="../pages/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="../pages/assets/js/main.js"></script>  
        <script src="../pages/assets/vendors/toastify/toastify.js"></script>
        
    </body>

    </html>
    <?php
}
?>