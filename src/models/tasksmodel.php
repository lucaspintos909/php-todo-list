<?php

class TasksModel extends Model implements IModel{

    private $id;
    private $user_email;
    private $title;
    private $description;
    private $created_at;

    function __construct(){
        parent::__construct();
        
    }


    public function save(){
        try {
            # Prepara la consulta para ser ejecutada (execute) con sus valores
            $query = $this->prepare('INSERT INTO task_db.tasks(user_email, title, description) 
                                        VALUES(:user_email, :title, :description)');
            # Ejecuta la consulta
            $query->execute([
                'user_email'  =>  $this->getUserEmail(),
                'title'       =>  $this->getTitle(),
                'description' =>  $this->getDescription()
            ]);
            return true;
        } catch (PDOException $ex) {
            error_log("USERMODEL::save->PDOException " . $ex);
            return false;
        }
    }

    public function getAllUserTasks($user_email){

        $tasks = [];

        try {
            $query = $this->prepare('SELECT * FROM task_db.tasks WHERE user_email = :user_email');
            $query->execute([
                'user_email' => $user_email
            ]);
            # FETCH_ASSOC es para que devuelva un array asociativo "clave->valor"
            while ($task_query = $query->fetch(PDO::FETCH_ASSOC)) {

                # Agarro todo lo que viene de la consulta y le setteo cada variable al usuario
                $task = new TasksModel();
                $task->setId($task_query['id']);
                $task->setTitle($task_query['title']);
                $task->setUserEmail($task_query['user_email']);
                $task->setDescription($task_query['description']);
                $task->setCreatedAt($task_query['created_at']);

                array_push($tasks, $task);
            }
            return $tasks;

        } catch (PDOException $ex) {
            error_log("USERMODEL::getAll->PDOException " . $ex);
            return false;
        }
    }

    public function getAll(){

        $tasks = [];

        try {
            $query = $this->query('SELECT * FROM task_db.tasks');
            
            # FETCH_ASSOC es para que devuelva un array asociativo "clave->valor"
            while ($task_query = $query->fetch(PDO::FETCH_ASSOC)) {

                # Agarro todo lo que viene de la consulta y le setteo cada variable al usuario
                $task = new TasksModel();
                $task->setId($task_query['id']);
                $task->setTitle($task_query['title']);
                $task->setUserEmail($task_query['user_email']);
                $task->setDescription($task_query['description']);
                $task->setCreatedAt($task_query['created_at']);

                array_push($tasks, $task);
            }
            return $tasks;

        } catch (PDOException $ex) {
            error_log("USERMODEL::getAll->PDOException " . $ex);
            return false;
        }
    }
    
    public function get($id){

        try {
            # Prepara la consulta para ser ejecutada (execute) con sus valores
            $query = $this->prepare('SELECT * FROM task_db.tasks WHERE id = :id');
            # Ejecuta la consulta
            $query->execute(['id' => $id]);

            # FETCH_ASSOC es para que devuelva un array asociativo "clave->valor"
            $task = $query->fetch(PDO::FETCH_ASSOC);

            # Agarro todo lo que viene de la consulta y le setteo a cada variable de la tarea
            $this->setId($task['id']);
            $this->setTitle($task['title']);
            $this->setUserEmail($task['user_email']);
            $this->setDescription($task['description']);
            $this->setCreatedAt($task['created_at']);

            return $this;
            
        } catch (PDOException $ex) {
            error_log("USERMODEL::getUser->PDOException " . $ex);
            return false;
        }

    }
    
    public function delete($id){

        try {
            # Prepara la consulta para ser ejecutada (execute) con sus valores
            $query = $this->prepare('DELETE FROM task_db.tasks WHERE id = :id && user_email = :user_email');
            # Ejecuta la consults
            $query->execute([
                'id' => $id,
                'user_email' => $this->user_email
            ]);

            return true;

        } catch (PDOException $ex) {
            error_log("USERMODEL::delete->PDOException " . $ex);
            return false;
        }

    }
    
    public function update(){

        try {
            $query = $this->prepare('UPDATE task_db.tasks SET title = :title, description = :description WHERE id = :id && user_email = :user_email');
            $query->execute([
                'id'          =>  $this->getId(),
                'title'       =>  $this->getTitle(),
                'description' =>  $this->getDescription(),
                'user_email'  =>  $this->getUserEmail()
            ]);

            return true;
            
        } catch (PDOException $ex) {
            error_log("USERMODEL::update->PDOException " . $ex);
            return false;
        }

    }
    
    public function from($array){

        $this->setId($array['id']);
        $this->setTitle($array['title']);
        $this->setUserEmail($array['user_email']);
        $this->setDescription($array['description']);
        $this->setCreatedAt($array['created_at']);

    }


    public function getId(){          return $this->id; }
    public function getUserEmail(){   return $this->user_email; }
    public function getTitle(){       return $this->title; }
    public function getDescription(){ return $this->description; }
    public function getCreatedAt(){   return $this->created_at; }

    public function setId($id){                    $this->id = $id; }
    public function setUserEmail($user_email){     $this->user_email = $user_email; }
    public function setTitle($title){              $this->title = $title; }
    public function setDescription($description){  $this->description = $description; }
    public function setCreatedAt($created_at){     $this->created_at = $created_at; }



}