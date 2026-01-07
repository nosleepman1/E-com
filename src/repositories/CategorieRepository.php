<?php 

    require_once __DIR__ . '/../../database/database.php';
 

    class CategorieRepository {

        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function All(){
            $stmt = $this->db->prepare("SELECT * FROM categorie");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }