<?php
namespace App\Models;

use DB\Database;

class Todo extends Model {
    /**
     * Récupère toutes les tâches dans la BDD
     * @return array
     */
    public function getAll() {
        // Récupérer les tâches depuis la BDD
        $query = $this->db->query("SELECT * FROM todos;"); // prépare la requête
        return $query->fetchAll();
    }

    /**
     * Ajoute une nouvelle tâche dans la BDD
     * @param string $task La tâche à ajouter
     * @return bool
     */
    public function add(string $task) {
        // insérer la tache dans la table "todos".
        // Les placeholders "tasks" et ":done" sont utilisés pour éviter les injectio SQL
        // Cela sécurise les données entrées par l'utilisateur
        $stmt = $this->db->prepare("INSERT INTO  todos (task,done) VALUES (:task, :done);"); //prépare la requête

        // Exécute la requête préparée avec les vakeurs spécifiques fournies dans un tableau associatif
        // - `:task` contient la description de la tâche saisie par l'utilisateur
        // - `:done` est initialisé à 0 (indiquant que la tâche n'est pas encore terminée)
       return  $stmt->execute([":task" => $task, ":done" => 0]); //exécution de la requête
    }

    /**
     * Change le statut d'une tâche
     * @param int $id L'identifiant de la tâche à supprimer
     * @return bool
     */
    public function toggle(int $id) {
        // Alterne l'état du champ `done` dans la BDD
        $stmt = $this->db->prepare("UPDATE todos SET  done = NOT done WHERE id = :id;");
        return $stmt->execute([":id" => (int) $id]);
    }

    /**
     * Supprime une tâche 
     * @param int $id L'identifiant de la tâche à supprimer
     * @return bool
     */
    public function delete(int $id) {
        // Supprime la tâche indexée dans la BDD
        $stmt = $this->db->prepare('DELETE FROM todos WHERE id = :id;');
        return $stmt->execute([":id" =>(int) $id]);
    }

    /**
     * Récupère le tâche à modifier depuis la BDD
     * @param int $id L'id de la tâche indexée
     * @return array
     */
    public function toModif(int $id) {
        $stmt = $this->db->prepare('SELECT task FROM todos WHERE id = :id;');
        $stmt->execute([':id'=> (int) $id]);
        return $stmt->fetchAll();
    }
    /**
     * Modifie la tâche indexée
     * @param string $modification La modification éffectuée
     * @param int $id L'id de la tâche indexée
     * @return bool
     */
    public function modif(string $modification, int $id) {
        $stmt = $this->db->prepare('UPDATE todos SET  task = :modification WHERE id = :id;');
        return $stmt->execute([':id'=> (int) $id,':modification'=>$modification]);
    }
}