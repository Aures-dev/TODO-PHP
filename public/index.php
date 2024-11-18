<?php 
//Autoloader
// spl_autoload_register(function ($class) {
//     require "../src/$class.php";
// });

//------------------------------------Début
use App\Router;


//Autoloader
require dirname(__DIR__)."/vendor/autoload.php";

if (!isset($_SESSION)) {
    session_start();
}


// Créer une instance du routeur
$router = new Router();

$router->get("/", function () {});
$router->post("/add", function () {});
$router->get("/add", function () {});
$router->get("/toggle", function () {});
$router->get("/delete", function () {});

echo "<pre>";
var_dump($router);