<?php 
    ob_start();
    $urlComplet = "/phpproject_iage/index.php/";

?>
<div class="container p-5">
    <form method="post" action="<?= $urlComplet ?>inscription ">

        <div class="mb-3">
            <label for="name" class="form-label">Full name</label>
            <input type="name" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



<?php 
    $content = ob_get_clean();
    require_once __DIR__ . '/../layouts/main.php';
?>