<?php
    class db {
        private $host ="172.18.0.2";
        private $database_name ="paradex";
        private $username = "root";
        private $password = "db125";

        public $conn;

        public function connect(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_na$
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>