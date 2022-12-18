<?php 
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: ../login.php?error=access");
}
include_once("../config/functions.php");
include_once("../config/layout.php");

if(isset($_GET["id-product"]))
{
    $id = $_GET["id-product"];
    $data = getDetailProduct($id);
}
?>
<?php header_section() ?>

<div class="container mt-4">
<form action="../do-user-order-product.php" method="post">
    <h2>Detail Pemesanan</h2>
    <hr>
    <div class="mb-3 row">
        <label for="namaproduct" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="hidden" name="id_product" value="<?php echo $data['id'] ?>">
            <input type="text" readonly class="form-control-plaintext" id="namaproduct" value="<?php echo $data['nama'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" name="nama_lengkap" class="form-control" id="namalengkap" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="harga" class="col-sm-2 col-form-label">Total Bayar</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="harga" value="<?php echo "Rp. ". number_format($data['harga'],0,',','.') ?>">
            <input type="hidden" name="total" value="<?php echo $data['harga'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" name="btnPesan" class="btn btn-primary"><i class="bi bi-truck"></i> Pesan Sekarang</button>
        </div>
    </div>
</form>
</div>

<?php footer_section() ?>