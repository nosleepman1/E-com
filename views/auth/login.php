<?php 
    ob_start();



?>



<div class="container p-5">
    <h1>CONNEXION</h1>

    <p class="my-4"><?php echo $_SESSION['erroLogin'] ?? ''; unset($_SESSION['erroLogin']);?></p>

    <form method="post" action="/connexion">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php 
    $content = ob_get_clean();
    require_once __DIR__ . '/../layouts/main.php';
?>