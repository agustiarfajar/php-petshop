<?php
session_id("adminpetshop");
session_start();
if($_SESSION["login"] != true) 
{
    header("Location: ../index.php?error=access");
}
include_once('../config/functions.php');
include_once('../config/layout.php');

$db = dbConnect();
$id = $_GET['id'];

// FETCH DATA
if(isset($_GET["id"]))
{
    $sql_data = "SELECT * FROM pet WHERE id='$id'";
    $res_data = mysqli_query($db, $sql_data);
    if($res_data)
    {
        $getData = $res_data->fetch_assoc();
    } else {
        echo $db->error;
    }
}

?>
<?php header_section() ?>
<div id="app">
    <?php sidebar() ?>
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
                            <h3>Pets Category</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pets Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- datatable -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Edit Pets Category 
                        </div>
                        <form action="../do-pets-update.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../../assets/images/<?php echo $getData['foto'] ?>" width="300" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $getData['id'] ?>">
                                        <label>Name</label>
                                            <input type="text" name="nama" class="form-control" value="<?php echo $getData['nama'] ?>" placeholder="Enter name" required>
                                            <fieldset class="form-group mt-2">
                                                <label>Category</label>
                                                <select class="form-select" id="basicSelect" name="id_kategori" required>
                                                    <option value="">Choose</option>
                                                    <?php 
                                                        $sql_kat = "SELECT * FROM pet_category";
                                                        $res_kat = mysqli_query($db, $sql_kat);
                                                        if($res_kat)
                                                        {
                                                            $data = $res_kat->fetch_all(MYSQLI_ASSOC);
                                                            foreach($data as $x)
                                                            {
                                                                if($getData['id_kategori'] == $x['id'])
                                                                {
                                                                    $select = "selected";
                                                                } else {
                                                                    $select = "";
                                                                }
                                                                ?>
                                                                    <option <?php echo $select ?> value="<?php echo $x['id'] ?>"><?php echo $x['nama'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </fieldset>
                                            <label class="mt-2">Price</label>
                                            <input type="number" min="0" class="form-control" name="harga" value="<?php echo $getData['harga'] ?>" placeholder="Enter price" required>
                                            <label class="mt-2">Description</label>
                                            <input type="text" class="form-control" name="deskripsi" value="<?php echo $getData['deskripsi'] ?>" placeholder="Enter Description" required>
                                            <label class="mt-2">Picture</label>
                                            <input type="file" class="form-control" name="foto" placeholder="Enter Picture">
                                            <button type="button" onclick="konfirmasiUbah()" name="btnUpdate" class="btn btn-primary mt-4"><i class="bi bi-pencil-square"></i> Update</button>
                                        </div>    
                                    </div>                                                        
                                </div>
                                
                            </div>
                        </form>
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
</div>
<?php footer_section() ?>
<script>
        // Sweetalert
        function konfirmasiUbah()
        {
            event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                icon: "question",
                title: "Konfirmasi",
                text: "Apakah anda yakin ingin mengubah data?",
                showCancelButton: true,
                confirmButtonText: "Ubah",
                cancelButtonText: "Batal"
            }).then((result) => {
                if(result.value) {
                    form.submit();
                } else {
                    Swal.fire("Informasi","Data batal diubah.","error");
                }
            });
        }
    </script>