<?php 
session_id("petshop");
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location: ../login.php?error=access");
}
include_once("../config/functions.php");
include_once("../config/layout.php");

$db = dbConnect();
$id_user = $_SESSION["id"];
$sql = "SELECT * FROM users WHERE id = '$id_user'";
$res = mysqli_query($db, $sql);

if($res)
{
    if($res->num_rows==1)
    {
        $getProfile = $res->fetch_assoc();
    }
} else {
    echo $db->error;
}
?>
<?php header_section() ?>
<div class="container mt-4">
    <div class="w-75 m-auto">
        <div class="row">
            <div class="col-12">
            <?php 
                // NOTIF ERROR
                if(isset($_GET["success"]))
                {
                    $success = $_GET["success"];
                    if($success == "ubah")
                    {
                        showSuccess("Data berhasil diubah.");
                    }
                }
            ?>
            </div>
        </div>
        <form action="../do-user-update.php" method="post">
            <h1 class="h3 fw-bold text-center my-5">Profile</h1>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $getProfile["email"] ?>" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $getProfile["nama"] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nomor Handphone<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nomor Handphone" name="no_hp" value="<?php echo $getProfile["no_hp"] ?>" maxlength="13">
                </div>
            </div>
            <hr>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Kata Sandi<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Kata Sandi" name="password" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Konfirmasi Kata Sandi<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" name="konfirmasi" required>
                </div>
            </div>
            <div class="m-auto my-5 text-center">
                <button class="w-25 btn btn-lg btn-primary" type="submit" name="btnUpdate">Update</button>
            </div>
        </form>
    </div>
</div>
<?php footer_section() ?>
<script>
	$(document).ready(function(){
        $('.toast').toast('show');
    })
</script>