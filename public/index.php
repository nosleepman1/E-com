<?php 
    session_start();
    $request = $_SERVER['REQUEST_URI'];
    $scriptname = $_SERVER['SCRIPT_NAME'];

    $url = str_replace($scriptname, '', $request);
    $url = trim($url, '/');
    $url = strtok($url, '?');

    require_once __DIR__ . '/src/controllers/UserController.php';
    $userController = new UserController();
    require_once __DIR__ . '/src/controllers/ProductController.php';
    $productController = new ProductController();
    


    require_once __DIR__ . '/database/database.php';
    Database::connect();



    switch($url) {

        case '':
        case 'accueil':
            require_once __DIR__ . '/views/pages/accueil.php';
        break;
        case 'connexion':
            $userController->login();
        break;
        case 'inscription':
            $userController->register();
            break;
        case 'ajouter':
            $productController->create();
            break;
        default:
            require_once __DIR__ . '/views/pages/404.php';

        break;
    }