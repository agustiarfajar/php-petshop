<?php 
function dbConnect()
{
    $db = new mysqli("localhost", "root", "", "php_petshop");
    return $db;
}

function showSuccess($success)
{   
    ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="text-primary"><i class="bi bi-square-fill"></i></span>
            <strong class="me-auto">&nbsp;Alert</strong>
            
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $success ?>
        </div>
    </div>
    
<?php
}

function showError($success)
{   
    ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="text-danger"><i class="bi bi-square-fill"></i></span>
            <strong class="me-auto">&nbsp;Alert</strong>
            
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $success ?>
        </div>
    </div>
    
<?php
}

function getDetailPet($id)
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT * FROM pet WHERE id='$id'";
        $res = mysqli_query($db, $sql);
        if($res)
        {
            if($res->num_rows==1)
            {
                $data = $res->fetch_assoc();
                return $data;
            }
            $res->free();
        }
    }
}

function getDetailProduct($id)
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT * FROM product WHERE id='$id'";
        $res = mysqli_query($db, $sql);
        if($res)
        {
            if($res->num_rows==1)
            {
                $data = $res->fetch_assoc();
                return $data;
            }
            $res->free();
        }
    }
}
?>