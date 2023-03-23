<?php
    namespace Model;
    class Bdd{
        public $db;
        public function __construct()
        {
            $this->db = new \PDO('mysql:host=localhost;dbname=2esgi-apimv', "root", "");

         
        }
}