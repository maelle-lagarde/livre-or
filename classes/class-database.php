<?php
    class Database {
        private $host = 'localhost';
        private $dbname = 'livreor';
        private $username = 'root';
        private $password = 'root';

        public function getConnection() {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";

            try {
                $connection = new PDO($dsn, $this->username, $this->password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connection;
            } catch (PDOException $e) {
                echo 'Échec de la connexion à la base de données : ' . $e->getMessage();
            }
        }
    }
?>