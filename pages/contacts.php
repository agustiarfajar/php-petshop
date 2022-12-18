<?php 
session_id("petshop");
session_start();
include_once("../config/functions.php");
include_once("../config/layout.php");
?>
<?php header_section() ?>
<?php banner_section() ?>
<div class="container mt-4">
    <?php 
        // NOTIF ERROR
        if(isset($_GET["success"]))
        {
            $success = $_GET["success"];
            if($success == "sent")
            {
                showSuccess("Pesan berhasil dikirim. Terimakasih");
            }
        }
    ?>
    <div class="d-flex mt-5">
        <h3>PLEASE FILL-UP FEW DETAILS</h3>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form action="../do-send-message.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">FULL NAME *</label>
                            <input type="text" class="form-control" id="fullname" name="full_name" aria-describedby="fullname" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">EMAIL *</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required autocomplete="off">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">PHONE *</label>
                            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone" maxlength="13" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="subject" class="form-label">SUBJECT *</label>
                            <input type="text" class="form-control" id="subject" name="subject" aria-describedby="subject" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="message" class="form-label">MESSAGE *</label>
                            <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnSend" class="btn btn-outline-secondary">SEND MAIL</button>
            </form>
        </div>
        <div class="col-md-4">
            <div style="border: 1px solid yellow" class="p-3">
                <span class="fs-6 text-secondary">OUR ADDRESS</span>
                <div class="row mt-4" style="font-size:13px">
                    <div class="col-md-1">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="col-md-10">
                        <span class="text-secondary">
                            Gedung Bangkit Telkom University Jl. Telekomunikasi Terusan Buah Batu Indonesia 40257, Bandung , Indonesia
                        </span>
                    </div>
                </div>
                <div class="row mt-4" style="font-size:13px">
                    <div class="col-md-1">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="col-md-10">
                        <span class="text-secondary">1.800.123.456789</span>
                    </div>
                </div>
                <div class="row mt-4" style="font-size:13px">
                    <div class="col-md-1">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="col-md-10">
                        <span class="text-secondary">info@petshop.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======= MAP SECTION ========= -->
<div class="container">
    <div id="googleMap" style="width:100%;height:400px;"></div>
</div>
    
<?php footer_section() ?>
<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=c03ae4baf6mshb24184fc38c86d9p1dc2bejsn9785ff236cb3&callback=myMap"></script>
<script>
	$(document).ready(function(){
        $('.toast').toast('show');
    })
</script>