<?php
namespace DB;

use Dotenv\Dotenv;
use \PDO;
use \PDOException;

class Database {
    // Design Pattern: Singleton 

    public static ?PDO $instanceDb = null;

    /**
     * Empêche l'instanciation de la classe
     */

    private function ___contruct (){}
    private function __clone (){}

    public static function getInstance(){
        // charger les variables d'environnement
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        //Configuration de la base de donnée
         $dbHost = $_ENV["DB_HOST"];
         $dbName = $_ENV["DB_NAME"];
         $dbUser = $_ENV["DB_USER"];
         $dbPassword = $_ENV["DB_PASSWORD"];


        // si l'instance est nulle , on la crée

        if (self::$instanceDb === null) {
        try {
            self::$instanceDb = new PDO(
                "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4" , 
                $dbUser, 
                $dbPassword,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //lever des exceptions quand il y a des erreurs
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //renvoyer les données sous forme de tableau associatif
            ]
        );
        } catch (PDOException $e) {
            exit("Echec de connexion à la BDD: ".$e->getMessage());
            //die("Echec de connexion à la BDD: ".$e->getMessage());
        }
        }

        // sinon on la renvoi directement
       return  self::$instanceDb;
    }
}