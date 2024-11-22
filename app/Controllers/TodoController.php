<?php
namespace App\Controllers;

use DB\Database;
use App\Models\Todo;

class TodoController extends Controller {
    private Todo $todoModel;

    public function __construct(){
        $this->todoModel = new Todo();
    }

    public function index(){
       
        $todos = $this->todoModel->getAll();
        $this->view("index",["todos"=>$todos]);
    }
    public function add(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = trim($_POST['task']);

            if($task){
               $this->todoModel->add($task);
            }
            $this->redirect('/');
        }
        // Charger la vue add.php
        $this->view('add');
    }

    public function delete(){

        $id = $_GET['id'] ?? null;
        if($id){
            $this->todoModel->delete((int) $id);
        }

        $this->redirect("/");
    }

    public function toggle(){

        $id = $_GET['id'] ?? null;
        if($id){
             $this->todoModel->toggle((int) $id);
        }

        $this->redirect("/");
    }

    public function modif(){
        
        $id = $_GET['id'] ?? null;
        if($id){
            $taskToModif =  $this->todoModel->toModif((int) $id);
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $modification = trim($_POST['modifiation']);
                if($modification){
                    $this->todoModel->modif((string) $modification,(int) $id);
                }
                $this->redirect('/');
            }
            $this->view("modif",["taskToModif"=>$taskToModif]);
        }
    }
}