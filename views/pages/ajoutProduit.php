<?php 
    ob_start();
    $urlComplet = "/phpproject_iage/index.php/";

    

?>
<div class="container p-5">
    <h1>AJOUTER PRODUIT</h1>

    <form method="post" action="<?= $urlComplet ?>ajouter ">

        <div class="mb-3">
            <label for="name" class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">description</label>
            <input type="text" class="form-control" name="description">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quantite</label>
            <input type="number" class="form-control" name="quantite">
        </div>

        <div class="mb-3">
            <select name="select" class="form-select">
                <?php foreach($categories as $categorie) : ?>
                <option value="<?= $categorie['id'] ?> >  <?php echo $categorie['libelle'] ?> </option>
               <?php endforeach ?>
            </select>
        </div>

        <button type=" submit" class="btn btn-primary">Submit</button>

    </form>
</div>



<?php 
    $content = ob_get_clean();
    require_once __DIR__ . '/../layouts/main.php';
?>