<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">

        <!-- sidebar -->
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="admin-dashboard.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset="" style="width:200px;height:40px"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <!-- Menu Dashboard -->
                        <li class="sidebar-item">
                            <a href="admin-dashboard.html" class='sidebar-link'>
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
                                    <a href="admin-pets-category.html">Category</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="admin-pets.html">Pet</a>
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
                                    <a href="admin-products-category.html">Category</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="admin-products.html">Product</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Menu Products -->

                        <!-- Menu Services -->
                        <li class="sidebar-item active">
                            <a href="admin-services.html" class='sidebar-link'>
                                <i class="bi bi-card-checklist"></i>
                                <span>Services</span>
                            </a>
                        </li>
                        <!-- End Menu Services -->

                        <li class="sidebar-item ">Transaction</li>

                        <!-- Menu Services -->
                        <li class="sidebar-item">
                            <a href="admin-trans-services.html" class='sidebar-link'>
                                <i class="bi bi-card-checklist"></i>
                                <span>Services</span>
                            </a>
                        </li>
                        <!-- End Menu Services -->

                        <!-- Menu Order -->
                        <li class="sidebar-item">
                            <a href="admin-trans-order.html" class='sidebar-link'>
                                <i class="bi bi-cart-fill"></i>
                                <span>Order</span>
                            </a>
                        </li>
                        <!-- End Menu Order -->

                        <li class="sidebar-item ">Logout</li>

                        <!-- Menu Logout -->
                        <li class="sidebar-item">
                            <a href="../index.html" class='sidebar-link'>
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
        <!-- end sidebar -->

        <!-- body -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                            <h3>Services</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- datatable -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Table Services
                            <div class="me-1 mb-1 d-inline-block float-end">

                                <!-- button add -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#defaultSize">
                                    <i class="bi bi-plus-square"></i>&nbsp;
                                    <span>ADD</span>
                                </button>
                                <!-- end button add -->

                                <!-- form add -->
                                <div class="modal fade text-left" id="defaultSize" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel18">Add Service</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div>
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control mb-2" placeholder="Enter name">
                                                                <label>Price</label>
                                                                <input type="text" class="form-control" placeholder="Enter price">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-primary ml-1"
                                                    data-bs-dismiss="modal" id="success">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Submit</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end form add -->
                            </div>
                        </div>

                        <!-- table -->
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Price (Rp)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Cat Brooming</td>
                                        <td>120.000</td>
                                        <!-- kolom action -->
                                        <td>
                                            <!-- EDIT -->
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info">
                                                Edit
                                            </button>
                                            <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title white" id="myModalLabel120">
                                                                Edit
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control mb-2" placeholder="Enter name" value="Cat Grooming">
                                                                <label>Price</label>
                                                                <input type="text" class="form-control" placeholder="Enter price" value="120.000">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Cancel</span>
                                                            </button>
                                                            <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Save</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            &emsp;
                                            <!-- END EDIT -->
                                            <!-- DELETE -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger">
                                                Delete
                                            </button>
                                            <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title white" id="myModalLabel120">
                                                                Delete
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this item?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Cancel</span>
                                                            </button>
                                                            <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Yes</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END DELETE -->
                                        </td>
                                        <!-- end kolom action -->
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Dog Grooming</td>
                                        <td>500.000</td>
                                        <!-- kolom action -->
                                        <td>
                                            <!-- EDIT -->
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info">
                                                Edit
                                            </button>
                                            <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title white" id="myModalLabel120">
                                                                Edit
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control mb-2" placeholder="Enter name" value="Dog Grooming">
                                                                <label>Price</label>
                                                                <input type="text" class="form-control" placeholder="Enter price" value="500.000">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Cancel</span>
                                                            </button>
                                                            <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Save</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            &emsp;
                                            <!-- END EDIT -->
                                            <!-- DELETE -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger">
                                                Delete
                                            </button>
                                            <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title white" id="myModalLabel120">
                                                                Delete
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this item?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Cancel</span>
                                                            </button>
                                                            <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Yes</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END DELETE -->
                                        </td>
                                        <!-- end kolom action -->
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- end table -->
                    </div>
                </section>
                <!-- end datatable -->
            </div>

            <!-- footer -->
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; NAMA</p>
                    </div>
                </div>
            </footer>
            <!-- end footer -->

        </div>
        <!-- end body -->

    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>