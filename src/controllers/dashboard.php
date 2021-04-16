<?php

require_once 'models/taskmodel.php';
class Dashboard extends SessionController{

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
        $this->view->render('dashboard/index');
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
                
                $this->redirect('dashboard',['error' => ErrorMessages::ERROR_TASK_EMPTY]);
            
            }

            $this->taskmodel->setTitle($title);
            $this->taskmodel->setDescription($description);
            $this->taskmodel->setUserEmail($this->user->getEmail());

            if($this->taskmodel->save()){
                $this->redirect('dashboard',['success' => SuccessMessages::SUCCESS_TASK_CREATED]);
            }else{
                $this->redirect('dashboard',['error' => ErrorMessages::ERROR_TASK_CREATE]);
            }
            
        }else {
            $this->redirect('signup',['error' => ErrorMessages::ERROR_USER_CREATED]);
        }
    }


    function emptyVariables($variables){
        foreach ($variables as $variable) {
            if($variable == '' || empty($variable)) return true;
        }

        return false;
    }
    
}