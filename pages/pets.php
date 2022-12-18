<?php 
session_id("petshop");
session_start();
include_once("../config/functions.php");
include_once("../config/layout.php");
?>
<?php header_section() ?>
<?php banner_section() ?>
<div class="container d-flex justify-content-end mt-3">
    <a href="https://wa.me/123456789?text=I'm%20interested%20in%20your%product%20for%20sale" class="btn btn-success">
      <i class="bi bi-whatsapp"></i> Chat on Whatsapp
    </a>
  </div>
    <div class="container mt-4" id="featured-3">
      <div class="row">
        <div class="feature col-md-4">
          <h3 class="fs-2">Pet Category</h3>
          <ul class="list-group list-group-flush just">
            <?php 
                $db = dbConnect();
                $sql = "SELECT * FROM pet_category";
                $res = mysqli_query($db, $sql);
                if($res)
                {
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                    foreach($data as $row)
                    {
                       ?>
                         <li class="list-group-item"><a href="#" class="link-secondary text-decoration-none"><?php echo $row["nama"] ?></a></li>
                       <?php
                    }
                }
            ?>
            <!-- <li class="list-group-item"><a href="#" class="link-secondary">Cat</a></li>
            <li class="list-group-item"><a href="#" class="link-secondary">Dog</a></li>
            <li class="list-group-item"><a href="#" class="link-secondary">Rabbit</a></li> -->
          </ul>
        </div>
        <?php 
            $db = dbConnect();
            $sql = "SELECT * FROM pet";
            $res = mysqli_query($db, $sql);

            // COUNT DATA
            $sql_count = "SELECT COUNT(*) as pet FROM pet";
            $res_count = mysqli_query($db, $sql_count);
            if($res_count)
            {
                $jml_pet = $res_count->fetch_assoc();
            }
        ?>
        <div class="feature col-md-8">
            <?php 
            if($res->num_rows == 0)
            {
                echo "<h5 class='fs-6 text-secondary'>Tidak Ada Data</h5>";
            } else {
                echo "<h5 class='fs-6 text-secondary'>Showing 1 - ".$jml_pet['pet']." pets</h5>";
            }
          ?>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            <?php 
                if($res)
                {
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                    foreach($data as $row)
                    {
                        ?>
                            <div class="col">
                                <!-- CARD SECTION -->
                              <div class="card shadow-sm">
                                <img src="../assets/images/<?php echo $row["foto"] ?>" alt="food1">
                    
                                <div class="card-body">
                                    <h6 class="card-title"><a href="#" class="link-dark text-decoration-none"><?php echo $row["nama"] ?></a></h6>
                                    <small class="text-muted"><b>Rp. <?php echo number_format($row["harga"],0,',','.') ?></b></small>
                                    <div class="btn-group">
                                      <a href="<?php echo "pet-detail.php?id=$row[id]" ?>" class="btn btn-sm btn-outline-warning mt-2">Adopt Now</a>
                                    </div> 
                                </div>
                              </div>
                            </div>
                        <?php
                    }
                }
            ?>
          </div>
            <!-- <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link link-primary" href="#">1</a></li>
                    <li class="page-item"><a class="page-link link-primary" href="#">2</a></li>
                    <li class="page-item"><a class="page-link link-primary" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    </ul>
                </nav>
            </div> -->
        </div>
      </div> 
    </div>
<?php footer_section() ?>