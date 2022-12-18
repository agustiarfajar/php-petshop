<?php 
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: ../login.php?error=access");
}
include_once("../config/functions.php");
include_once("../config/layout.php");
?>
<?php header_section() ?>
<div class="container mt-4">
  <div class="alert alert-success" role="alert">
    Pemesanan berhasil dilakukan! <a href="products.php" class="alert-link">Kembali</a>.
  </div>
</div>
<?php footer_section() ?>