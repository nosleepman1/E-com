<?php 

    require_once __DIR__ . '/../../database/database.php';
    require_once __DIR__ . '/../models/Product.php';



    class ProductRepository {

        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function create(Product $product, $idUser, $idCategorie){  
            $stmt = $this->db->prepare("INSERT INTO products(libelle, description, prix, quantite,id_user, id_categorie) VALUES(?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $product->getLibelle(),
                $product->getDescription(),
                $product->getPrix(),
                $product->getQuantite(),
                $idUser,
                $idCategorie
            ]);
        }

        public function All(){
            $stmt = $this->db->prepare("SELECT * FROM Produits");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function destroy(int $id, int $idUser){
            
            $stmt = $this->db->prepare("DELETE FROM Produits WHERE id = ? AND id_user = ?");
            $stmt->execute([$id, $idUser]);
        }

        public function myProducts(int $idUser){
            $stmt = $this->db->prepare("SELECT * FROM Produits WHERE id_user = ?");
            $stmt->execute([$idUser]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        }
    }