<?php
namespace Model;
class Bdd
{
    private $db;
    public function __construct()
    {
        $this->db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    public function db()
    {
        return $this->db;
    }
}