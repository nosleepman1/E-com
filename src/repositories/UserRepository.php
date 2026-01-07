<?php 

    require_once __DIR__ . '/../../database/database.php';
    require_once __DIR__ . '/../models/User.php';


    class UserRepository {

        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function create(User $user){
            $stmt = $this->db->prepare("INSERT INTO Utilisateurs(name, email, password) VALUES(?, ?, ?)");
            $stmt->execute([
                $user->getName(),
                $user->getEmail(),
                $user->getPassword()
            ]);
        }

        public function findByEmail(string $email){
            $stmt = $this->db->prepare("SELECT * FROM Utilisateurs WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }