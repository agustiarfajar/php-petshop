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
$sql = "SELECT pet.*, pet_category.nama as kategori 
        FROM pet INNER JOIN pet_category
        ON pet.id_kategori = pet_category.id";
$res = mysqli_query($db, $sql);


// SAVE DATA PETS
if(isset($_POST["btnSave"]))
{
    $nama = $db->escape_string($_POST['nama']);
    $id_kategori = $db->escape_string($_POST['id_kategori']);
    $harga = $db->escape_string($_POST['harga']);
    $deskripsi = $db->escape_string($_POST['deskripsi']);

    // SETUP STORE IMAGE INTO DATABASE
    $target_dir = "../../assets/images/";
    $image_name = basename($_FILES['foto']['name']);
    $image_name = time()."_".$image_name;
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file))
    {
        echo "The file ".basename($_FILES['foto']['name']). " has been upladed.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=$image_name; // used to store the filename in a variable
    
    //storind the data in your database
    $sql= "INSERT INTO pet VALUES ('?', '$nama','$id_kategori','$harga','$deskripsi','$image')";
    $res = mysqli_query($db, $sql);
    if($res)
    {
        header('Location: admin-pets.php?success=add');
    } else {
        echo $db->error;
    }
}
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
                            <h3>Pets</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pets</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- datatable -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Table Pets
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
                                                <h4 class="modal-title" id="myModalLabel18">Add Pets</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div>                                                            
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" name="nama" class="form-control" placeholder="Enter name" required>
                                                                <fieldset class="form-group mt-2">
                                                                    <label>Category</label>
                                                                    <select class="form-select" id="basicSelect" name="id_kategori" required>
                                                                        <option selected value="">Choose</option>
                                                                        <?php 
                                                                            $sql_kat = "SELECT * FROM pet_category";
                                                                            $res_kat = mysqli_query($db, $sql_kat);
                                                                            if($res_kat)
                                                                            {
                                                                                $data = $res_kat->fetch_all(MYSQLI_ASSOC);
                                                                                foreach($data as $x)
                                                                                {
                                                                                    ?>  
                                                                                    <option value="<?php echo $x['id'] ?>"><?php echo $x['nama'] ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </fieldset>
                                                                <label class="mt-2">Price</label>
                                                                <input type="number" min="0" class="form-control" name="harga" placeholder="Enter price" required>
                                                                <label class="mt-2">Description</label>
                                                                <input type="text" class="form-control" name="deskripsi" placeholder="Enter Description" required>
                                                                <label class="mt-2">Picture</label>
                                                                <input type="file" class="form-control" name="foto" placeholder="Enter Picture">
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
                                                <button type="submit" name="btnSave" class="btn btn-primary ml-1" id="success">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Submit</span>
                                                </button>
                                            </div>
                                            </form>
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
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price (Rp)</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if($res)
                                    {
                                        $i = 1;
                                        $data = $res->fetch_all(MYSQLI_ASSOC);
                                        foreach($data as $row)
                                        {
                                            ?>
                                        <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php echo $row['kategori'] ?></td>
                                        <td><?php echo number_format($row['harga'],0,',','.') ?></td>
                                        <td><?php echo substr($row['deskripsi'],0, 30)."..." ?></td>
                                        <td><img src="../../assets/images/<?php echo $row['foto'] ?>" width="75" alt=""></td>
                                        <!-- kolom action -->
                                        <td>
                                            <!-- EDIT -->
                                            <a href="admin-pets-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                            <!-- END EDIT -->
                                            <!-- DELETE -->
                                            <a href="../do-pets-delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm delete-confirm"><i class="bi bi-trash"></i> Danger</a>
                                            <!-- END DELETE -->
                                        </td>
                                        <!-- end kolom action -->
                                    </tr>
                                            <?php 
                                        }
                                    }
                                ?>
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

<?php footer_section() ?>
<script>
     // Sweetalert
     $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');

            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus data?',
                text: "Anda tidak dapat mengembalikan data ini.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete'
                
            }).then((result) => {
                if (result.value) {
                    window.location.href = url;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire("Informasi","Data batal dihapus.","error");
                }
            })
        });

        
</script>
<?php 
if(isset($_GET["success"]))
{
    $success = $_GET["success"];
    if($success == "hapus")
    {
        ?>
            <script>
                Toastify({
                        text: "Data Berhasil dihapus.",
                        duration: 3000,
                        close:true,
                        backgroundColor: "#ed2d2d",
                    }).showToast();
            </script>
        <?php
    }

    if($success == "update")
    {
        ?>
            <script>
                Toastify({
                        text: "Data Berhasil diupdate.",
                        duration: 3000,
                        close:true,
                        backgroundColor: "#25396f",
                    }).showToast();
            </script>
        <?php
    }

    if($success == "add")
    {
        ?>
            <script>
                Toastify({
                        text: "Data Berhasil ditambah.",
                        duration: 3000,
                        close:true,
                        backgroundColor: "#25396f",
                    }).showToast();
            </script>
        <?php
    }
}