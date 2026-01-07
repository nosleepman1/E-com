<?php 


    class Database {

        private static ?PDO $pdo = null;

        private function __construct() { }

        public static function connect() {

            if (!self::$pdo) {

                $host = "localhost";
                $db   ="ecom";
                $user = "root";
                $pass = "";

                $dsn = "mysql:host=$host;dbname=$db";

                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);

            }
            
            return self::$pdo;
        }

    }