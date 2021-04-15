<?php

class SuccessMessages{
    #     ESTADO_OBJETO_ACCION
    const SUCCESS_TASK_CREATE = 'SnGZ7LyR';
    const SUCCESS_TASK_DELETE = 'e53yqswG';
    const SUCCESS_TASK_UPDATE = 'dWurK5Xv';

    private $success_list = [];

    public function __construct(){
        
        $this->success_list= [
            SuccessMessages::SUCCESS_TASK_CREATE => 'La tarea se creo correctamente!',
            SuccessMessages::SUCCESS_TASK_DELETE => 'La tarea se elimino correctamente!',
            SuccessMessages::SUCCESS_TASK_UPDATE => 'La tarea fue modificada correctamente!'
        ];

    }

    public function get($hash){
        return $this->success_list[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->success_list)){
            return true;
        }else {
            return false;
        }
    }

}