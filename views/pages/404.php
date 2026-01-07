<?php 
    ob_start();

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="alert alert-danger center">
            <h1 class="">PAGE EST INTROUVABLE</h1>
        </div>
    </div>
</div>


<?php 

    $content = ob_get_clean();
    require_once __DIR__ . '/../layouts/main.php';