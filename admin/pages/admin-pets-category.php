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
$sql = "SELECT * FROM pet_category";
$res = mysqli_query($db, $sql);

// QUERY SAVE
if(isset($_POST["btnSimpan"]))
{
    $nama = $db->escape_string($_POST["nama"]);
    $sql_save = "INSERT INTO pet_category(nama) VALUES('$nama')";
    $res_save = mysqli_query($db, $sql_save);

    if($res_save)
    {
        header('Location: admin-pets-category.php?success=add');
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
                            Table Pets Category
                            <div class="me-1 mb-1 d-inline-block float-end">

                                <!-- button add -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#defaultSize">
                                    <i class="bi bi-plus-square"></i>&nbsp;
                                    <span>ADD</span>
                                </button>
                                <!-- end button add -->

                                <!-- form add -->
                                <form action="" method="post">
                                    <div class="modal fade text-left" id="defaultSize" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Add Pets Category</h4>
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
                                                                    <input type="text" name="nama" class="form-control" placeholder="Enter name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" name="btnSimpan" class="btn btn-primary ml-1" id="success">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Simpan</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                        <!-- kolom action -->
                                        <td>
                                            <!-- EDIT -->
                                            <a href="admin-pets-category-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info"><i class="bi bi-pencil-square"></i> Edit</a>
                                            &emsp;
                                            <!-- END EDIT -->
                                            <!-- DELETE -->
                                            <a href="../do-pets-category-delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger delete-confirm"><i class="bi bi-trash"></i> Danger</a>
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
?>