<?php  

    $urlComplet = "/phpproject_iage/index.php/";
   // $class = $_SESSION['admin'] == true ? 'admin' : ''

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
    .admin {
        display: none;
    }
    </style>
</head>

<body>


    <header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Gestion Produit</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" a href="  <?= $urlComplet?>accueil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $urlComplet?>connexion">Connexion</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= $urlComplet?>inscription">Inscription</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= $urlComplet?>ajouter">AjouterProduit</a>
                        </li>

                        <!-- <li class="nav-item  ">
                            <a class="nav-link <?= $class ?>" href="<?= $urlComplet?>inscription">MenuAdmin</a>
                        </li> -->
                    </ul>

                </div>
            </div>
        </nav>

    </header>


    <main>

        <?=  $content ?>

    </main>




</body>

</html>