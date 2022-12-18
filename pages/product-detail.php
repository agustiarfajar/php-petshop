<?php 
session_id("petshop");
session_start();
include_once("../config/functions.php");
include_once("../config/layout.php");

if(isset($_GET["id"]))
{
    $db = dbConnect();

    $id = $_GET["id"];
    $data_product = getDetailProduct($id);
    $id_kat = $data_product["id_kategori"];

    $sql_kat = "SELECT product_category.nama as kategori
                FROM product_category  
                INNER JOIN product 
                ON product.id_kategori = product_category.id 
                WHERE product.id_kategori = '$id_kat'";
    $res_kat = mysqli_query($db, $sql_kat);
    if($res_kat)
    {
        $kat = $res_kat->fetch_assoc();
    }
}
?>
<?php header_section() ?>
<div class="container mt-4">
<section class="content">

<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-4">
        <div class="col-12">
          <img src="../assets/images/<?php echo $data_product["foto"] ?>" width="350" class="product-image" alt="Product Image">
        </div>
      </div>
      <div class="col-12 col-sm-8">
        <h3 class="my-3"><?php echo $data_product["nama"] ?></h3>
        <p>
            Kategori : <span class="badge bg-warning text-dark"><?php echo $kat["kategori"] ?></span>
        </p>
        <p><?php echo $data_product["deskripsi"] ?></p>

        <hr>
      
        <div class="bg-secondary text-white p-3 mt-4">
          <h2 class="mb-0">
            Rp. <?php echo number_format($data_product["harga"],0,',','.') ?>
          </h2>
        </div>

        <div class="mt-4">
          <a href="product-checkout.php?id-product=<?php echo $data_product["id"] ?>" class="btn btn-primary btn-lg btn-flat">
            <i class="bi bi-cart fa-lg mr-2"></i>
            Beli Sekarang
          </a>

          <div class="btn btn-outline-secondary btn-lg">
            <i class="bi bi-heart fa-lg mr-2"></i>
            Add to Wishlist
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
</div>   
<?php footer_section() ?>