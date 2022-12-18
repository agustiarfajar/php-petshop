<?php 
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: ../login.php?error=access");
}
include_once("../config/functions.php");
include_once("../config/layout.php");

$id_user = $_SESSION["id"];

$db = dbConnect();
// Query Order
$sql_pet = "SELECT pet_order.id_user, pet_order.alamat, pet_order.tgl_order, pet_order.total, pet_order.status,
                   pet.nama, pet.foto
            FROM pet_order
            JOIN pet ON pet_order.id_pet = pet.id
            WHERE pet_order.id_user = $id_user";
$res_pet = mysqli_query($db, $sql_pet);

// PRODUCT ORDER
$sql_product = "SELECT product_order.id_user, product_order.alamat, product_order.tgl_order, product_order.total, product_order.status,
                   product.nama, product.foto
            FROM product_order
            JOIN product ON product_order.id_product = product.id
            WHERE product_order.id_user = $id_user";
$res_product = mysqli_query($db, $sql_product);
?>
<?php header_section() ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-left align-items-center">
                        <img src="../assets/images/1.jpg" class="rounded-circle" width="75" height="75" alt="">
                        <b class="text-muted p-3"><?php echo $_SESSION["nama"] ?></b>
                    </div>
                    <hr>
                    <ul class="list-group list-group-flush just">
                        <li class="list-group-item"><a href="profile.php" class="text-secondary text-decoration-none"><i class="bi bi-pencil-square"></i> Pengaturan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5>Daftar Transaksi Pembelian</h5>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pets</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Products</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                            <?php 
                                if($res_pet)
                                {
                                    $data_pet = $res_pet->fetch_all(MYSQLI_ASSOC);
                                    foreach($data_pet as $row)
                                    {
                                        ?>
                                            <div class="card mt-2">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <span><i class="bi bi-bag"></i> Belanja | <?php echo date('d M Y', strtotime($row["tgl_order"])) ?></span> 
                                                        <span class="badge bg-primary p-1"><?php echo $row['status'] ?></span>
                                                    </div>
                                                    <div class="d-flex justify-content-left align-items-center mt-2">
                                                        <img src="../assets/images/<?php echo $row['foto'] ?>" width="75" height="75" alt="">
                                                        <span class="p-3 fw-bold"><?php echo $row["nama"] ?><br><small class="fw-normal text-muted">1 x Rp<?php echo number_format($row['total'],0,',','.') ?></small></span>
                                                        <span class="p-3 text-muted">Total Belanja<br><span class="fw-bold">Rp <?php echo number_format($row['total'],0,',','.')?></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                    }
                                } else {
                                    echo $db->error;
                                }

                                if($res_product->num_rows == 0)
                                {
                                    echo "<span>Tidak ada transaksi.</span>";
                                }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                        <?php 
                                if($res_product)
                                {
                                    $data_pet = $res_product->fetch_all(MYSQLI_ASSOC);
                                    foreach($data_pet as $row)
                                    {
                                        ?>
                                            <div class="card mt-2">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <span><i class="bi bi-bag"></i> Belanja | <?php echo date('d M Y', strtotime($row["tgl_order"])) ?></span> 
                                                        <span class="badge bg-primary p-1"><?php echo $row['status'] ?></span>
                                                    </div>
                                                    <div class="d-flex justify-content-left align-items-center mt-2">
                                                        <img src="../assets/images/<?php echo $row['foto'] ?>" width="75" height="75" alt="">
                                                        <span class="p-3 fw-bold"><?php echo $row["nama"] ?><br><small class="fw-normal text-muted">1 x Rp<?php echo number_format($row['total'],0,',','.') ?></small></span>
                                                        <span class="p-3 text-muted">Total Belanja<br><span class="fw-bold">Rp <?php echo number_format($row['total'],0,',','.')?></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                    }
                                } else {
                                    echo $db->error;
                                }

                                if($res_product->num_rows == 0)
                                {
                                    echo "<span>Tidak ada transaksi.</span>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php footer_section() ?>