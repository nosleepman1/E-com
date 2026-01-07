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
                $password =password_hash( $_POST['password'], PASSWORD_DEFAULT);

                $user = new User($name, $email, $password);

                
                $this->requete->create($user);
               
                $urlComplet = "/phpproject_iage/index.php/";
                header("Location: /connexion" );


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

                if (!$user || !password_verify( $password, $user['password']))  {
                    $_SESSION['erroLogin'] = "mail ou mot de passe incorect";
                    header("Location: /connexion" );
                    exit;
                } 

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['login'] = true;
                
                header("Location: /accueil" );
                exit;

            } else {
                require_once __DIR__  . '/../../views/auth/login.php';
            }

        }      

  }