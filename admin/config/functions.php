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
?>