<?php 
    ob_start();

?>

<div class="container mt-5"></div>
<div class="row justify-content-center">

    <h1>BIENVUER A LA PAGE ACCUEIL</h1>


    <?php  if(isset($_SESSION['user'])):  ?>
    <div class="alert alert-success">
        <h1>Bienvenue <?=  $_SESSION['user']['name']  ?> </h1>
        <?php unset($_SESSION['user']); ?>)
    </div>
    <?php endif ?>
</div>
</div>


<?php 

    $content = ob_get_clean();
    require_once __DIR__ . '/../layouts/main.php';