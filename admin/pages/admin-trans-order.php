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

// pet order
$sql_pet = "SELECT pet_order.*,pet.nama,users.nama as user
             FROM pet_order
             INNER JOIN pet ON pet_order.id_pet = pet.id
             INNER JOIN users ON pet_order.id_user = users.id";
$res_pet = mysqli_query($db, $sql_pet);

// product order
$sql_product = "SELECT product_order.*,product.nama,users.nama as user
             FROM product_order
             INNER JOIN product ON product_order.id_product = product.id
             INNER JOIN users ON product_order.id_user = users.id";
$res_product = mysqli_query($db, $sql_product);
?>
<?php header_section() ?>
    <div id="app">

        <!-- sidebar -->
        <?php sidebar() ?>
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
                            <h3>Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- datatable -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Table Order
                            
                        </div>

                        <!-- table -->
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pets</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Products</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                    <table class="table table-striped mt-4" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Pets Name</th>
                                            <th>Qty</th>
                                            <th>Address</th>
                                            <th>User</th>
                                            <th>Price (Rp)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if($res_pet)
                                            {
                                                $i = 1;
                                                $data_pet = $res_pet->fetch_all(MYSQLI_ASSOC);
                                                foreach($data_pet as $x)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo date('d M Y | H:i', strtotime($x['tgl_order'])) ?></td>
                                                        <td><?php echo $x['nama_lengkap'] ?></td>
                                                        <td><?php echo $x['nama'] ?></td>
                                                        <td>1</td> 
                                                        <td><?php echo $x['alamat'] ?></td>
                                                        <td><?php echo $x['user'] ?></td>
                                                        <td><?php echo number_format($x['total'],0,',','.') ?></td>
                                                        <td><?php echo "<span class='badge bg-primary'>".$x['status']."</span>" ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        ?>   
                                    </tbody>
                                </table>   
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                <table class="table table-striped mt-4" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Products</th>
                                            <th>Qty</th>
                                            <th>Address</th>
                                            <th>User</th>
                                            <th>Price (Rp)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if($res_product)
                                            {
                                                $i = 1;
                                                $data_product = $res_product->fetch_all(MYSQLI_ASSOC);
                                                foreach($data_product as $x)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo date('d M Y | H:i', strtotime($x['tgl_order'])) ?></td>
                                                        <td><?php echo $x['nama_lengkap'] ?></td>
                                                        <td><?php echo $x['nama'] ?></td>
                                                        <td>1</td> 
                                                        <td><?php echo $x['alamat'] ?></td>
                                                        <td><?php echo $x['user'] ?></td>
                                                        <td><?php echo number_format($x['total'],0,',','.') ?></td>
                                                        <td><?php echo "<span class='badge bg-primary'>".$x['status']."</span>" ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        ?>   
                                    </tbody>
                                </table>
                                </div>
                            </div>      
                            
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

<?php footer_section() ?>