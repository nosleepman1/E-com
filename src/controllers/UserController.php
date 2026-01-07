<?php 

    require_once __DIR__ . '/../models/User.php';
    require_once __DIR__ . '/../repositories/UserRepository.php';
    


    class UserController {

        private $requete;

        public function __construct() {
            $this->requete = new UserRepository();
        }

        public function register(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = new User($name, $email, $password);

                
                $this->requete->create($user);
               
                $urlComplet = "/phpproject_iage/index.php/";
                header("Location: " . $urlComplet . "connexion" );


            } else {

                require_once __DIR__  . '/../../views/auth/register.php';
            }

        }
        
        public function login(){
            
            $urlComplet = "/phpproject_iage/index.php/";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = $this->requete->findByEmail($email);

                if (!$user || $user['password'] != $password)  {
                    $_SESSION['erroLogin'] = "mail ou mot de passe incorect";
                    header("Location: " . $urlComplet . "connexion" );
                    exit;
                    return;
                } 

                $_SESSION['user'] = $user;
                header("Location: " . $urlComplet . "accueil" );
                exit;

            } else {
                require_once __DIR__  . '/../../views/auth/login.php';
            }

        }      

  }