<?php
namespace App\Models;

use DB\Database;

class Model{
    protected $db;

    public function __construct(){
        // Récupère l'instance de connexion à la BDD
        $this->db = Database::getInstance();
    }
}