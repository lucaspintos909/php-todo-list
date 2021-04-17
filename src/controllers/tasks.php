<?php

require_once 'models/taskmodel.php';
class Tasks extends SessionController{

    private $user;
    private $tasks;
    private $taskmodel;

    function __construct(){
        parent::__construct();
        
        $this->taskmodel = new TaskModel();

        $this->user = $this->getUserSessionData();

        $this->tasks = $this->taskmodel->getAllUserTasks($this->user->getEmail());

        $_SESSION['tasks'] = $this->tasks;

    }

    function render(){
        $this->view->render('tasks/index');
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

                $this->taskmodel->setTitle($title);
                $this->taskmodel->setDescription($description);
                $this->taskmodel->setUserEmail($this->user->getEmail());

                if($this->taskmodel->save()){
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
                $this->taskmodel->setId($id);
                $this->taskmodel->setTitle($title);
                $this->taskmodel->setDescription($description);
                $this->taskmodel->setUserEmail($this->user->getEmail());

                if($this->taskmodel->update()){
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

                $this->taskmodel->setUserEmail($this->user->getEmail());

                if($this->taskmodel->delete($id)){
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