<?php
namespace App\Controllers;

use DB\Database;

class TodoController{

    public function index(){
        // Récupérer l'instance de connexion à la BDD
        $db = Database::getInstance();

        // Récupérer les tâches depuis la BDD
        $query = $db->query("SELECT * FROM todos;"); // prépare la requête
        $todos = $query->fetchAll();

        //Charger le vue "Views/index.php"
            // require __DIR__ ."/../Views/index.php";
        require dirname(__DIR__) ."/Views/index.php";
    }
    public function add(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = trim($_POST['task']);

            if($task){
                // Récupérer l'instance de connexion à la BDD
                $db = Database::getInstance();
                // insérer la tache dans la table "todos".
                // Les placeholders "tasks" et ":done" sont utilisés pour éviter les injectio SQL
                // Cela sécurise les données entrées par l'utilisateur
                $stmt = $db->prepare("INSERT INTO  todos (task,done) VALUES (:task, :done);"); //prépare la requête

                // Exécute la requête préparée avec les vakeurs spécifiques fournies dans un tableau associatif
                // - `:task` contient la description de la tâche saisie par l'utilisateur
                // - `:done` est initialisé à 0 (indiquant que la tâche n'est pas encore terminée)
                $stmt->execute([":task" => $task, ":done" => 0]); //exécution de la requête
            }
            header('Location: /');
            exit;
        }
        // Charger la vue add.php
        require dirname(__DIR__) ."/Views/add.php";
    }

    public function delete(){

        $id = $_GET['id'] ?? null;
        if($id){
            // Récupérer l'instance de connexion à la BDD
            $db = Database::getInstance();
            // Supprime la tâche indexée dans la BDD
            $stmt = $db->prepare('DELETE FROM todos WHERE id = :id;');
            $stmt->execute([":id" =>(int) $id]);
        }

        header('Location: /');
            exit;
    }

    public function toggle(){

        $id = $_GET['id'] ?? null;
        if($id){
             // Récupérer l'instance de connexion à la BDD
             $db = Database::getInstance();
             // Alterne l'état du champ `done` dans la BDD
             $stmt = $db->prepare("UPDATE todos SET  done = NOT done WHERE id = :id;");
             $stmt->execute([":id" => (int) $id]);
        }

        header('Location: /');
            exit;
    }

    public function modif(){
        
        $id = $_GET['id'] ?? null;
        if($id){
            // Récupère l'instance de connexion à la BDD
            $db = Database::getInstance();

            // Récupère le tâche à modifier depuis la BDD
            $stmt = $db->prepare('SELECT task FROM todos WHERE id = :id;');
            $stmt->execute([':id'=> (int) $id]);
            $taskToModif = $stmt->fetchAll();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modifiation = trim($_POST['modifiation']);
            if($modifiation){
                // Récupère l'instance de connexion à la BDD
                $db = Database::getInstance();

                // Modifie la tâche indexée
                $stmt = $db->prepare('UPDATE todos SET  task = :modification WHERE id = :id;');
                $stmt->execute([':id'=> (int) $id,':modification'=>$modifiation]);
            }
            header('Location: /');
            exit;
        }

        require dirname(__DIR__) .'/Views/modif.php';
    }
}