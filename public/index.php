<?php 
//Autoloader
// spl_autoload_register(function ($class) {
//     require "../src/$class.php";
// });

//------------------------------------Début
use App\Controllers\TodoController;
use App\Router;


//Autoloader
require dirname(__DIR__)."/vendor/autoload.php";

if (!isset($_SESSION)) {
    session_start();
}


// Créer une instance du routeur
$router = new Router();

// Créer une instance du controlleur
$todoController = new TodoController();


// Définir les routes de l'application 
$router->get("/", [$todoController,'index']);
$router->post("/add", [$todoController,'add']);
$router->get("/add", [$todoController,'add']);
$router->get("/toggle", [$todoController,'toggle']);
$router->get("/delete", [$todoController,'delete']);
$router->get("/modif", [$todoController,'modif']);
$router->post("/modif", [$todoController,'modif']);

// Résoudre la route correspondant 
$router->resolve();