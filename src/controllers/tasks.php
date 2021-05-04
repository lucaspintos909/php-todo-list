<?php

require_once 'models/tasksmodel.php';
class Tasks extends SessionController{

    private $user;
    private $tasks;
    private $task_model;

    function __construct(){
        parent::__construct();

        $this->task_model = new TasksModel();

        $this->user = $this->getUserSessionData();

        $this->tasks = $this->task_model->getAllUserTasks($this->user->getEmail());

    }

    function render(){
        $this->view->render('tasks/index', $this->tasks);
    }

    public function getTasks(){
        return $this->tasks;
    }

    function saveTask(){
        if ($this->existPOST(['title', 'description'])) {
            
            $title = $this->getPOST('title');
            $description = $this->getPOST('description');
            
            # Verifica si hay campos vacios
            if($this->emptyVariables([$title, $description])){
                
                $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_EMPTY]);
            
            }else {

                $this->model->setTitle($title);
                $this->model->setDescription($description);
                $this->model->setUserEmail($this->user->getEmail());

                if($this->model->save()){
                    $this->redirect('tasks',['success' => SuccessMessages::SUCCESS_TASK_CREATED]);
                }else{
                    $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_CREATED]);
                }

            }
            
            
            
        }else {
            $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_EMPTY]);
        }
    }

    function editTask(){
        if ($this->existPOST(['id','title', 'description'])) {
            
            $id = $this->getPOST('id');
            $title = $this->getPOST('title');
            $description = $this->getPOST('description');
            
            # Verifica si hay campos vacios
            if($this->emptyVariables([$id, $title, $description])){
                
                $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_EMPTY]);
            
            }else {
                $this->model->setId($id);
                $this->model->setTitle($title);
                $this->model->setDescription($description);
                $this->model->setUserEmail($this->user->getEmail());

                if($this->model->update()){
                    $this->redirect('tasks',['success' => SuccessMessages::SUCCESS_TASK_UPDATED]);
                }else{
                    $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_UPDATED]);
                }
            }  
        }else {
            $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_EMPTY]);
        }
    }

    function deleteTask(){
        if ($this->existGET(['id'])) {
            
            $id = $this->getGET('id');
            
            # Verifica si hay campos vacios
            if($this->emptyVariables([$id])){
                
                $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_DELETED]);
            
            }else {

                $this->model->setUserEmail($this->user->getEmail());

                if($this->model->delete($id)){
                    $this->redirect('tasks',['success' => SuccessMessages::SUCCESS_TASK_DELETED]);
                }else{
                    $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_DELETED]);
                }
            }  
        }else {
            $this->redirect('tasks',['error' => ErrorMessages::ERROR_TASK_DELETED]);
        }
    }

    function emptyVariables($variables){
        foreach ($variables as $variable) {
            if($variable == '' || empty($variable)) {return true;}
        }

        return false;
    }
    
}