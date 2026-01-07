<?php 

    require_once __DIR__ . '/../models/Product.php';
    require_once __DIR__ . '/../repositories/ProductRepository.php';
    require_once __DIR__ . '/../repositories/CategorieRepository.php';
    


    class ProductController {

        private $requete;
        private $categorie;


        public function __construct() {
            $this->requete = new ProductRepository();
            $this->categorie = new CategorieRepository();
        }

        public function create(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $libelle = $_POST['libelle'];
                $description = $_POST['description'];
                $prix = $_POST['prix'];
                $quantite = $_POST['quantite'];
                $userId = $_SESSION['user']['id'];
                $categorieId = $_POST['select'];

                $produit = new Product($libelle, $description, $prix, $quantite);

                $this->requete->create($produit, $userId, $categorieId);

               
                header("Location: /accueil");

            } else {
               
                if($_SESSION['user'] || $_SESSION['admin']) {
                    $categories = $this->categorie->All();
                    require_once __DIR__  . '/../../views/pages/ajoutProduit.php';
               
                } else {
                    header("Location: /connexion" );
                    exit;
                }
            }
        }


    }